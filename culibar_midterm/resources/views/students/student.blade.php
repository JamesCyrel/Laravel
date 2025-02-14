@extends('layouts.dashboardTemplate')

@section('title', 'Add Student')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Students List</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add Student</a>
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                <ul class="list-group">
                    @foreach($students as $student)
                        <li class="list-group-item">
                            {{ $student->name }} ({{ $student->student_number }})
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
