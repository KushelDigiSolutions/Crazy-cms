<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\MySite;

class ReferalController extends Controller
{

    public function dashboard()
    {
        $user = User::where('id', Auth::id())->first();
        $usersData =  $this->getUserAndPaidCounts();
        return view('dashboard', [
            'user' => $user,
            'userCount' => $usersData['userCount'], // Pass user count data
            'paidUserCount' => $usersData['paidUserCount'] // Pass paid user count data
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
       
        // Retrieve the current logged-in user
        $user = $request->user();
    
        // Fetch referral data associated with the logged-in user
        $referrals = Referral::where('user_id', $user->id)->get();
    
        // Pass both user and referral data to the view
        return view('referal.edit', [
            'user' => $user,
            'referrals' => $referrals,
        ]);
    }
    public function sendReferalEmails(Request $request): View
    {
          // Step 1: Retrieve the current logged-in user's ID
        $currentUserId = auth()->id(); // Assuming you're using Laravel's authentication
    
        // Step 2: Get the comma-separated emails from the request
        $emails = $request->all()['email_list']; // 'emails' is the name of your input field
    
         // Step 3: Convert the comma-separated string into an array and filter out null/empty values
        $emailArray = array_filter(array_map('trim', explode(',', $emails)));
    
        // Step 4: Filter out emails that already exist in the database for this user
        $existingEmails = Referral::where('user_id', $currentUserId)
            ->whereIn('email', $emailArray)
            ->pluck('email')
            ->toArray();
    
        $uniqueEmails = array_diff($emailArray, $existingEmails);
    
        // Step 5: Insert unique emails into the referrals table
        foreach ($uniqueEmails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validate email format
                Referral::create([
                    'email' => $email,
                    'user_id' => $currentUserId,
                    'link' => 'default_link', // Replace with your actual default value
                    'opened' => 0, // Default value
                    'purchased' => 0, // Default value
                ]);
            }
        }

        // Step 5: Return a view or redirect with a success message
        return view('referal.edit')->with('success', 'Referral emails have been successfully sent!');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ReferalUpdateRequest $request): RedirectResponse
    {
        // dd($request->post());
        // dd($request->user());
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        
        User::where('id', $request->user()->id)->update([
            'mode' => 'dark',
            'two_step' => $request->two_step // Replace with the actual value
        ]);
        $request->user()->save();

        return Redirect::route('admin.referal.edit')->with('status', 'referal-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function getUserAndPaidCounts()
    {
        // Get current year and month
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Initialize the arrays with 12 values (one for each month)
        $userCount = array_fill(0, 12, 0);
        $paidUserCount = array_fill(0, 12, 0);

        // Get user count per month for the current year
        $usersPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(id) as user_count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->get()
            ->pluck('user_count', 'month')
            ->toArray();

        // Fill the userCount array with the data
        for ($i = 1; $i <= 12; $i++) {
            if ($i <= $currentMonth) {
                $userCount[$i - 1] = $usersPerMonth[$i] ?? 0;
            }
        }

        // Get paid user count per month for the current year
        $paidUsersPerMonth = User::selectRaw('MONTH(users.created_at) as month, COUNT(users.id) as paid_user_count')
            ->leftJoin('my_sites', 'users.id', '=', 'my_sites.user_id')
            ->whereYear('users.created_at', $currentYear)
            ->where(function ($query) {
                $query->whereNotNull('my_sites.payment_id');
            })
            ->groupBy('month')
            ->get()
            ->pluck('paid_user_count', 'month')
            ->toArray();

        // Fill the paidUserCount array with the data
        for ($i = 1; $i <= 12; $i++) {
            if ($i <= $currentMonth) {
                $paidUserCount[$i - 1] = $paidUsersPerMonth[$i] ?? 0;
            }
        }

        // Return the two arrays
        return [
            'userCount' => $userCount, // Total users per month
            'paidUserCount' => $paidUserCount // Paid users per month
        ];
    }
}
