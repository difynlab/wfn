<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

foreach(['admin', 'landlord', 'manager'] as $prefix) {
    Route::prefix($prefix)->name("$prefix.")->group(function () {
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('login', [AuthenticationController::class, 'store'])->name('login.store');

        Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');

        Route::get('reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->name('reset-password');
        Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.store');

        Route::middleware('auth')->group(function () {
            Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
        });
    });
}