@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students Enrolled in "{{ $course->name }}"</h2>

    <a href="{{ route('student.courses.index') }}" class="btn btn-secondary mb-3">Back to Course List</a>

    @if($course->students->isEmpty())
        <p>No students have enrolled in this course yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
