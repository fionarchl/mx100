<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Job;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        Job::factory()->count(20)->create();
    }
}