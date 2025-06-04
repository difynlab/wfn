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


    // Page routes
});