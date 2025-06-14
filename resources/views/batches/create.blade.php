@extends('layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Add New Batch</div>
        <div class="card-body bg-light">
            <form action="{{ url('/batches') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Batch Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Batch Code</label>
                    <input type="text" name="code" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Course</label>
                    <select name="course_id" class="form-control" required>
                        <option value="">-- Select Course --</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Select Status --</option>
                        <option value="Active">Active</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ url('/batches') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
