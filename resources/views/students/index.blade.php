@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <!-- Main Card -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Student Management</h2>
            <a href="{{ url('/students/create') }}" class="btn btn-outline-light btn-sm">
                <i class="fa fa-plus"></i> Add New Student
            </a>
        </div>

        <div class="card-body bg-dark text-white">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead class="thead-light">
                        <tr>
                             <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
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
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>
                                <a href="{{ url('/students/' . $item->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="{{ url('/students/' . $item->id . '/edit') }}" class="btn btn-outline-warning btn-sm mb-1">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ url('/students/' . $item->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
