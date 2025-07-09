<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name' => 'Al-Falah Distribution Center',
                'address_name' => 'Al Quds',
                'address_en' => 'Al Quds Street, Warehouse No. 35, Industrial City, Riyadh, Saudi Arabia',
                'city_en' => 'Industrial City',
                'address_ar' => 'Al Quds Street, Warehouse No. 35, Industrial City, Riyadh, Saudi Arabia',
                'city_ar' => 'Industrial City',
                'latitude' => '23.8859',
                'longitude' => '45.0792',
                'total_area' => '2000',
                'total_pallets' => '200',
                'available_pallets' => '160',
                'rent_per_pallet' => '10.00',
                'pallet_dimension' => '120x80x150',
                'temperature_type' => 'dry',
                'temperature_range' => '10C - 50C',
                'wms' => 'yes',
                'equipment_handling' => 'yes',
                'temperature_sensor' => 'yes',
                'humidity_sensor' => 'yes',
                'user_id' => 2,
                'storage_type_id' => 1,
            ],
        ];

        foreach($records as $record) {
            Warehouse::updateOrCreate(
                ['name' => $record['name']],
                $record
            );
        }
    }
}
