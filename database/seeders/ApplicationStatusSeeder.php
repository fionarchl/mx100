<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ApplicationStatus;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['applied', 'reviewed', 'accepted', 'rejected'];

        foreach ($statuses as $status) {
            ApplicationStatus::create([
                'name' => $status,
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ]);
        }
    }
}