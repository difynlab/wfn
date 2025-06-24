<?php

use App\Http\Controllers\Backend\Admin\BookingController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\Page\HomepageController;
use App\Http\Controllers\Backend\Admin\Page\PageController;
use App\Http\Controllers\Backend\Admin\StorageTypeController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Pages routes
        Route::prefix('pages')->name('pages.')->group(function() {
            Route::get('/', [PageController::class, 'index'])->name('index');

            Route::controller(HomepageController::class)->prefix('homepage')->name('homepage.')->group(function() {
                Route::get('{language}', 'index')->name('index');
                Route::post('{language}', 'update')->name('update');
            });
        });
    // Pages routes

    // Users routes
        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('filter', 'filter')->name('filter');
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('{user}/edit', 'edit')->name('edit');
            Route::post('{user}', 'update')->name('update');
            Route::delete('{user}', 'destroy')->name('destroy');

            Route::controller(UserController::class)->prefix('company')->name('company.')->group(function() {
                Route::get('{user}', 'company')->name('index');
                Route::post('{user}/{company}', 'companyUpdate')->name('update');
            });
        });
    // Users routes

    // Warehouses routes
        Route::controller(WarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('filter', 'filter')->name('filter');
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('{warehouse}/edit', 'edit')->name('edit');
            Route::post('{warehouse}', 'update')->name('update');
            Route::delete('{warehouse}', 'destroy')->name('destroy');
        });
    // Warehouses routes

    // Storage types routes
        Route::controller(StorageTypeController::class)->prefix('storage-types')->name('storage-types.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('filter', 'filter')->name('filter');
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('{storage_type}/edit', 'edit')->name('edit');
            Route::post('{storage_type}', 'update')->name('update');
            Route::delete('{storage_type}', 'destroy')->name('destroy');
        });
    // Storage types routes

    // Booking routes
        Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('filter', 'filter')->name('filter');
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('{booking}/edit', 'edit')->name('edit');
            Route::post('{booking}', 'update')->name('update');
            Route::delete('{booking}', 'destroy')->name('destroy');
        });
    // Booking routes
});