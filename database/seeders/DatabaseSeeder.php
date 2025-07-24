<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StorageTypeSeeder::class,
            WarehouseSeeder::class,
            HomepageContentSeeder::class,
            SettingsSeeder::class,
            AuthenticationContentSeeder::class,
            SupportContentSeeder::class,
            ArticleContentSeeder::class,
            AboutContentSeeder::class,
            ArticleCategorySeeder::class,
            ArticleSeeder::class,
            ReviewSeeder::class,
            PrivacyPolicyContentSeeder::class,
            TermsOfUseContentSeeder::class,
            CommonContentSeeder::class,
            WarehouseContentSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
