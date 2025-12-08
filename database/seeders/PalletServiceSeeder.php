<?php

namespace Database\Seeders;

use App\Models\PalletService;
use Illuminate\Database\Seeder;

class PalletServiceSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name_en' => 'Wooden Pallet Supply',
                'name_ar' => 'توريد منصات خشبية',
            ],
            [
                'name_en' => 'Palletization',
                'name_ar' => 'تكديس المنصات',
            ],
            [
                'name_en' => 'Segregation',
                'name_ar' => 'الفصل',
            ],
            [
                'name_en' => 'Additional Shrink Wrap',
                'name_ar' => 'تغليف إضافي بالانكماش',
            ]
        ];

        foreach($records as $record) {
            PalletService::updateOrCreate(
                ['name_en' => $record['name_en']],
                $record
            );
        }
    }
}
