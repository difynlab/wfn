<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseReview extends Model
{
    protected $fillable = [
        'content',
        'star',
        'language',
        'status',
        'user_id',
        'warehouse_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
