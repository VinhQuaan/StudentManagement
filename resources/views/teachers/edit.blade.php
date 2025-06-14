@extends('layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">Edit Teacher</div>
        <div class="card-body bg-light">
            <form action="{{ url('teachers/' . $teachers->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name', $teachers->name) }}" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ old('address', $teachers->address) }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="{{ old('mobile', $teachers->mobile) }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $teachers->email) }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">-- Select Gender --</option>
                        <option value="Male" {{ old('gender', $teachers->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $teachers->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $teachers->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob', $teachers->dob) }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Department</label>
                    <input type="text" name="department" value="{{ old('department', $teachers->department) }}" class="form-control">
                </div>

                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ url('/teachers') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
