<?php

use App\Models\Favorite;

if(!function_exists('isFavorite')) {
    function isFavorite($user_id, $warehouse_id) {
        $check = Favorite::where('user_id', $user_id)->where('warehouse_id', $warehouse_id)->exists();

        return $check;
    }
}