<?php

namespace Database\Seeders;

use App\Models\CommonContent;
use Illuminate\Database\Seeder;

class CommonContentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                
                // English fields
                'header_dashboard_en' => 'Dashboard',
                'header_logout_en' => 'Log Out',
                'footer_title_en' => 'Need warehouse space?',
                'footer_sub_title_en' => 'Let\'s match you with the ideal location!',
                'footer_button_en' => 'Register Now',
                'footer_first_menu_en' => 'Navigation',
                'footer_second_menu_en' => 'Others',
                'footer_third_menu_en' => 'Legal',
                'footer_fourth_menu_en' => 'Social',
                'footer_facebook_en' => 'Facebook',
                'footer_instagram_en' => 'Instagram',
                'footer_copyright_en' => '2025 Warehouse Finder Network. All rights reserved',

                // Arabic fields
                'header_dashboard_ar' => 'لوحة القيادة',
                'header_logout_ar' => 'تسجيل الخروج',
                'footer_title_ar' => 'هل تحتاج إلى مساحة للتخزين؟',
                'footer_sub_title_ar' => 'دعونا نطابقك مع الموقع المثالي!',
                'footer_button_ar' => 'سجل الآن',
                'footer_first_menu_ar' => 'ملاحة',
                'footer_second_menu_ar' => 'آحرون',
                'footer_third_menu_ar' => 'قانوني',
                'footer_fourth_menu_ar' => 'اجتماعي',
                'footer_facebook_ar' => 'فيسبوك',
                'footer_instagram_ar' => 'إنستغرام',
                'footer_copyright_ar' => 'شبكة البحث عن المستودعات ٢٠٢٥. جميع الحقوق محفوظة.',
            ]
        ];

        foreach($records as $record) {
            CommonContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
