<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_status')->insert([
            ['id' => 1, 'name' => 'applied'],
            ['id' => 2, 'name' => 'reviewed'],
            ['id' => 3, 'name' => 'accepted'],
            ['id' => 4, 'name' => 'rejected'],
        ]);
    }
}
