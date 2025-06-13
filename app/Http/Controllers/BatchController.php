<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::with('course')->get();
        return view('batches.index', compact('batches'));
    }

    public function create(): View
    {
        $courses = Course::all();
        return view('batches.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:batches,code',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Active,Completed,Cancelled',
        ]);

        Batch::create($validated);
        return redirect('batches')->with('flash_message', 'Batch Added!');
    }

    public function show(string $id): View
    {
        $batch = Batch::with('course')->findOrFail($id);
        return view('batches.show', compact('batch'));
    }

    public function edit(string $id): View
    {
        $batch = Batch::findOrFail($id);
        $courses = Course::all();
        return view('batches.edit', compact('batch', 'courses'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:batches,code,' . $id,
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Active,Completed,Cancelled',
        ]);

        $batch = Batch::findOrFail($id);
        $batch->update($validated);
        return redirect('batches')->with('flash_message', 'Batch Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch Deleted!');
    }
}
