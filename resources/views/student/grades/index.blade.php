@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Grade Report</h2>

    @if($grades->isEmpty())
        <div class="alert alert-info">You have no grades recorded yet.</div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Credits</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $index => $grade)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $grade->course->name ?? 'N/A' }}</td>
                        <td>{{ $grade->course->code ?? 'N/A' }}</td>
                        <td>{{ $grade->course->credit ?? 'N/A' }}</td>
                        <td>{{ $grade->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
