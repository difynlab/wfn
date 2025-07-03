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
                'logo' => 'logo.png',
                'footer_logo' => 'footer-logo.png',
                'favicon' => 'favicon.png',
                'guest_image' => 'guest-image.jpg',
                'no_image' => 'no-image.jpg',
                'no_profile_image' => 'no-profile-image.png'
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
