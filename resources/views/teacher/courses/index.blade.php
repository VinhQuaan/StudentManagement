@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Courses You Are Teaching</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($courses->isEmpty())
        <div class="alert alert-warning">You are not assigned to any courses.</div>
    @else
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Code</th>
                    <th>Credits</th>
                    <th>Enrolled Students</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $index => $course)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->code ?? 'N/A' }}</td>
                        <td>{{ $course->credit ?? 'N/A' }}</td>
                        <td>{{ $course->students_count ?? $course->students->count() }}</td>
                        <td class="text-center">
                            <a href="{{ route('teacher.course.show', $course->id) }}#grade"
                            class="btn btn-sm btn-success">
                                Manage Grades
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
