<?php

namespace App\Http\Controllers;

use App\Models\UserOtp;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail; // Ensure this class is imported

class TwoStepVerificationController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // Always generate a new OTP if user comes from login, i.e., first-time visit to two-step verification
        $this->generateNewOtp($user);

        // Calculate remaining time from last OTP
        $lastOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        $remainingTime = 0;

        if ($lastOtp) {
            $currentTime = Carbon::now();
            $elapsedTime = $currentTime->diffInSeconds($lastOtp->created_at);

            // If last OTP was generated within the past 2 minutes, set the remaining time for countdown
            if ($elapsedTime < 120) {
                $remainingTime = 120 - $elapsedTime;
            }
        }

        // Show the two-step verification screen with OTP input and timer
        return view('auth.two_step_verification', compact('remainingTime'));
    }

    public function verify(Request $request)
    {
        $user = Auth::user();
        $otp = $request->input('otp');
    
        // Retrieve the latest OTP entry for the current user
        $latestOtp = UserOtp::where('user_id', $user->id)
            ->orderBy('created_at', 'desc') // Fetch the latest OTP based on creation time
            ->first();
    
        // Check if the OTP is valid (i.e., it matches and is not expired)
        if ($latestOtp && $latestOtp->otp == $otp && $latestOtp->expire_at > Carbon::now()) {
            // OTP is valid, mark OTP as verified in session
            session(['otp_verified' => true]);
    
            // Redirect to the dashboard
            return redirect()->route('admin.dashboard');
        }
    
        // OTP is invalid, return with error message
        return redirect()->back()->withErrors(['otp' => 'The OTP is invalid or has expired.']);
    }


    public function resend(Request $request)
    {
        $user = Auth::user();
        $lastOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        
        if ($lastOtp) {
            $elapsedTime = Carbon::now()->diffInSeconds($lastOtp->created_at);

            // Check if the last OTP was created less than 2 minutes ago
            if ($elapsedTime < 120) {
                return response()->json([
                    'success' => false,
                    'error' => 'Please wait before requesting a new OTP.'
                ]);
            }
        }

        // Generate and send a new OTP
        $this->generateNewOtp($user);

        return response()->json(['success' => true]);
    }

    public function generateNewOtp(User $user)
    {
        // Check the last OTP entry and its expiration
        $lastOtp = UserOtp::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
    
        // Generate OTP only if the last OTP is older than 2 minutes or if no OTP exists
        if (!$lastOtp || $lastOtp->created_at->diffInMinutes() >= 2) {
            // Generate a new 6-digit OTP
            $otp = rand(100000, 999999);
            
            // Save the new OTP to the user_otps table
            UserOtp::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'expire_at' => now()->addMinutes(5), // Set expiration time for the OTP
            ]);
    
            try {
                // Send the OTP email
                Mail::to($user->email)->send(new OtpMail($otp));
                return back()->with('status', 'New OTP has been sent to your email.');
            } catch (\Exception $e) {
                return back()->withErrors(['otp' => 'Failed to send OTP email: ' . $e->getMessage()]);
            }
        } else {
            return back()->withErrors(['otp' => 'Please wait before requesting a new OTP.']);
        }
    }


}
