@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Course List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Code</th>
                <th>Credits</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->credit }}</td>
                    <td>{{ $course->teacher->name ?? 'Unknown' }}</td>
                    <td>
                        @if(in_array($course->id, $enrolledCourseIds))
                            <form method="POST" action="{{ route('student.courses.unenroll', $course->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm">Unenroll</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('student.courses.enroll', $course->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Enroll</button>
                            </form>
                        @endif
                        <a href="{{ route('student.courses.view_students', $course->id) }}" class="btn btn-info btn-sm">View Students</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
