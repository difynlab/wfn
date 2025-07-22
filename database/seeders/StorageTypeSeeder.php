<?php

namespace Database\Seeders;

use App\Models\StorageType;
use Illuminate\Database\Seeder;

class StorageTypeSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name_en' => 'Dry Storage',
                'name_ar' => 'التخزين الجاف',
            ],
            [
                'name_en' => 'Chilled Storage (2C - 8C)',
                'name_ar' => 'التخزين المبرد (2 درجة مئوية - 8 درجة مئوية)',
            ],
            [
                'name_en' => 'Frozen Storage (-18C or below)',
                'name_ar' => 'التخزين المجمد (-18 درجة مئوية أو أقل)',
            ],
            [
                'name_en' => 'Humidity Controlled',
                'name_ar' => 'التحكم في الرطوبة',
            ],
            [
                'name_en' => 'Hazardous Materials Storage',
                'name_ar' => 'تخزين المواد الخطرة',
            ],
            [
                'name_en' => 'Climate-Controlled Storage',
                'name_ar' => 'تخزين مُتحكم في المناخ',
            ]
        ];

        foreach($records as $record) {
            StorageType::updateOrCreate(
                ['name_en' => $record['name_en']],
                $record
            );
        }
    }
}
