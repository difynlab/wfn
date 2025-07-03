<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageType extends Model
{
    protected $guarded = [];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
