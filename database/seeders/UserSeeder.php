<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
        $employerRole = Role::where('name', 'employer')->first();
        $freelancerRole = Role::where('name', 'freelancer')->first();

        User::factory()->create([
            'name' => 'Employer One',
            'email' => 'employer@mail.com',
            'role_id' => $employerRole->id
        ]);

        User::factory()->create([
            'name' => 'Freelancer One',
            'email' => 'freelancer@mail.com',
            'role_id' => $freelancerRole->id,
        ]);

    }
}