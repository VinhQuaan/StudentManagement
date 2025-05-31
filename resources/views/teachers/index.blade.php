@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Teacher Management</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/teachers/create') }}" class="btn btn-success btn-sm" title="Add New Teacher">
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
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->mobile }}</td>

                            <td>
                                <a href="{{ url('/teachers/' . $item->id) }}" title="View Teacher">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                </a>
                                <a href="{{ url('/teachers/' . $item->id) . '/edit' }}" title="Edit Teacher">
                                    <button class="btn btn-info">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>    
                                </a>
                                <form method="POST" action="{{ url('/teachers/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" title="Delete Teacher" onclick="return confirm('Are you sure you want to delete this teacher?')">
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