@extends('layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Add New Course</div>
        <div class="card-body bg-light">
            <form method="POST" action="{{ url('/courses') }}">
                @csrf

                <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Course Code</label>
                    <input type="text" name="code" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="form-group mt-2">
                    <label>Duration (weeks)</label>
                    <input type="number" name="duration" class="form-control" min="1">
                </div>

                <div class="form-group mt-2">
                    <label>Credit</label>
                    <input type="number" name="credit" class="form-control" min="1">
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ url('/courses') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
