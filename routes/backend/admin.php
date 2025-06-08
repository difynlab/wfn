<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users routes
        Route::prefix('users')->name('users.')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('filter', [UserController::class, 'filter'])->name('filter');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::post('{user}', [UserController::class, 'update'])->name('update');
            Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');
        });
    // Users routes
});