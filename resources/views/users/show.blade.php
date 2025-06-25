@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
        <h2>Show User</h2>
        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-3 text-center">
        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default.jpg') }}" 
             alt="User Avatar" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
    </div>

    <div class="col-md-9">
        <div class="form-group mb-3">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>

        <div class="form-group mb-3">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>

        <div class="form-group mb-3">
            <strong>Roles:</strong>
            @if (!empty($user->getRoleNames()))
                @foreach ($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

@if ($user->hasRole('Teacher'))
    <div class="mt-4">
        <h4>Teaching Courses</h4>
        @if (empty($courses))
            <p>No courses assigned.</p>
        @else
            <ul>
                @foreach ($courses as $course)
                    <li>{{ $course->name }} ({{ $course->code }})</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif

@if ($user->hasRole('Student'))
    <div class="mt-4">
        <h4>Enrolled Courses</h4>
        @if (empty($courses))
            <p>No courses enrolled.</p>
        @else
            <ul>
                @foreach ($courses as $course)
                    <li>{{ $course->name }} ({{ $course->code }})</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif


@endsection
