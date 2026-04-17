<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'job_id' => 1,
                'freelancer_id' => 2,
                'cv_path' => 'cv/freelancer1.pdf',
                'email' => 'freelancer@mail.com',
                'phone_number' => '0822222222',
                'status_id' => 1, 
                'created_by' => 'SYSTEM'
            ]
        ]);
    }
}
