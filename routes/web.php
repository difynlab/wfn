<?php

use App\Http\Controllers\Frontend\Website\LanguageController;
use Illuminate\Support\Facades\Route;

Route::post('language', [LanguageController::class, 'index'])->name('language');