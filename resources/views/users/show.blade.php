@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
        <h2>Show User</h2>
        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <strong>Roles:</strong>
            @if (!empty($user->getRoleNames()))
                @foreach ($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
