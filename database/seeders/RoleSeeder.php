<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['employer', 'freelancer'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ]);
        }

    }
}