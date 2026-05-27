<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'no_of_pallets',
        'no_of_square_meters',
        'total_rent',
        'tenancy_date',
        'renewal_date',
        'documents',
        'user_id',
        'warehouse_id',
        'conversation_id',
        'status',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
