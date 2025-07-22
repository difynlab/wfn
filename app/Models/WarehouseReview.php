<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseReview extends Model
{
    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
