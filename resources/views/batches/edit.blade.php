@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Edit Batch</div>
        <div class="card-body bg-light">
            <form action="{{ url('/batches/' . $batch->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label>Batch Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $batch->name) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Batch Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $batch->code) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Course</label>
                    <select name="course_id" class="form-control" required>
                        <option value="">-- Select Course --</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $course->id == $batch->course_id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $batch->start_date) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $batch->end_date) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Select Status --</option>
                        <option value="Active" {{ $batch->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Completed" {{ $batch->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ $batch->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ url('/batches') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
