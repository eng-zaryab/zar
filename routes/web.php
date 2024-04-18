<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // ADMIN LOGIN ROUTE
    Route::match(['get','post'], 'login', 'AdminController@login')->name('admin.login');

    // ADMIN ROUTE GROUP
    Route::group(['middleware' => ['admin']], function () {
        // ADMIN DASHBOARD ROUTE
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        // UPDATE ADMIN PASSWORD
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword')->name('admin.password');
        // CHECK ADMIN PASSWORD
        Route::post('check-admin-password', 'AdminController@checkAdminPassword')->name('admin.password');
        // UPDATE ADMIN DETAILS
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails')->name('admin.details');

        //////////////////////////////////////////////////////////////// VENDOR ROUTES //////////////////////////////////////////////////////////////////
        // UPDATE VENDOR DETAILS
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails')->name('vendor.details');
        // ADMIN LOGOUT
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
    });
});
