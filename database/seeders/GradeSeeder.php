<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\User;
use App\Models\Course;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $students = User::role('student')->get();
        $courses = Course::all();

        foreach ($students as $student) {
            // Mỗi sinh viên sẽ có điểm cho một vài khóa học (random 2-4)
            $enrolledCourses = $courses->random(rand(2, 4));

            foreach ($enrolledCourses as $course) {
                Grade::updateOrCreate(
                    ['user_id' => $student->id, 'course_id' => $course->id],
                    ['score' => rand(50, 100) / 10] // điểm từ 5.0 đến 10.0
                );
            }
        }
    }
}
