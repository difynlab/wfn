<?php

use App\Http\Controllers\Backend\Manager\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/manager', function () {
    return redirect()->route('manager.dashboard');
});

Route::middleware(['auth', 'role:manager'])->prefix('manager')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});