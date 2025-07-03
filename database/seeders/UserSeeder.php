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
                'first_name' => 'WFN',
                'last_name' => 'Admin',
                'email' => 'admin@prod.warehousefn.com',
                'password' => bcrypt('WFN@Jul25!'),
                'role' => 'admin'
            ],
            [
                'first_name' => 'Landlord',
                'last_name' => 'Sample',
                'email' => 'landlord@prod.warehousefn.com',
                'password' => bcrypt('WFN@Jul25!'),
                'role' => 'landlord',
            ],
            [
                'first_name' => 'Tenant',
                'last_name' => 'Sample',
                'email' => 'tenant@prod.warehousefn.com',
                'password' => bcrypt('WFN@Jul25!'),
                'role' => 'tenant',
            ]
        ];

        foreach($records as $record) {
            User::create($record);
        }
    }
}
