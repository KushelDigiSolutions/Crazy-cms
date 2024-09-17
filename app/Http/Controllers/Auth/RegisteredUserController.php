<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


protected function registered(Request $request, $user)
{
    Mail::to($user->email)->send(new WelcomeEmail($user));
}

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        event(new Registered($user));

          // Mail::to($user->email)->send(new WelcomeEmail($user));

        Auth::login($user);
        
        // $to = $user->email;
        // $subject = "Welcome to Our Platform!";
        // $message = "Hello " . $user->name . ",\n\nThank you for registering with us!";
        // $headers = "From: randomclick2404@gmail.com";

        // if(mail($to, $subject, $message, $headers)) {
        //     echo "Email sent successfully";
        // } else {
        //     echo "Email not sent successfully";
        // }
        

        return redirect(RouteServiceProvider::HOME);
    }
}
