<?php

use App\Http\Controllers\Frontend\Website\WarehouseController;

Route::post('/favorite/toggle', [App\Http\Controllers\Frontend\Website\WarehouseController::class, 'toggleFavorite'])->name('favorite.toggle');
