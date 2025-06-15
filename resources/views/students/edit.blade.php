@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-dark text-white">Edit Student</div>
    <div class="card-body bg-light">
        <form action="{{ url('students/' . $students->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $students->name) }}" class="form-control" required>
            </div>

            <div class="form-group mt-2">
                <label>Address</label>
                <input type="text" name="address" value="{{ old('address', $students->address) }}" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Mobile</label>
                <input type="text" name="mobile" value="{{ old('mobile', $students->mobile) }}" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $students->email) }}" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">-- Select Gender --</option>
                    <option value="Male" {{ old('gender', $students->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $students->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $students->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="{{ old('dob', $students->dob) }}" class="form-control">
            </div>

            <div class="form-group mt-4 text-end">
                <input type="submit" value="Update" class="btn btn-success">
                <a href="{{ url('/students') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
