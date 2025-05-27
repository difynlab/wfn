<?php

use Illuminate\Support\Facades\Route;

foreach(['admin', 'landlord', 'manager'] as $prefix) {
    Route::get("/{$prefix}", function () use ($prefix) {
        return redirect()->route('backend-auth.' . $prefix . '.login');
    });
}