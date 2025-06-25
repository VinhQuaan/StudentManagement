@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Course: {{ $course->name }}</h2>
    <a href="{{ route('teacher.course.index') }}" class="btn btn-secondary mr-2">Back</a>
    <p><strong>Code:</strong> {{ $course->code ?? 'N/A' }}</p>
    <p><strong>Credits:</strong> {{ $course->credit ?? 'N/A' }}</p>

    <hr>

    <h4>Enrolled Students ({{ $students->count() }})</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($students->isEmpty())
        <div class="alert alert-warning">No students are enrolled in this course.</div>
    @else
        <form method="POST" action="{{ route('teacher.course.grades.update', $course->id) }}">
            @csrf
            @method('POST')

            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <input type="number"
                                    step="0.1"
                                    min="0"
                                    max="10"
                                    name="grades[{{ $student->id }}]"
                                    value="{{ old("grades.{$student->id}", $grades[$student->id] ?? '') }}"
                                    class="form-control @error("grades.{$student->id}") is-invalid @enderror"
                                    required />
                                @error("grades.{$student->id}")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Save Grades</button>
        </form>
    @endif
</div>
@endsection
