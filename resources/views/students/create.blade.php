@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-dark text-white">Create New Student</div>
    <div class="card-body bg-light">
        <form action="{{ url('students') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group mt-2">
                <label>Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">-- Select Gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control">
            </div>

            <div class="form-group mt-4 text-end">
                <input type="submit" value="Save" class="btn btn-success">
                <a href="{{ url('/students') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
