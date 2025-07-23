<?php

use App\Models\Favorite;

if (!function_exists('toggle_favorite')) {
    function toggle_favorite($userId, $warehouseId)
    {
        $favorite = Favorite::where('user_id', $userId)
            ->where('warehouse_id', $warehouseId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return false;
        } else {
            Favorite::create([
                'user_id' => $userId,
                'warehouse_id' => $warehouseId,
            ]);
            return true;
        }
    }

    function is_favorited($userId, $warehouseId)
    {
        return Favorite::where('user_id', $userId)
            ->where('warehouse_id', $warehouseId)
            ->exists();
    }
}