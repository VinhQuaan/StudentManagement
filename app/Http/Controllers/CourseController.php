<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses,code',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer|min:1',
            'credit' => 'nullable|integer|min:1',
        ]);

        Course::create($validated);
        return redirect('courses')->with('flash_message', 'Course Added!');
    }

    public function show(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses,code,' . $id,
            'description' => 'nullable|string',
            'duration' => 'nullable|integer|min:1',
            'credit' => 'nullable|integer|min:1',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect('courses')->with('flash_message', 'Course Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course Deleted!');
    }
}
