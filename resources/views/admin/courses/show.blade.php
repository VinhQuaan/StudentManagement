@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Course Details</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $course->name }}</h4>
            <p><strong>Code:</strong> {{ $course->code }}</p>
            <p><strong>Credits:</strong> {{ $course->credit }}</p>
            <p><strong>Teacher:</strong> {{ $course->teacher->name ?? 'N/A' }}</p>
        </div>
    </div>

    <h4>Enrolled Students ({{ $course->students->count() }})</h4>

    @if($course->students->isEmpty())
        <div class="alert alert-warning">No students assigned to this course.</div>
    @else
        <table class="table table-bordered">
            <thead class="thead-light">
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

    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
