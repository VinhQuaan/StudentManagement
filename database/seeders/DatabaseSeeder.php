<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call( CourseSeeder::class);
        $this->call( PermissionTableSeeder::class);
        $this->call( CreateAdminUserSeeder::class);
    }
}
