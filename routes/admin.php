<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCateoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/login-as-user/{id}', [UserController::class, 'loginAsUser'])->name('loginAsUser');
    Route::get('/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');   
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/settings', [SettingController::class, 'edit'])->name('setting.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mysites', [UserController::class,'mySite'])->name('mysites');
    Route::get('/addmysites', [UserController::class,'addMySite'])->name('addmysites');
    Route::get('/editsite/{variable}/{id}', [UserController::class, 'editsite'])->name('editWebsite');
    Route::post('/storeAdd', [UserController::class, 'storeAdd'])->name('storeAdd');
    Route::post('/addSite', [UserController::class, 'addSite'])->name('addSite');
    Route::post('/createWebsite', [UserController::class, 'createWebsite'])->name('createWebsite');
    
    

    Route::middleware(['role:admin'])->group(function(){
        Route::resource('user',UserController::class);
        Route::resource('role',RoleController::class);
        Route::resource('permission',PermissionController::class);
        Route::resource('subscription',SubscriptionController::class);
        Route::resource('enquiry',EnquiryController::class);
        Route::resource('order',OrderController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);
        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
        Route::put('/subscription', [SubscriptionController::class, 'update'])->name('subscription.update');
        Route::get('/enquiry/filter', [EnquiryController::class, 'filter'])->name('enquiry.filter');
        Route::resource('enquiries', EnquiryController::class)->except(['show']);
        Route::get('customer', [UserController::class,'customer'])->name('customer');
        Route::post('/user/login', [UserController::class,'userLogin'])->name('user.login');
    });
});
