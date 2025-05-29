<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'WFN',
            'email' => 'admin@wfn.com',
            'password' => bcrypt('secret'),
            'role' => 'admin',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'first_name' => 'Zajjith',
            'last_name' => 'Ahmath',
            'email' => 'zajjith@epirco.net',
            'password' => bcrypt('secret'),
            'role' => 'manager',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'first_name' => 'Yaara',
            'last_name' => 'Zajjel',
            'email' => 'yaara@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'tenant',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
