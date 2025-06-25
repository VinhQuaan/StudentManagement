<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = User::role('teacher')->get();

        if ($teachers->isEmpty()) {
            $this->command->warn('Không có teacher nào trong hệ thống. Hãy seed teacher trước.');
            return;
        }

        $courseNames = [
            'Database Systems', 'Operating Systems', 'Machine Learning',
            'Web Development', 'Mobile App Development', 'Computer Networks',
            'Artificial Intelligence', 'Data Structures', 'Software Engineering'
        ];

        foreach ($courseNames as $courseName) {
            Course::create([
                'name' => $courseName,
                'code' => 'CSE' . rand(100, 999),
                'description' => 'Description' . $courseName,
                'duration' => rand(4, 16),
                'credit' => rand(2, 5),
                'teacher_id' => $teachers->random()->id, 
            ]);
        }
    }
}
