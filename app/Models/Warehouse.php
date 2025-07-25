<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storageType()
    {
        return $this->belongsTo(StorageType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(WarehouseReview::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
