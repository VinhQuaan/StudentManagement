@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Course</h2>
    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf

        <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Credits</label>
            <input type="number" name="credit" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label>Teacher</label>
            <select name="teacher_id" class="form-control" required>
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Assign Students</label>
            <select name="student_ids[]" class="form-control" multiple>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
