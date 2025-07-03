<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('redirect')->group(function () {
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('login', [AuthenticationController::class, 'store'])->name('login.store');

        Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');

        Route::get('reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->name('reset-password');
        Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.store');
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    });
});