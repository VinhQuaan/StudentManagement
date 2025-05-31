@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('teachers/' .$teachers->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Name</label>
            <input type="text" name="name" id="name" value="{{ $teachers->name }}" class="form-control"></br>
            <label>Address</label>
            <input type="text" name="address" id="address" value="{{ $teachers->address }}" class="form-control"></br>
            <label>Mobile</label>
            <input type="text" name="mobile" id="mobile" value="{{ $teachers->mobile }}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@endsection