@extends('layouts.dashboardTemplate')

@section('title', 'Edit Student')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Student</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.students.update', $student) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student->student_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="course" required>
                    <option value="">Select Course</option>
                    <option value="BSIT" {{ $student->course === 'BSIT' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
                    <option value="BSCS" {{ $student->course === 'BSCS' ? 'selected' : '' }}>Bachelor of Science in Computer Science</option>
                    <option value="BSIS" {{ $student->course === 'BSIS' ? 'selected' : '' }}>Bachelor of Science in Information Systems</option>
                    <option value="BSEMC" {{ $student->course === 'BSEMC' ? 'selected' : '' }}>Bachelor of Science in Entertainment and Multimedia Computing</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection