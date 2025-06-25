@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Course List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.courses.create') }}" class="btn btn-success mb-3">Create New Course</a>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Credits</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $index => $course)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->credit }}</td>
                    <td>{{ $course->teacher->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm">Show</a>

                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure to delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
