<?php

use App\Http\Controllers\Frontend\Website\LanguageController;
use Illuminate\Support\Facades\Route;

Route::post('set-language', [LanguageController::class, 'setLanguage'])->name('set-language');