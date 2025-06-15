@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Course Details</div>
        <div class="card-body bg-light">
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $course->id }}</td></tr>
                <tr><th>Name</th><td>{{ $course->name }}</td></tr>
                <tr><th>Code</th><td>{{ $course->code }}</td></tr>
                <tr><th>Description</th><td>{{ $course->description }}</td></tr>
                <tr><th>Duration</th><td>{{ $course->duration }} weeks</td></tr>
                <tr><th>Credit</th><td>{{ $course->credit }}</td></tr>
            </table>
            <div class="text-end">
                <a href="{{ url('/courses') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
