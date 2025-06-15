@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Batch Management</h2>
            <a href="{{ url('/batches/create') }}" class="btn btn-outline-light btn-sm">
                <i class="fa fa-plus"></i> Add New Batch
            </a>
        </div>

        <div class="card-body bg-dark text-white">
            @if(session('flash_message'))
                <div class="alert alert-success">{{ session('flash_message') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-dark align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Course</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($batches as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->course->name ?? 'N/A' }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url('/batches/' . $item->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="{{ url('/batches/' . $item->id . '/edit') }}" class="btn btn-outline-warning btn-sm mb-1">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ url('/batches/' . $item->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted">No batches found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
