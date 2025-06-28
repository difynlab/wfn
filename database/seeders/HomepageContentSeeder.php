<?php

namespace Database\Seeders;

use App\Models\HomepageContent;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                // English fields
                'id'                        => 1,
                'page_name_en'              => 'Home',
                'section_1_title_en'        => 'Find Your Perfect Warehouse, Anytime, Anywhere',
                'section_1_description_en'  => 'Discover the warehouse that works for you. Whether you\'re growing a business or need personal storage, our global network lets you search and book flexible spaces that meet your needs, anytime, anywhere.',
                'section_1_label_1_en'      => 'Location',
                'section_1_placeholder_1_en'=> 'Search warehouses',
                'section_1_label_2_en'      => 'Start & End Date',
                'section_1_placeholder_2_en'=> 'Add dates',
                'section_1_label_3_en'      => 'Storage Type',
                'section_1_placeholder_3_en'=> 'Choose',
                'section_1_button_en'       => 'Search',
                'section_2_title_en'        => 'Explore New Warehouses In Saudi Arabia',
                'section_2_description_en'  => 'Keep up with the newest warehouse updates.',
                'section_2_listed_en'       => 'Listed',
                'section_2_day_ago_en'      => 'day ago',
                'section_2_share_en'        => 'Share',
                'section_2_report_en'       => 'Report',
                'section_3_title_en'        => 'Optimize Your Warehouse Search',
                'section_3_description_en'  => 'Discover the best warehouse spaces in the UAE with the most trusted information for your business needs.',
                'section_3_checkout_en'     => 'Checkout',
                'section_4_title_en'        => 'Coming Soon: App Version of Warehouse Finder Network',
                'section_4_description_en'  => 'Bringing you an even faster and more convenient way to discover and rent warehouses across Saudi Arabia. With user-friendly features and real-time listings, you\'ll be able to find the perfect warehouse anytime, anywhere, right from your mobile device. Stay tuned for a seamless rental experience at your fingertips!',
                'section_4_placeholder_en'  => 'Enter email address',
                'section_4_button_en'       => 'Notify Me',
                'section_5_title_en'        => 'Insights & Articles',
                'section_5_description_en'  => 'Stay informed with the latest industry trends, expert insights, and actionable articles.',
                'section_5_button_en'       => 'View More Articles',
                'section_5_read_more_en'    => 'Read more',
                'section_6_title_en'        => 'Ready to advertise your warehouse?',
                'section_6_sub_title_en'    => 'We\'ve got you covered.',
                'section_6_button_en'       => 'Advertise Now',

                // Arabic fields
                'page_name_ar'              => 'الصفحة الرئيسية',
                'section_1_title_ar'        => 'اعثر على مستودعك المثالي، في أي وقت، وفي أي مكان',
                'section_1_description_ar'  => 'اكتشف المستودع الأنسب لك. سواء كنت تُنمّي أعمالك أو تحتاج إلى تخزين شخصي، تُتيح لك شبكتنا العالمية البحث عن مساحات مرنة تُلبي احتياجاتك وحجزها، في أي وقت، وفي أي مكان.',
                'section_1_label_1_ar'      => 'الموقع',
                'section_1_placeholder_1_ar'=> 'البحث عن المستودعات',
                'section_1_label_2_ar'      => 'تاريخ البدء والانتهاء',
                'section_1_placeholder_2_ar'=> 'إضافة تواريخ',
                'section_1_label_3_ar'      => 'نوع التخزين',
                'section_1_placeholder_3_ar'=> 'اختيار',
                'section_1_button_ar'       => 'بحث',
                'section_2_title_ar'        => 'استكشف المستودعات الجديدة في المملكة العربية السعودية',
                'section_2_description_ar'  => 'تابع آخر تحديثات المستودعات.',
                'section_2_listed_ar'       => 'مُدرج',
                'section_2_day_ago_ar'      => 'منذ يوم',
                'section_2_share_ar'        => 'مشاركة',
                'section_2_report_ar'       => 'إبلاغ',
                'section_3_title_ar'        => 'حسّن بحثك عن المستودعات',
                'section_3_description_ar'  => 'اكتشف أفضل مساحات المستودعات في الإمارات العربية المتحدة مع أكثر المعلومات موثوقية لاحتياجات عملك.',
                'section_3_checkout_ar'     => 'الدفع',
                'section_4_title_ar'        => 'قريبًا: تطبيق شبكة البحث عن المستودعات',
                'section_4_description_ar'  => 'نُقدم لك طريقة أسرع وأكثر ملاءمة لاكتشاف واستئجار المستودعات في جميع أنحاء المملكة العربية السعودية. مع ميزات سهلة الاستخدام وقوائم فورية، ستتمكن من العثور على المستودع المثالي في أي وقت، وفي أي مكان، مباشرةً من جهازك المحمول. تابعنا لتجربة تأجير سلسة في متناول يدك!',
                'section_4_placeholder_ar'  => 'أدخل عنوان البريد الإلكتروني',
                'section_4_button_ar'       => 'أعلمني',
                'section_5_title_ar'        => 'الرؤى والمقالات',
                'section_5_description_ar'  => 'ابقَ على اطلاع بأحدث اتجاهات الصناعة، ورؤى الخبراء، والمقالات العملية.',
                'section_5_button_ar'       => 'اطلع على المزيد من المقالات',
                'section_5_read_more_ar'    => 'اقرأ المزيد',
                'section_6_title_ar'        => 'هل أنت مستعد للإعلان عن مستودعك؟',
                'section_6_sub_title_ar'    => 'نحن نلبي جميع احتياجاتك.',
                'section_6_button_ar'       => 'أعلن الآن',
            ]
        ];

        foreach($records as $record) {
            HomepageContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
