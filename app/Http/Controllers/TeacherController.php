<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Course;
use App\Models\Grade;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Teacher']);
        $this->middleware('permission:view-courses')->only(['index', 'show']);
        $this->middleware('permission:edit-grades')->only(['updateGrades']);
    }

    public function index()
    {
        $courses = Course::where('teacher_id', auth()->id())->get();
        return view('teacher.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        abort_unless($course->teacher_id === auth()->id(), 403);
        $grades = $course->grades->pluck('score', 'user_id');
        $students = $course->students; 
        return view('teacher.courses.show', compact('course', 'students', 'grades'));
    }

    public function updateGrades(Request $request, Course $course)
    {
        $request->validate([
            'grades.*' => 'required|numeric|min:0|max:10',
        ]);

        abort_unless($course->teacher_id === auth()->id(), 403);

        foreach ($request->input('grades') as $studentId => $score) {
            Grade::updateOrCreate(
                ['user_id' => $studentId, 'course_id' => $course->id],
                ['score' => $score]
            );
        }

        return back()->with('success', 'Đã cập nhật điểm.');
    }
}

