<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                'name' => 'WFN',
                'logo' => 'd4c78305-e3d1-421f-8317-f251b1ebf4b1.webp',
                'footer_logo' => 'd8f55a77-c90d-4ee7-b3ab-e13d780868f1.webp',
                'favicon' => '68cd256d-bdd7-43a6-aeb6-e87f681568d2.webp',
                'guest_image' => '6ce8bb11-abd9-4416-8993-7937e490311e.webp',
                'no_image' => '3256d929-a645-413e-b17b-21aa3700abea.webp',
                'no_profile_image' => '266463c0-e3a2-4ce6-8c9a-c2d31a56ef22.webp'
            ]
        ];

        foreach($records as $record) {
            Setting::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
