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
        Route::get('/', [HomepageController::class, 'index'])->name('homepage');

        Route::get('about', [AboutController::class, 'index'])->name('about');

        Route::prefix('articles')->name('articles.')->group(function() {
            Route::get('/', [ArticleController::class, 'index'])->name('index');
            Route::get('show/{article}', [ArticleController::class, 'show'])->name('show');
        });

        Route::prefix('supports')->name('supports.')->group(function() {
            Route::get('/', [SupportController::class, 'index'])->name('index');
            Route::post('/', [SupportController::class, 'store'])->name('store');
        });

        Route::prefix('warehouses')->name('warehouses.')->group(function() {
            Route::get('/', [WarehouseController::class, 'index'])->name('index');
            Route::get('show/{warehouse}', [WarehouseController::class, 'show'])->name('show');
            Route::get('book/{warehouse}', [WarehouseController::class, 'book'])->name('book');
            Route::get('areas/{area}', [WarehouseController::class, 'area'])->name('area');
        });

        Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
        Route::get('terms-of-use', [TermsOfUseController::class, 'index'])->name('terms-of-use');
    // Page routes

    // Subscription route
        Route::post('subscriptions', [HomepageController::class, 'subscriptions'])->name('subscriptions');
    // Subscription route
});