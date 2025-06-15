@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Batch Details</div>
        <div class="card-body bg-light">
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $batch->id }}</td></tr>
                <tr><th>Name</th><td>{{ $batch->name }}</td></tr>
                <tr><th>Code</th><td>{{ $batch->code }}</td></tr>
                <tr><th>Course</th><td>{{ $batch->course->name ?? 'N/A' }}</td></tr>
                <tr><th>Start Date</th><td>{{ $batch->start_date }}</td></tr>
                <tr><th>End Date</th><td>{{ $batch->end_date }}</td></tr>
                <tr><th>Status</th><td>{{ $batch->status }}</td></tr>
            </table>
            <div class="text-end">
                <a href="{{ url('/batches') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
