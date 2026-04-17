<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs_mx100')->insert([
            [
                'id' => 1,
                'employer_id' => 1,
                'title' => 'Backend Developer',
                'description' => 'Laravel API development',
                'status' => 'published',
                'created_by' => 'SYSTEM'
            ],
            [
                'id' => 2,
                'employer_id' => 1,
                'title' => 'Frontend Developer',
                'description' => 'React development',
                'status' => 'draft',
                'created_by' => 'SYSTEM'
            ]
        ]);
    }
}
