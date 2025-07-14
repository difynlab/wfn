<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicyContent;
use Illuminate\Database\Seeder;

class PrivacyPolicyContentSeeder extends Seeder
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
                'page_name_en' => 'Privacy Policy',
                'title_en' => 'Privacy Policy',
                'description_en' => 'Your privacy is important to us. This Privacy Policy outlines how we collect, use, and protect your personal information when you visit our website or use our services. Please review it carefully to understand our practices and your rights. Whether you\'re listing a warehouse or booking one, your privacy is our priority.',

                // Arabic fields
                'page_name_ar' => 'سياسة الخصوصية',
                'title_ar' => 'سياسة الخصوصية',
                'description_ar' => 'خصوصيتك تهمنا. توضح سياسة الخصوصية هذه كيفية جمع معلوماتك الشخصية واستخدامها وحمايتها عند زيارتك لموقعنا الإلكتروني أو استخدام خدماتنا. يُرجى مراجعتها بعناية لفهم ممارساتنا وحقوقك. سواءً كنت تُدرج مستودعًا أو تحجز واحدًا، فإن خصوصيتك هي أولويتنا.',
            ]
        ];

        foreach($records as $record) {
            PrivacyPolicyContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
