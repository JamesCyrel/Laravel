@extends('layouts.dashboardTemplate')

@section('title', 'Subjects')

@section('content')
    <div class="container">
        <h1 class="my-4">Subjects</h1>
        <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
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
                                        <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Edit</a>
                                        @if($subject->enrollments->isEmpty())
                                            <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @else
                                            <button class="btn btn-danger btn-sm" disabled title="Cannot delete subject with existing enrollments">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection