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
                'name' => 'Vedha Storage',
                'address' => 'Main Road',
                'city' => 'Pottuvil',
                'country' => 'Sri Lanka',
                'latitude' => '10.909993',
                'longitude' => '15.342234',
                'contact_person_name' => 'Shajitha',
                'contact_person_email' => 'shajitha@gmail.com',
                'contact_person_phone' => '0632248118',
                'total_area' => '2000 Sq',
                'total_lots' => '20',
                'pallets_count_per_lot' => '10',
                'pallets_for_rent' => '200',
                'pallets_stacked' => 'no',
                'thumbnail' => 'image.png',
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
