<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\OtpController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController; // You need to create this!
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\EnquiryController;



Route::get('/', function () {
    return view('welcome');
})->name('home');   

// user login

// routes/web.php

Route::view('/login', 'user.auth.login')->name('user.login');

Route::view('/signup', 'user.auth.register')->name('user.signup');

Route::view('/product', 'user.product_page')->name('products');

Route::view('/why-us', 'user.why-us')->name('why-us');

Route::view('/process', 'user.process')->name('process');

Route::view('/certifications', 'user.certifications')->name('certifications');

/*
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/enquiry', function () {
    return view('user.enquiry');
})->name('enquiry.form');

Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes (Guest)
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
| Admin Protected Routes (Authenticated)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {

    // --- Dynamic Dashboard ---
    // Change this from a function to your new Controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- Settings ---
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

    // --- Enquiry Management ---
    Route::get('/enquiries', [AdminEnquiryController::class, 'index'])->name('enquires.index');
    Route::delete('/enquiries/{id}', [AdminEnquiryController::class, 'destroy'])->name('enquiries.destroy');
    Route::patch('/enquiries/{id}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.updateStatus');

    // --- Other Views ---
    Route::get('/inbox', function () { return view('admin.inbox'); })->name('inbox');
});


// Contact page
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

// Contact form submission (placeholder)
Route::post('/contact', function (Illuminate\Http\Request $request) {
    // Handle form logic here (e.g., send email, save to database)
    // For now, just redirect back with a success message.
    return back()->with('success', 'Thank you for your message. We will get back to you soon.');
})->name('contact.submit');