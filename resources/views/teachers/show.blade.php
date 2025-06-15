@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Teacher Details</div>
        <div class="card-body bg-light">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $teachers->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $teachers->name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $teachers->address }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $teachers->mobile }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $teachers->email }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $teachers->gender }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $teachers->dob }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $teachers->department }}</td>
                </tr>
            </table>
            <div class="text-end">
                <a href="{{ url('/teachers') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
