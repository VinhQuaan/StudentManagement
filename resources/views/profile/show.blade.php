@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>

    <div class="card mb-4">
        <div class="card-body text-center">
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default.jpg') }}" 
                 alt="avatar"
                 class="rounded-circle" width="150">

            <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input type="file" name="avatar" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Update Avatar</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
