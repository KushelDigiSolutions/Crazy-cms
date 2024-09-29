<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\MySite;

class ProfileController extends Controller
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
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
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

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
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
