@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Create Page</div>
    <div class="card-body">
        <form action="{{ url('courses') }}" method="post">
            {!! csrf_field() !!}
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control"></br>
            <label>Syllabus</label>
            <input type="text" name="syllabus" id="syllabus" class="form-control"></br>
            <label>Duration</label>
            <input type="text" name="duration" id="duration" class="form-control"></br>
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>
    </div>
</div>
@endsection