<?php

use App\Http\Controllers\LoginWithOTPController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['web'])->group(function () {
    // Your routes here
    Route::get('/', function () {
        // $readmePath = base_path('README.md');
    
        return view('frontend/home');
    });
    
    Route::get('/preview/{variable}', [HomeController::class, 'preview']);
    Route::get('/error', [HomeController::class, 'error']);
    Route::get('/check-ftp', [HomeController::class, 'checkFtp'])->name('check.ftp');

    Route::get('/sign-up', [HomeController::class, 'signup'])->name('front.signup');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/editor', [HomeController::class, 'editor']);
    Route::get('/editor1', [HomeController::class, 'editor1']);
    Route::get('/page1', [HomeController::class, 'pageone']);
    Route::get('/page2', [HomeController::class, 'pagetwo']);
    Route::get('/page3', [HomeController::class, 'pagethree']);
    Route::get('/page6', [HomeController::class, 'pagesix']);
    Route::get('/features', [PageController::class, 'feature']);
    Route::get('/pricing', [PageController::class, 'pricing']);
    Route::get('/privacy_policy',[PageController::class,'privacyPolicy']);
    Route::get('/terms_services',[PageController::class,'terms']);
    Route::get('/site',[PageController::class,'siteMap']);
    Route::get('/mobile_site',[PageController::class,'mobileSite']);
   
    Route::get('pay', [PayPalController::class, 'createPayment'])->name('paypal.pay');
    Route::get('success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::get('cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
    Route::get('success-page', [HomeController::class, 'successPage'])->name('success.page');
    Route::get('failure-page', [HomeController::class, 'failurePage'])->name('failure.page');



});

// Login with OTP Routes
Route::prefix('/otp')->middleware('guest')->name('otp.')->controller(LoginWithOTPController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/generate','generate')->name('generate');
    Route::get('/verification/{userId}','verification')->name('verification');
    Route::post('login/verification','loginWithOtp')->name('loginWithOtp');
});

// Socialite Routes
Route::prefix('oauth/')->group(function(){
    Route::prefix('/github/login')->name('github.')->group(function(){
        Route::get('/',[SocialiteController::class,'redirectToGithub'])->name('login');
        Route::get('/callback',[SocialiteController::class,'HandleGithubCallBack'])->name('callback');
    });

    Route::prefix('/google/login')->name('google.')->group(function(){
        Route::get('/',[SocialiteController::class,'redirectToGoogle'])->name('login');
        Route::get('/callback',[SocialiteController::class,'HandleGoogleCallBack'])->name('callback');        
    });

    Route::prefix('/facebook/login')->name('facebook.')->group(function(){
        Route::get('/',[SocialiteController::class,'redirectToFaceBook'])->name('login');
        Route::get('/callback',[SocialiteController::class,'HandleFaceBookCallBack'])->name('callback');
    });
});



// Auth routes
require __DIR__.'/auth.php';
// Admin Routes
require('admin.php');
