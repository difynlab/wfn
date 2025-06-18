<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                'first_name' => 'Admin',
                'last_name' => 'WFN',
                'email' => 'admin@wfn.com',
                'password' => bcrypt('secret'),
                'role' => 'admin'
            ],
            [
                'first_name' => 'Zajjith',
                'last_name' => 'Ahmath',
                'email' => 'zajjith@epirco.net',
                'password' => bcrypt('secret'),
                'role' => 'manager',
            ],
            [
                'first_name' => 'Yaara',
                'last_name' => 'Zajjel',
                'email' => 'yaara@gmail.com',
                'password' => bcrypt('secret'),
                'role' => 'tenant',
            ]
        ];

        foreach($records as $record) {
            User::create($record);
        }
    }
}
