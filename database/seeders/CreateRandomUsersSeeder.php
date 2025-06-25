<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRandomUsersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Định nghĩa permission cho từng role
        $studentPermissions = [
            'profile',
            'student-course-list',
            'student-course-enroll',
            'student-course-unenroll',
            'student-course-view-students',
        ];

        $teacherPermissions = [
            'profile',
            'view-courses',
            'edit-grades',
        ];

        // Tạo tất cả permissions nếu chưa có
        $allPermissions = array_merge($studentPermissions, $teacherPermissions);
        foreach ($allPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Tạo role và gán permission
        $teacherRole = Role::firstOrCreate(['name' => 'Teacher']);
        $teacherRole->syncPermissions($teacherPermissions);

        $studentRole = Role::firstOrCreate(['name' => 'Student']);
        $studentRole->syncPermissions($studentPermissions);

        // Tạo teacher users
        for ($i = 0; $i < 20; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123456'),
            ]);
            $user->assignRole($teacherRole); // gán role có sẵn permission
        }

        // Tạo student users
        for ($i = 0; $i < 30; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123456'),
            ]);
            $user->assignRole($studentRole);
        }
    }
}

