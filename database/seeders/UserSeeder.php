<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
                [
                    'name' => 'Admin',                  
                    'email' => 'admin@sample.com',
                    'password' => Hash::make('admin-password'),
                ],
                [
                    'name' => 'Modular',
                    'email' => 'mod@sample.com',
                    'password' => Hash::make('mod-password'),
                ],
                [
                    'name' => 'Member',               
                    'email' => 'member@sample.com',
                    'password' => Hash::make('member-password'),
                ],
            ]
         );

    }
}
