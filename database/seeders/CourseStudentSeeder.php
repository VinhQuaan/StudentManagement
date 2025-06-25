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
            $numberToSelect = min(rand(10, 20), $students->count());
            if ($numberToSelect === 0) {
                continue;
            }

            $randomStudents = $students->random($numberToSelect)->pluck('id');
            $course->students()->syncWithoutDetaching($randomStudents);
        }
    }
}
