<?php

namespace Database\Seeders;

use App\Models\MovementService;
use Illuminate\Database\Seeder;

class MovementServiceSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name_en' => 'Pallet/SqM Inbound Charges',
                'name_ar' => 'رسوم واردة (بالت/متر مربع)',
            ],
            [
                'name_en' => 'Pallet/SqM Outbound Charges',
                'name_ar' => 'رسوم صادرة (بالت/متر مربع)',
            ],
            [
                'name_en' => 'Case Handling Charges',
                'name_ar' => 'رسوم مناولة الشحنات',
            ],
            [
                'name_en' => 'Item/ Unit Handling Charges',
                'name_ar' => 'رسوم مناولة الأصناف/الوحدات',
            ],
            [
                'name_en' => 'Loose Container Unloading - Per 4-ton Diyanna',
                'name_ar' => 'رسوم مناولة الأصناف/الوحدات',
            ],
            [
                'name_en' => 'Loose Container Unloading - Per 20ft',
                'name_ar' => 'رسوم مناولة الأصناف/الوحدات',
            ],
            [
                'name_en' => 'Loose Container Unloading - Per 40ft',
                'name_ar' => 'رسوم مناولة الأصناف/الوحدات',
            ]
        ];

        foreach($records as $record) {
            MovementService::updateOrCreate(
                ['name_en' => $record['name_en']],
                $record
            );
        }
    }
}
