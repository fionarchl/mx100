<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\User;
use App\Models\ApplicationStatus;
use App\Models\Application;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        Application::factory()->count(30)->make()->each(function ($app) {
            Application::firstOrCreate([
                'job_id' => $app->job_id,
                'freelancer_id' => $app->freelancer_id,
            ], $app->toArray());
        });
    }
}