<?php

use App\Http\Controllers\Frontend\Website\AboutController;
use App\Http\Controllers\Frontend\Website\SupportController;
use App\Http\Controllers\Frontend\Website\HomepageController;
use App\Http\Controllers\Frontend\Website\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['set_language'])->group(function () {
    // Page routes
        Route::get('/', [HomepageController::class, 'index'])->name('homepage');
        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses');
        Route::get('/support', [SupportController::class, 'index'])->name('support');
        Route::get('/warehouses/single', function () {
            return view('frontend.website.singlewarehouse');
        })->name('singlewarehouse');
        
        Route::get('/confirmbooking', function () {
            return view('frontend.website.confirmbooking');
        })->name('confirmbooking');

        Route::get('/articles', function () {
            return view('frontend.website.articles');
        })->name('articles');

        Route::get('/singlearticle', function () {
            return view('frontend.website.singlearticle');
        })->name('singlearticle');

        Route::get('/privacy-policy', function () {
            return view('frontend.website.privacy-policy');
        })->name('privacy-policy');

        Route::get('/terms-of-use', function () {
            return view('frontend.website.terms-of-use');
        })->name('terms-of-use');


    // Page routes
});