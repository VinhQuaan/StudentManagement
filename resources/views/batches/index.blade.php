@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Batch Management</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/batches/create') }}" class="btn btn-success btn-sm" title="Add New Batch">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course id</th>
                        <th>Start date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($batches as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course_id }}</td>
                            <td>{{ $item->start_date }}</td>

                            <td>
                                <a href="{{ url('/batches/' . $item->id) }}" title="View Batch">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                </a>
                                <a href="{{ url('/batches/' . $item->id) . '/edit' }}" title="Edit Batch">
                                    <button class="btn btn-info">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>    
                                </a>
                                <form method="POST" action="{{ url('/batches/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" title="Delete Batch" onclick="return confirm('Are you sure you want to delete this batch?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection