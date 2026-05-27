<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name_en',
        'address_en',
        'city',
        'country_short',
        'country_long',
        'short_description_en',
        'description_en',
        'features_en',
        'amenities_en',
        'details_en',
        'name_ar',
        'address_ar',
        'short_description_ar',
        'description_ar',
        'features_ar',
        'amenities_ar',
        'details_ar',
        'latitude',
        'longitude',
        'total_area',
        'total_pallets',
        'available_pallets',
        'rent_per_pallet',
        'pallet_dimension',
        'pallet_dimension_other_value',
        'temperature_type',
        'temperature_range',
        'wms',
        'equipment_handling',
        'temperature_sensor',
        'humidity_sensor',
        'thumbnail',
        'outside_image',
        'loading_image',
        'off_loading_image',
        'handling_equipment_image',
        'storage_area_image',
        'storage_charges',
        'movement_services',
        'pallet_services',
        'videos',
        'licenses',
        'license',
        'board_name',
        'board_image',
        'storage_type_id',
    ];
    
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
