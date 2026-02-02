<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\OtpController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // Show admin login page
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');

    // Handle admin login POST
    Route::post('/login', [LoginController::class, 'login'])
        ->name('admin.login.submit');

    // Protected admin routes
    Route::middleware(['admin'])->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [LoginController::class, 'logout'])
            ->name('admin.logout');
    });
});


Route::prefix('admin')->middleware('guest:admin')->group(function () {

    // 1. Forget password (email)
    Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])
        ->name('admin.forget.password');

    Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])
        ->name('admin.password.email');


    // 2. OTP verify
    Route::get('/otp-verify', [OtpController::class, 'showOtpForm'])
        ->name('admin.otp.form');

    Route::post('/otp-verify', [OtpController::class, 'verifyOtp'])
        ->name('admin.otp.verify');

    Route::post('/resend-otp', [OtpController::class, 'resendOtp'])
        ->name('admin.otp.resend');

    // 3. Reset password (after OTP success)
    Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])
        ->name('admin.password.reset.form');

    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
        ->name('admin.password.update');
});
