<?php

namespace Database\Seeders;

use App\Models\WarehouseContent;
use Illuminate\Database\Seeder;

class WarehouseContentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                
                // English fields
                'page_name_en' => 'Warehouses',
                'section_1_title_en' => 'Begin Your Search Here',
                'section_1_description_en' => 'Browse available warehouse spaces, book instantly, and secure the perfect location for your business. Flexibility and convenience at your fingertips.',
                'section_2_title_en' => 'Warehouses For Rent in Saudi Arabia',
                'section_2_warehouses_en' => 'warehouses',
                'section_2_map_view_en' => 'Map View',
                'section_2_search_en' => 'Search for Location',
                'section_2_size_en' => 'Warehouse Size',
                'section_2_type_en' => 'Warehouse Type',
                'section_2_price_en' => 'Price',
                'section_2_button_en' => 'Apply Filters',
                'section_3_new_en' => 'New',
                'section_3_unlock_en' => 'Unlock Pricing',
                'section_3_listed_en' => 'Listed',
                'section_3_day_ago_en' => 'day ago',
                'section_3_like_en' => 'Like',
                'section_3_share_en' => 'Share',
                'section_3_report_en' => 'Report',
                'section_3_popular_en' => 'Popular Warehouses',
                'section_3_nearby_en' => 'Near by Results',
                'section_4_title_en' => 'More available warehouses in the same area',

                // Arabic fields
                'page_name_ar' => 'المستودعات',
                'section_1_title_ar' => 'ابدأ بحثك هنا',
                'section_1_description_ar' => 'تصفح مساحات المستودعات المتاحة، واحجزها فورًا، واحصل على الموقع المثالي لأعمالك. المرونة والراحة في متناول يديك.',
                'section_2_title_ar' => 'مستودعات للإيجار في السعودية',
                'section_2_warehouses_ar' => 'المستودعات',
                'section_2_map_view_ar' => 'عرض الخريطة',
                'section_2_search_ar' => 'البحث عن الموقع',
                'section_2_size_ar' => 'حجم المستودع',
                'section_2_type_ar' => 'نوع المستودع',
                'section_2_price_ar' => 'سعر',
                'section_2_button_ar' => 'تطبيق المرشحات',
                'section_3_new_ar' => 'جديد',
                'section_3_unlock_ar' => 'فتح التسعير',
                'section_3_listed_ar' => 'مُدرج',
                'section_3_day_ago_ar' => 'منذ يوم',
                'section_3_like_ar' => 'يحب',
                'section_3_share_ar' => 'يشارك',
                'section_3_report_ar' => 'تقرير',
                'section_3_popular_ar' => 'المستودعات الشعبية',
                'section_3_nearby_ar' => 'النتائج القريبة',
                'section_4_title_ar' => 'مزيد من المستودعات المتاحة في نفس المنطقة',
            ]
        ];

        foreach($records as $record) {
            WarehouseContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
