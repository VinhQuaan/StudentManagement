@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Course</h2>

    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $course->code) }}" required>
        </div>

        <div class="form-group">
            <label>Credits</label>
            <input type="number" name="credit" class="form-control" value="{{ old('credit', $course->credit) }}" min="1" required>
        </div>

        <div class="form-group">
            <label>Teacher</label>
            <select name="teacher_id" class="form-control" required>
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }} ({{ $teacher->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Assign Students <small class="text-muted">(Hold Ctrl or Cmd to select multiple)</small></label>
            <select name="student_ids[]" class="form-control" multiple size="10">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ in_array($student->id, $selectedStudents) ? 'selected' : '' }}>
                        {{ $student->name }} ({{ $student->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to List</a>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </div>
    </form>
</div>
@endsection
