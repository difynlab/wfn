<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});