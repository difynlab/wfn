<?php

namespace Database\Seeders;

use App\Models\ArticleContent;
use Illuminate\Database\Seeder;

class ArticleContentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                
                // English fields
                'page_name_en' => 'Articles',
                'title_en' => 'Warehouse Insights & Articles',
                'description_en' => 'Stay informed with the latest articles and insights on warehouse solutions, industry trends, and best practices. Explore expert advice and tips to optimize storage, logistics, and supply chain management for your business.',
                'recent_en' => 'Recent',
                'read_more_en' => 'Read more',
                'written_by_en' => 'Written by',
                'related_articles_en' => 'Related Insights & Articles',

                // Arabic fields
                'page_name_ar' => 'مقالات',
                'title_ar' => 'رؤى ومقالات حول المستودعات',
                'description_ar' => 'ابقَ على اطلاع بأحدث المقالات والرؤى حول حلول المستودعات، واتجاهات القطاع، وأفضل الممارسات. استكشف نصائح الخبراء لتحسين إدارة التخزين والخدمات اللوجستية وسلسلة التوريد لأعمالك.',
                'recent_ar' => 'المقالات الحديثة',
                'read_more_ar' => 'اقرأ المزيد',
                'written_by_ar' => 'بقلم',
                'related_articles_ar' => 'رؤى ومقالات ذات صلة',
            ]
        ];

        foreach($records as $record) {
            ArticleContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
