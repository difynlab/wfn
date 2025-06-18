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
                'pallet' => '20',
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
