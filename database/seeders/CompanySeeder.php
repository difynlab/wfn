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
                'status' => 2
            ],
            [
                'user_id' => 3,
                'status' => 2
            ]
        ];

        foreach($records as $record) {
            Company::create($record);
        }
    }
}
