<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'name' => 'Faisal',
                'designation' => 'Engineer',
                'content' => 'Efficient and user-friendly system. It streamlined our inventory tracking process completely.',
                'star' => 5,
                'language' => 'english',
            ],
            [
                'name' => 'Abdullah',
                'designation' => 'Doctor',
                'content' => 'We\'ve reduced stock errors by 40% since implementing this WMS. Highly recommended.',
                'star' => 5,
                'language' => 'english',
            ],
            [
                'name' => 'سعود',
                'designation' => 'مدير مشروع',
                'content' => 'نظام فعال وسهل الاستخدام، ساعدنا كثيرًا في إدارة المخزون.',
                'star' => 5,
                'language' => 'arabic',
            ],
            [
                'name' => 'Nasser',
                'designation' => 'Government Official',
                'content' => 'Customer support was quick to respond. Setup was easier than expected.',
                'star' => 5,
                'language' => 'english',
            ],
            [
                'name' => 'خالد',
                'designation' => 'مدير تطوير الأعمال',
                'content' => 'تم تقليل الأخطاء في التخزين بشكل ملحوظ منذ استخدام النظام.',
                'star' => 5,
                'language' => 'arabic',
            ],
            [
                'name' => 'سليمان',
                'designation' => 'معلم',
                'content' => 'الدعم الفني ممتاز وسريع الاستجابة، تجربة رائعة.',
                'star' => 5,
                'language' => 'arabic',
            ]
        ];

        foreach($records as $record) {
            Review::create($record);
        }
    }
}
