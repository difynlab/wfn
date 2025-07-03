<?php

namespace Database\Seeders;

use App\Models\StorageType;
use Illuminate\Database\Seeder;

class StorageTypeSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            ['name' => 'Dry Storage'],
            ['name' => 'Chilled Storage (2C - 8C)'],
            ['name' => 'Frozen Storage (-18C or below)'],
            ['name' => 'Humidity Controlled'],
            ['name' => 'Hazardous Materials Storage'],
            ['name' => 'Climate-Controlled Storage']
        ];

        foreach($records as $record) {
            StorageType::updateOrCreate(
                ['name' => $record['name']],
                $record
            );
        }
    }
}
