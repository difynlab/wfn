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
                'section_2_size_1_en' => 'Up to 50 Pallets',
                'section_2_size_2_en' => 'Up to 100 Pallets',
                'section_2_size_3_en' => 'Up to 200 Pallets',
                'section_2_size_4_en' => '200+ Pallets',
                'section_2_type_en' => 'Warehouse Type',
                'section_2_price_en' => 'Price',
                'section_2_button_en' => 'Apply Filters',
                'section_3_new_en' => 'New',
                'section_3_unlock_en' => 'Unlock Pricing',
                'section_3_listed_en' => 'Listed',
                'section_3_day_ago_en' => 'day ago',
                'section_3_like_en' => 'Like',
                'section_3_share_en' => 'Share',
                // 'section_3_report_en' => 'Report',
                'section_3_popular_en' => 'Popular Warehouses',
                'section_3_top_rated_en' => 'Top-Rated Warehouses',
                'section_4_title_en' => 'More available warehouses in the same area',
                'section_4_unlock_en' => 'Unlock Pricing',

                'inner_page_section_2_description_en' => 'years of experience as a lender',
                'inner_page_section_2_talk_to_expert_en' => 'Talk to an Expert',
                'inner_page_section_2_rating_en' => 'Rating',
                'inner_page_section_2_reviews_en' => 'Reviews',
                'inner_page_section_2_total_cost_en' => 'Total Cost',
                'inner_page_section_2_unlock_en' => 'Unlock Pricing',
                'inner_page_section_2_tenure_start_en' => 'Tenure Start',
                'inner_page_section_2_tenure_end_en' => 'Tenure End',
                'inner_page_section_2_add_date_en' => 'Add Date',
                'inner_page_section_2_button_en' => 'Book Now',
                'inner_page_section_2_note_en' => 'You won\'t be charged yet',
                'inner_page_section_2_report_listing_en' => 'Report this listing',
                'inner_page_section_3_title_en' => 'Other Amenities',
                'inner_page_section_5_title_en' => 'Client Reviews',
                'inner_page_section_6_title_en' => 'More Details on Policies & Safety',
                'inner_page_section_7_title_en' => 'More available warehouses in the same area',
                'inner_page_section_7_unlock_en' => 'Unlock Pricing',
                'inner_page_modal_title_en' => 'Confirm Booking',
                'inner_page_modal_description_en' => 'Review your booking details and confirm your reservation',
                'inner_page_modal_reviews_en' => 'reviews',
                'inner_page_modal_details_en' => 'Booking Details',
                'inner_page_modal_tenure_start_date_en' => 'Tenure Start Date',
                'inner_page_modal_tenure_end_date_en' => 'Tenure End Date',
                'inner_page_modal_no_of_pallets_en' => 'No of Pallets',
                'inner_page_modal_button_en' => 'Confirm',

                'inner_page_expert_modal_title_en' => 'Talk to an Expert',
                'inner_page_expert_modal_description_en' => 'Our expert is ready to help with anything you need. Just let us know.',
                'inner_page_expert_modal_subject_en' => 'Subject',
                'inner_page_expert_modal_subject_placeholder_en' => 'Please enter your subject',
                'inner_page_expert_modal_message_en' => 'Message',
                'inner_page_expert_modal_message_placeholder_en' => 'Please enter your message',
                'inner_page_expert_modal_button_en' => 'Send Now',

                'inner_page_report_modal_title_en' => 'Report this Warehouse',
                'inner_page_report_modal_description_en' => 'Let us know the reason for your reporting.',
                'inner_page_report_modal_reason_en' => 'Reason',
                'inner_page_report_modal_reason_placeholder_en' => 'Please enter your reason',
                'inner_page_report_modal_button_en' => 'Submit',

                // Arabic fields
                'page_name_ar' => 'المستودعات',
                'section_1_title_ar' => 'ابدأ بحثك هنا',
                'section_1_description_ar' => 'تصفح مساحات المستودعات المتاحة، واحجزها فورًا، واحصل على الموقع المثالي لأعمالك. المرونة والراحة في متناول يديك.',
                'section_2_title_ar' => 'مستودعات للإيجار في السعودية',
                'section_2_warehouses_ar' => 'المستودعات',
                'section_2_map_view_ar' => 'عرض الخريطة',
                'section_2_search_ar' => 'البحث عن الموقع',
                'section_2_size_ar' => 'حجم المستودع',
                'section_2_size_1_ar' => 'ما يصل إلى 50 منصة نقالة',
                'section_2_size_2_ar' => 'ما يصل إلى 100 منصة نقالة',
                'section_2_size_3_ar' => 'ما يصل إلى 200 منصة نقالة',
                'section_2_size_4_ar' => 'أكثر من 200 منصة نقالة',
                'section_2_type_ar' => 'نوع المستودع',
                'section_2_price_ar' => 'سعر',
                'section_2_button_ar' => 'تطبيق المرشحات',
                'section_3_new_ar' => 'جديد',
                'section_3_unlock_ar' => 'فتح التسعير',
                'section_3_listed_ar' => 'مُدرج',
                'section_3_day_ago_ar' => 'منذ يوم',
                'section_3_like_ar' => 'يحب',
                'section_3_share_ar' => 'يشارك',
                // 'section_3_report_ar' => 'تقرير',
                'section_3_popular_ar' => 'المستودعات الشعبية',
                'section_3_top_rated_ar' => 'أفضل المستودعات تقييمًا',
                'section_4_title_ar' => 'مزيد من المستودعات المتاحة في نفس المنطقة',
                'section_4_unlock_ar' => 'فتح التسعير',

                'inner_page_section_2_description_ar' => 'سنوات من الخبرة كمقرض',
                'inner_page_section_2_talk_to_expert_ar' => 'تحدث إلى خبير',
                'inner_page_section_2_rating_ar' => 'تصنيف',
                'inner_page_section_2_reviews_ar' => 'المراجعات',
                'inner_page_section_2_total_cost_ar' => 'التكلفة الإجمالية',
                'inner_page_section_2_unlock_ar' => 'التكلفة الإجمالية',
                'inner_page_section_2_tenure_start_ar' => 'بداية الحيازة',
                'inner_page_section_2_tenure_end_ar' => 'نهاية الولاية',
                'inner_page_section_2_add_date_ar' => 'إضافة تاريخ',
                'inner_page_section_2_button_ar' => 'احجز الآن',
                'inner_page_section_2_note_ar' => 'لن يتم تحصيل رسوم منك بعد',
                'inner_page_section_2_report_listing_ar' => 'الإبلاغ عن هذه القائمة',
                'inner_page_section_3_title_ar' => 'وسائل الراحة الأخرى',
                'inner_page_section_5_title_ar' => 'آراء العملاء',
                'inner_page_section_6_title_ar' => 'مزيد من التفاصيل حول السياسات والسلامة',
                'inner_page_section_7_title_ar' => 'مزيد من المستودعات المتاحة في نفس المنطقة',
                'inner_page_section_7_unlock_ar' => 'فتح التسعير',
                'inner_page_modal_title_ar' => 'تأكيد الحجز',
                'inner_page_modal_description_ar' => 'قم بمراجعة تفاصيل الحجز الخاص بك وتأكيد الحجز الخاص بك',
                'inner_page_modal_reviews_ar' => 'المراجعات',
                'inner_page_modal_details_ar' => 'تفاصيل الحجز',
                'inner_page_modal_tenure_start_date_ar' => 'تاريخ بدء الحيازة',
                'inner_page_modal_tenure_end_date_ar' => 'تاريخ انتهاء المدة',
                'inner_page_modal_no_of_pallets_ar' => 'عدد المنصات',
                'inner_page_modal_button_ar' => 'يتأكد',

                'inner_page_expert_modal_title_ar' => 'تحدث إلى خبير',
                'inner_page_expert_modal_description_ar' => 'خبيرنا جاهز لمساعدتك في أي شيء تحتاجه. فقط أخبرنا.',
                'inner_page_expert_modal_subject_ar' => 'موضوع',
                'inner_page_expert_modal_subject_placeholder_ar' => 'الرجاء إدخال موضوعك',
                'inner_page_expert_modal_message_ar' => 'رسالة',
                'inner_page_expert_modal_message_placeholder_ar' => 'الرجاء إدخال رسالتك',
                'inner_page_expert_modal_button_ar' => 'أرسل الآن',

                'inner_page_report_modal_title_ar' => 'الإبلاغ عن هذا المستودع',
                'inner_page_report_modal_description_ar' => 'أخبرنا عن سبب إبلاغك.',
                'inner_page_report_modal_reason_ar' => 'سبب',
                'inner_page_report_modal_reason_placeholder_ar' => 'الرجاء إدخال السبب الخاص بك',
                'inner_page_report_modal_button_ar' => 'يُقدِّم',
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
