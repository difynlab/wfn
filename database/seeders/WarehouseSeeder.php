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
                'address' => 'Al Quds Street, Warehouse No. 35, Industrial City, Riyadh, Saudi Arabia',
                'total_area' => '2000 Sq.m',
                'total_pallets' => '200',
                'available_pallets' => '160',
                'pallet_dimension' => '10 x 10 x 10',
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
