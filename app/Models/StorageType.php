<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageType extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'status',
    ];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
