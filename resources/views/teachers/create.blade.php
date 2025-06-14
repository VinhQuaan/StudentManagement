@extends('layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Add New Teacher</div>
        <div class="card-body bg-light">
            <form method="POST" action="{{ url('/teachers') }}">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Mobile</label>
                    <input type="text" name="mobile" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">-- Select Gender --</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Department</label>
                    <input type="text" name="department" class="form-control">
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ url('/teachers') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
