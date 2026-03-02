<?php

use App\Http\Controllers\API\APIController;
use Illuminate\Support\Facades\Route;

Route::get('storage-types', [APIController::class, 'storageTypes']);
Route::post('auth', [APIController::class, 'auth']);
Route::post('search', [APIController::class, 'search']);
Route::post('booking', [APIController::class, 'booking']);
Route::post('requests', [APIController::class, 'requests']);
