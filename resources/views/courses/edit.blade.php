@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('courses/' .$courses->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Name</label>
            <input type="text" name="name" id="name" value="{{ $courses->name }}" class="form-control"></br>
            <label>Syllabus</label>
            <input type="text" name="syllabus" id="syllabus" value="{{ $courses->syllabus }}" class="form-control"></br>
            <label>Duration</label>
            <input type="text" name="duration" id="duration" value="{{ $courses->duration }}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@endsection