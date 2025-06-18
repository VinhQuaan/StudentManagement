<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;

class CourseStudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = User::role('student')->get();
        $courses = Course::all();

        foreach ($courses as $course) {
            $randomStudents = $students->random(rand(10, 20))->pluck('id');
            $course->students()->syncWithoutDetaching($randomStudents);
        }
    }
}
