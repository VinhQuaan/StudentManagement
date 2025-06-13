@extends('layout')

@section('content')
<div class="container mt-4">
    <!-- Main Card -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Student Management</h2>
            <!-- Button to Add New Student -->
            <a href="{{ url('/students/create') }}" class="btn btn-outline-light btn-sm" title="Add New Student">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
            </a>
        </div>

        <div class="card-body bg-dark text-white">
            <!-- Table Container -->
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>
                                    <!-- View Button -->
                                    <a href="{{ url('/students/' . $item->id) }}" class="btn btn-outline-info btn-sm mb-1" title="View Student">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <!-- Edit Button -->
                                    <a href="{{ url('/students/' . $item->id) . '/edit' }}" class="btn btn-outline-warning btn-sm mb-1" title="Edit Student">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ url('/students/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete Student" onclick="return confirm('Are you sure you want to delete this student?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End Table Container -->
        </div> <!-- End Card Body -->
    </div> <!-- End Main Card -->
</div> <!-- End Container -->
@endsection
