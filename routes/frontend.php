<?php

use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Website\AboutController;
use App\Http\Controllers\Frontend\Website\ArticleController;
use App\Http\Controllers\Frontend\Website\SupportController;
use App\Http\Controllers\Frontend\Website\HomepageController;
use App\Http\Controllers\Frontend\Website\PrivacyPolicyController;
use App\Http\Controllers\Frontend\Website\TermsOfUseController;
use App\Http\Controllers\Frontend\Website\WarehouseController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth/frontend.php';

Route::post('language', [LanguageController::class, 'language'])->name('language');

Route::middleware(['language'])->group(function () {
    // Page routes
        Route::name('homepage.')->group(function() {
            Route::get('/', [HomepageController::class, 'index'])->name('index');
            Route::post('subscription', [HomepageController::class, 'subscription'])->name('subscription');
        });

        Route::prefix('about')->name('about.')->group(function() {
            Route::get('/', [AboutController::class, 'index'])->name('index');
            Route::post('subscription', [AboutController::class, 'subscription'])->name('subscription');
        });

        Route::prefix('articles')->name('articles.')->group(function() {
            Route::get('/', [ArticleController::class, 'index'])->name('index');
            Route::get('show/{article}', [ArticleController::class, 'show'])->name('show');
        });

        Route::prefix('supports')->name('supports.')->group(function() {
            Route::get('/', [SupportController::class, 'index'])->name('index');
            Route::post('/', [SupportController::class, 'store'])->name('store');
        });

        // Auth routes
            Route::middleware(['auth'])->prefix('warehouses')->name('warehouses.')->group(function () {
                Route::get('/', [WarehouseController::class, 'index'])->name('index');
                Route::post('/', [WarehouseController::class, 'store'])->name('store');
                Route::get('filter', [WarehouseController::class, 'filter'])->name('filter');
                Route::post('expert', [WarehouseController::class, 'expert'])->name('expert');
                Route::post('report', [WarehouseController::class, 'report'])->name('report');
                Route::post('favorite', [WarehouseController::class, 'favorite'])->name('favorite');
            });
            
            Route::middleware(['auth', 'company'])->prefix('warehouses')->name('warehouses.')->group(function () {
                Route::get('show/{warehouse}', [WarehouseController::class, 'show'])->name('show');
            });
        // Auth routes

        Route::prefix('warehouses')->name('warehouses.')->group(function() {
            Route::get('areas/{area}', [WarehouseController::class, 'area'])->name('area');
        });

        Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
        Route::get('terms-of-use', [TermsOfUseController::class, 'index'])->name('terms-of-use');
    // Page routes
});