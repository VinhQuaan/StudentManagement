<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StudentCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Course::with('teacher')->get();
        $enrolledCourseIds = $user->courses->pluck('id')->toArray();

        return view('student.courses.index', compact('courses', 'enrolledCourseIds'));
    }

    public function enroll($courseId)
    {
        $user = Auth::user();

        if (!$user->courses->contains($courseId)) {
            $user->courses()->attach($courseId);
        }

        return redirect()->route('student.courses.index')->with('success', 'enrolled the course successfully!');
    }

    public function unenroll($id)
    {
        $user = Auth::user();
        $user->courses()->detach($id);

        return redirect()->route('student.courses.index')->with('success', 'Unenrolled from the course successfully.');
    }

    public function viewEnrolledStudents($id)
    {
        $course = Course::with('students')->findOrFail($id);
        return view('student.courses.view_students', compact('course'));
    }
}
