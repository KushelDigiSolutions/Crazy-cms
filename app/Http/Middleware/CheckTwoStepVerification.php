<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTwoStepVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = $request->user();

            // Check if two-step verification is enabled for the user
            if ($user->two_step == 1 && !$request->session()->get('otp_verified')) {
                // If two-step is enabled and OTP is not verified, redirect to the verification page
                return redirect()->route('two.step.verification');
            }
            // If two-step is not enabled, allow normal login process
        }

        return $next($request);
    }
}
