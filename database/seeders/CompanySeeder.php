<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                'user_id' => 2,
                'status' => 3
            ],
            [
                'user_id' => 3,
                'status' => 3
            ]
        ];

        foreach($records as $record) {
            Company::create($record);
        }
    }
}
