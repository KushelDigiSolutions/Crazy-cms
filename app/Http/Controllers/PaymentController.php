<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payPalService;

    public function __construct(PayPalService $payPalService)
    {
        $this->payPalService = $payPalService;
    }

    public function createPayment(Request $request)
    {
        $totalAmount = $request->get('amount', 10.00); // The amount
        $userId = $request->get('userId');             // The user ID
        $siteId = $request->get('siteId');             // The site ID
        $returnUrl = route('payment.success');         // Success URL
        $cancelUrl = route('payment.cancel');          // Cancel URL

        // Prepare the custom data to be sent to PayPal
        $customData = json_encode(['userId' => $userId, 'siteId' => $siteId]);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($totalAmount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription("Payment Description")
                    ->setCustom($customData);  // Add custom data here

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($returnUrl)
                    ->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            // Handle error
            return redirect()->back()->with('error', 'Error processing PayPal payment.');
        }

        return redirect()->away($payment->getApprovalLink());  // Redirect to PayPal
    }


    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->query('paymentId');
        $payerId = $request->query('PayerID');

        // Execute the payment
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            // Retrieve the custom data (userId and siteId) from the transaction
            $customData = json_decode($result->getTransactions()[0]->getCustom(), true);
            $userId = $customData['userId'];
            $siteId = $customData['siteId'];

            // Handle success logic, such as saving to the database or redirecting
            return view('payment.success', compact('userId', 'siteId'));
        } catch (\Exception $ex) {
            return redirect()->route('payment.cancel')->with('error', 'Payment execution failed.');
        }
    }


    public function paymentCancel()
    {
        // Handle the cancel logic here
        return view('payment.cancel');
    }
}
