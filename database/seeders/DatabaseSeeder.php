<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $companyId = DB::table('companies')->insertGetId([
            'name' => 'CraftFlow Inc.',
            'theme' => 'minimal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@craftflow.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'company_id' => $companyId,
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@craftflow.test',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'company_id' => $companyId,
        ]);

        User::create([
            'name' => 'Employee User',
            'email' => 'employee@craftflow.test',
            'password' => Hash::make('password'),
            'role' => 'employee',
            'company_id' => $companyId,
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
