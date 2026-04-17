<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Employer One',
                'email' => 'employer@mail.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'phone_number' => '0811111111',
                'created_by' => 'SYSTEM'
            ],
            [
                'id' => 2,
                'name' => 'Freelancer One',
                'email' => 'freelancer@mail.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'phone_number' => '0822222222',
                'created_by' => 'SYSTEM'
            ]
        ]);
    }
}
