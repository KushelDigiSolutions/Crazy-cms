<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use App\Models\Subscription;
use Session;
use DB;

class PayPalController extends Controller
{
    public function createPayment()
    {
        $validUserCreate = session('validUserCreate');

        $subscription = Subscription::find($validUserCreate['plan']);
        //dd($subscription->price);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$subscription->price"
                    ],
                    "custom_id" => "{$validUserCreate['my_site']}_{$validUserCreate['id']}_{$validUserCreate['plan']}" // Custom ID to include additional variables
                ]
            ],
            "application_context" => [
                "cancel_url" => route('paypal.cancel', [
                    'site_id' => $validUserCreate['my_site'],
                    'user_id' => $validUserCreate['id'],
                    'plan_id' => $validUserCreate['plan']
                ]),
                "return_url" => route('paypal.success', [
                    'site_id' => $validUserCreate['my_site'],
                    'user_id' => $validUserCreate['id'],
                    'plan_id' => $validUserCreate['plan']
                ])
            ]
        ]);

        if (isset($response['id']) && $response['status'] == "CREATED") {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $siteId = $request->query('site_id');
        $userId = $request->query('user_id');
        $planId = $request->query('plan_id');


        $response = $provider->capturePaymentOrder($request->query('token'));

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $pay =Payment::create([
                'user_id' => $request->query('user_id'),
                'transaction_id' => $response['id'],
                'status' => 'success',
                'response' => json_encode($response),
            ]);

            DB::table('my_sites')->where('id', $siteId)->update([
                'user_id' => $userId,
                'subscription_id' => $planId,
                'payment_id' => $pay->id,
                'status' => 1 // Example field to indicate payment success
            ]);

            // Redirect to success page with additional variables for verification
            return redirect()->route('success.page')->with([
                'status' => 'Payment Successful!',
                'user_verification_data' => 'verified_data_here'
            ]);
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function cancel()
    {
        $siteId = $request->query('site_id');
        $userId = $request->query('user_id');
        $planId = $request->query('plan_id');

        Payment::create([
            'user_id' => $request->query('user_id') ?? 'guest',
            'status' => 'failed',
            'response' => json_encode(['message' => 'User cancelled the payment']),
        ]);

        // Redirect to failure page with additional variables for verification
        return redirect()->route('failure.page')->with([
            'status' => 'Payment Failed!',
            'user_verification_data' => 'failed_data_here'
        ]);
    }
}
