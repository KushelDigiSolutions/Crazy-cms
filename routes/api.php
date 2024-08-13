<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['web'])->group(function () {
    // Your routes here
    Route::prefix('front-api')->group(function () {
        Route::post('/setWebUrl', [HomeApiController::class, 'setWebUrl']);
        Route::post('/downloadWeb', [HomeApiController::class, 'downloadWeb']);
        Route::post('/verify-ftp', [HomeApiController::class, 'analyzeFtp'])->name('analyze.ftp');
        Route::post('/admin/customer-register', [UserController::class, 'customerRegister'])->name('customerRegister');
    });
});