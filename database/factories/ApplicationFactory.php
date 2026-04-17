<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Models\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        $freelancer = User::where('role_id', 2)->inRandomOrder()->first();
        $job = Job::where('status', 'published')->inRandomOrder()->first();
        $status = ApplicationStatus::inRandomOrder()->first();

        return [
            'job_id' => $job?->id,
            'freelancer_id' => $freelancer?->id,
            'cv_path' => 'cv/' . fake()->uuid() . '.pdf',
            'email' => $freelancer?->email,
            'phone_number' => $freelancer?->phone_number,
            'status_id' => $status?->id,
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
        ];
    }
}
