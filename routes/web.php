<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

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
