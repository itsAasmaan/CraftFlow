<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $companyId = DB::table('companies')->insertGetId([
            'name' => 'CraftFlow Inc.',
            'theme' => 'minimal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@craftflow.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'company_id' => $companyId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $projectId = DB::table('projects')->insertGetId([
            'company_id' => $companyId,
            'name' => 'Website Launch',
            'description' => 'Initial project seeded',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tasks')->insert([
            [
                'project_id' => $projectId,
                'title' => 'Gather requirements',
                'status' => 'todo',
                'assigned_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectId,
                'title' => 'Design homepage',
                'status' => 'in_progress',
                'assigned_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}