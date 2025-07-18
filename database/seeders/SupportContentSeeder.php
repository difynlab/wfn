<?php

namespace Database\Seeders;

use App\Models\SupportContent;
use Illuminate\Database\Seeder;

class SupportContentSeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                'id' => 1,
                
                // English fields
                'page_name_en' => 'Support',
                'title_en' => 'Hi, how can we help you?',
                'description_en' => 'We\'re here to make your experience smooth and hassle-free. Whether you have questions, need support, or just want to learn more, feel free to reach out. Our team is ready to help with anything you need. Just let us know.',
                'name_en' => 'Name',
                'name_placeholder_en' => 'Please enter your name',
                'phone_en' => 'Contact Number',
                'phone_placeholder_en' => 'E.g.: +966 13 453 2874',
                'email_en' => 'Email',
                'email_placeholder_en' => 'Ex: johnmercury@gmail.com',
                'category_en' => 'Category',
                'category_placeholder_en' => 'Select the category you need assistance with',
                'category_1_en' => 'General',
                'category_2_en' => 'Accounts',
                'category_3_en' => 'Billings',
                'subject_en' => 'Subject',
                'subject_placeholder_en' => 'Please enter your subject',
                'message_en' => 'Message/ Inquiry',
                'message_placeholder_en' => 'Describe the issue or request you need help with.',
                'button_en' => 'Submit Now',

                // Arabic fields
                'page_name_ar' => 'يدعم',
                'title_ar' => 'مرحبًا، كيف يُمكننا مساعدتك؟',
                'description_ar' => 'نحن هنا لنجعل تجربتك سلسة وسهلة. سواءً كانت لديك أسئلة، أو تحتاج إلى دعم، أو ترغب فقط في معرفة المزيد، فلا تتردد في التواصل معنا. فريقنا جاهز لمساعدتك في أي شيء تحتاجه. ما عليك سوى إعلامنا.',
                'name_ar' => 'الاسم',
                'name_placeholder_ar' => 'يرجى إدخال اسمك',
                'phone_ar' => 'رقم الاتصال',
                'phone_placeholder_ar' => 'مثال: +966 13 453 2874',
                'email_ar' => 'البريد الإلكتروني',
                'email_placeholder_ar' => 'مثال: johnmercury@gmail.com',
                'category_ar' => 'الفئة',
                'category_placeholder_ar' => 'اختر الفئة التي تحتاج إلى مساعدة بشأنها',
                'category_1_ar' => 'عام',
                'category_2_ar' => 'الحسابات',
                'category_3_ar' => 'الفواتير',
                'subject_ar' => 'الموضوع',
                'subject_placeholder_ar' => 'يرجى إدخال موضوعك',
                'message_ar' => 'الرسالة/الاستفسار',
                'message_placeholder_ar' => 'صف المشكلة أو الطلب الذي تحتاج إلى مساعدة بشأنه',
                'button_ar' => 'أرسل الآن',
            ]
        ];

        foreach($records as $record) {
            SupportContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
