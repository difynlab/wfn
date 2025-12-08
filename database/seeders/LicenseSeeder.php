<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name_en' => 'Retail',
                'name_ar' => 'تجارة التجزئة',
            ],
            [
                'name_en' => 'E-commerce',
                'name_ar' => 'التجارة الإلكترونية',
            ],
            [
                'name_en' => 'Manufacturing',
                'name_ar' => 'التصنيع',
            ],
            [
                'name_en' => 'Logistics & Transportation',
                'name_ar' => 'الخدمات اللوجستية والنقل',
            ],
            [
                'name_en' => 'Food & Beverage',
                'name_ar' => 'الأغذية والمشروبات',
            ],
            [
                'name_en' => 'Pharmaceuticals',
                'name_ar' => 'الأدوية',
            ],
            [
                'name_en' => 'Automotive',
                'name_ar' => 'السيارات',
            ],
            [
                'name_en' => 'Textiles & Apparel',
                'name_ar' => 'المنسوجات والملابس',
            ],
            [
                'name_en' => 'Electronics',
                'name_ar' => 'الإلكترونيات',
            ],
            [
                'name_en' => 'Construction',
                'name_ar' => 'البناء',
            ],
            [
                'name_en' => 'Consumer Goods',
                'name_ar' => 'السلع الاستهلاكية',
            ],
            [
                'name_en' => 'Chemicals',
                'name_ar' => 'المواد الكيميائية',
            ],
            [
                'name_en' => 'Furniture & Home Goods',
                'name_ar' => 'الأثاث والأدوات المنزلية',
            ],
            [
                'name_en' => 'Aerospace',
                'name_ar' => 'الفضاء',
            ],
            [
                'name_en' => 'Energy & Utilities',
                'name_ar' => 'الطاقة والمرافق',
            ]
        ];

        foreach($records as $record) {
            License::updateOrCreate(
                ['name_en' => $record['name_en']],
                $record
            );
        }
    }
}
