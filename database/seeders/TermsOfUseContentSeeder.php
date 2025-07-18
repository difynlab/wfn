<?php

namespace Database\Seeders;

use App\Models\TermsOfUseContent;
use Illuminate\Database\Seeder;

class TermsOfUseContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                
                // English fields
                'page_name_en' => 'Terms of Use',
                'title_en' => 'Terms and Conditions',
                'description_en' => 'These Terms and Conditions govern your use of our warehouse rental platform. By accessing or using our services, you agree to comply with the rules, responsibilities, and legal obligations outlined here. Please read them carefully before listing or booking a warehouse.',

                // Arabic fields
                'page_name_ar' => 'شروط الاستخدام',
                'title_ar' => 'الشروط والأحكام',
                'description_ar' => 'تُنظّم هذه الشروط والأحكام استخدامك لمنصة تأجير المستودعات لدينا. باستخدامك لخدماتنا، فإنك توافق على الالتزام بالقواعد والمسؤوليات والالتزامات القانونية الموضحة هنا. يُرجى قراءتها بعناية قبل إدراج أو حجز مستودع.',
            ]
        ];

        foreach($records as $record) {
            TermsOfUseContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
