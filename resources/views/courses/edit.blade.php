@extends('layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Edit Course</div>
        <div class="card-body bg-light">
            <form method="POST" action="{{ url('/courses/' . $course->id) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Course Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $course->code) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="form-group mt-2">
                    <label>Duration (weeks)</label>
                    <input type="number" name="duration" class="form-control" value="{{ old('duration', $course->duration) }}">
                </div>

                <div class="form-group mt-2">
                    <label>Credit</label>
                    <input type="number" name="credit" class="form-control" value="{{ old('credit', $course->credit) }}">
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ url('/courses') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
