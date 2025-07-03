<?php

use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Route;

Route::post('language', [LanguageController::class, 'language'])->name('language');

require __DIR__.'/auth/frontend.php';
require __DIR__.'/frontend/website.php';
require __DIR__.'/frontend/user.php';