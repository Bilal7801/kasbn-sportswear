<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Admin Auth Controllers
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\OtpController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;

// Admin Business Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;

// User Core & Auth Controllers
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [UserProductController::class, 'showWelcome'])->name('home');   

Route::get('/product', [UserProductController::class, 'index'])->name('products');
Route::get('/product/{slug}', [UserProductController::class, 'show'])->name('product.show');

Route::view('/why-us', 'user.why-us')->name('why-us');
Route::view('/process', 'user.process')->name('process');
Route::view('/certifications', 'user.certifications')->name('certifications');

Route::get('/enquiry', function () { return view('user.enquiry'); })->name('enquiry.form');
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::get('/contact', function () { return view('user.contact'); })->name('contact');
Route::post('/contact', function (Request $request) {
    return back()->with('success', 'Thank you for your message. We will get back to you soon.');
})->name('contact.submit');

/*
|--------------------------------------------------------------------------
| User Authentication Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Login Processing
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registration Processing
    Route::get('/signup', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/signup', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| User Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Auth Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware('guest:admin')->group(function () {
        Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('admin.forget.password');
        Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('admin.password.email');
        Route::get('/otp-verify', [OtpController::class, 'showOtpForm'])->name('admin.otp.form');
        Route::post('/otp-verify', [OtpController::class, 'verifyOtp'])->name('admin.otp.verify');
        Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('admin.otp.resend');
        Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset.form');
        Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('admin.password.update');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Authenticated Guard)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {

    // --- Dynamic Dashboard ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- Settings Panels ---
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings/profile', [SettingController::class, 'updateProfile'])->name('settings.profile');
    Route::post('/settings/password', [SettingController::class, 'updatePassword'])->name('settings.password');

    // --- Category & Product Management ---
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    // --- Customer Management ---
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{user}', [CustomerController::class, 'show'])->name('customers.show');
    Route::delete('/customers/{user}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // --- Enquiry Management Pipeline ---
    Route::get('/enquiries', [AdminEnquiryController::class, 'index'])->name('enquires.index');
    Route::delete('/enquiries/{id}', [AdminEnquiryController::class, 'destroy'])->name('enquiries.destroy');
    Route::patch('/enquiries/{id}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.updateStatus');

    // --- Operations Internal Inbox ---
    Route::get('/inbox', function () { return view('admin.inbox'); })->name('inbox');
});