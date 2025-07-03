<?php

use App\Http\Controllers\Frontend\Landlord\DashboardController;
use App\Http\Controllers\Frontend\Tenant\DashboardController as TenantDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:landlord'])->prefix('landlord')->name('landlord.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // // Warehouses routes
    //     Route::controller(WarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('filter', 'filter')->name('filter');
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('{warehouse}/edit', 'edit')->name('edit');
    //         Route::post('{warehouse}', 'update')->name('update');
    //         Route::delete('{warehouse}', 'destroy')->name('destroy');
    //     });
    // // Warehouses routes

    // // Bookings routes
    //     Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('filter', 'filter')->name('filter');
    //         Route::get('{booking}/edit', 'edit')->name('edit');
    //         Route::post('{booking}', 'update')->name('update');
    //         Route::delete('{booking}', 'destroy')->name('destroy');
    //     });
    // // Bookings routes

    // // Todos routes
    //     Route::controller(TodoController::class)->prefix('todos')->name('todos.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::post('{todo}/favorite', 'favorite')->name('favorite');
    //         Route::post('{todo}/complete', 'complete')->name('complete');
    //         Route::post('{todo}/destroy', 'destroy')->name('destroy');
    //     });
    // // Todos routes

    // // Settings routes
    //     Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('{user}/profile', 'profile')->name('profile');
    //         Route::post('{user}/password', 'password')->name('password');
    //         Route::post('{user}/company/{company}', 'company')->name('company');
    //     });
    // // Settings routes

    // // Messages routes
    //     Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function() {
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('{category}', 'index')->name('index');
    //         Route::get('{category}/filter', 'filter')->name('filter');
    //         Route::get('{message}/edit', 'edit')->name('edit');
    //         Route::post('{message}/update', 'update')->name('update');

    //         Route::post('{message}/favorite', 'favorite')->name('favorite');
    //         Route::post('favorite/bulk', 'bulkFavorite')->name('bulk-favorite');
    //         Route::post('destroy/bulk', 'bulkDestroy')->name('bulk-destroy');
    //         Route::post('recover/bulk', 'bulkRecover')->name('bulk-recover');
    //     });
    // // Messages routes
});


Route::middleware(['auth', 'role:tenant'])->prefix('tenant')->name('tenant.')->group(function () {
    Route::get('dashboard', [TenantDashboardController::class, 'index'])->name('dashboard');

    // // Bookings routes
    //     Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('filter', 'filter')->name('filter');
    //         Route::get('{booking}/edit', 'edit')->name('edit');
    //         Route::post('{booking}', 'update')->name('update');
    //         Route::delete('{booking}', 'destroy')->name('destroy');
    //     });
    // // Bookings routes

    // // Todos routes
    //     Route::controller(TodoController::class)->prefix('todos')->name('todos.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::post('{todo}/favorite', 'favorite')->name('favorite');
    //         Route::post('{todo}/complete', 'complete')->name('complete');
    //         Route::post('{todo}/destroy', 'destroy')->name('destroy');
    //     });
    // // Todos routes

    // // Settings routes
    //     Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function() {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('{user}/profile', 'profile')->name('profile');
    //         Route::post('{user}/password', 'password')->name('password');
    //         Route::post('{user}/company/{company}', 'company')->name('company');
    //     });
    // // Settings routes

    // // Messages routes
    //     Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function() {
    //         Route::get('create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('{category}', 'index')->name('index');
    //         Route::get('{category}/filter', 'filter')->name('filter');
    //         Route::get('{message}/edit', 'edit')->name('edit');
    //         Route::post('{message}/update', 'update')->name('update');

    //         Route::post('{message}/favorite', 'favorite')->name('favorite');
    //         Route::post('favorite/bulk', 'bulkFavorite')->name('bulk-favorite');
    //         Route::post('destroy/bulk', 'bulkDestroy')->name('bulk-destroy');
    //         Route::post('recover/bulk', 'bulkRecover')->name('bulk-recover');
    //     });
    // // Messages routes
});