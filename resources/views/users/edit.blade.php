@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger mt-3">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row mt-3">

    <div class="col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
        </div>
    </div>

    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
{!! Form::close() !!}

@endsection
