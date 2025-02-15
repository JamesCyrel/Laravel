@extends('layouts.dashboardTemplate')

@section('title', 'Subjects')

@section('content')
    <div class="container">
        <h1 class="my-4">Subjects</h1>
        <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Units</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->units }}</td>
                        <td>
                            <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection