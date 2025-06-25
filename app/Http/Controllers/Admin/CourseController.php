<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = User::role('teacher')->get();
        $students = User::role('student')->get();
        return view('admin.courses.create', compact('teachers', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:courses',
            'credit' => 'required|numeric|min:1',
            'teacher_id' => 'required|exists:users,id',
            'student_ids' => 'array',
        ]);

        $course = Course::create($request->only('name', 'code', 'credit', 'teacher_id'));
        $course->students()->sync($request->student_ids ?? []);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $teachers = User::role('teacher')->get();
        $students = User::role('student')->get();
        $selectedStudents = $course->students->pluck('id')->toArray();

        return view('admin.courses.edit', compact('course', 'teachers', 'students', 'selectedStudents'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:courses,code,' . $course->id,
            'credit' => 'required|numeric|min:1',
            'teacher_id' => 'required|exists:users,id',
            'student_ids' => 'array',
        ]);

        $course->update($request->only('name', 'code', 'credit', 'teacher_id'));
        $course->students()->sync($request->student_ids ?? []);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }
}

