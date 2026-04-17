<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'password' => Hash::make('password'),
            'role_id' => 1,
            'profile_photo' => null,
            'profile_description' => fake()->sentence(),
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
        ];
    }
}
