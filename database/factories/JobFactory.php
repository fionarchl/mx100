<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => User::where('role_id', 1)->inRandomOrder()->first()->id,
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['draft', 'published']),
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
        ];
    }
}
