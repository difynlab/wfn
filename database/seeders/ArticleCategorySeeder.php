<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name' => 'Market Trends',
                'language' => 'english'
            ],
            [
                'name' => 'Technology',
                'language' => 'english'
            ],
            [
                'name' => 'اتجاهات السوق',
                'language' => 'arabic'
            ],
            [
                'name' => 'تكنولوجيا',
                'language' => 'arabic'
            ],
        ];

        foreach($records as $record) {
            ArticleCategory::updateOrCreate(
                ['name' => $record['name']],
                $record
            );
        }
    }
}
