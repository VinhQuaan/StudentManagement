@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong><br>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <span class="badge badge-success">{{ $v->name }}</span>
                @endforeach
            @else
                <span class="text-muted">No permissions assigned.</span>
            @endif
        </div>
    </div>
</div>
@endsection
