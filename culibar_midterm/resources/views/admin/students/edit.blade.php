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
            <div class="form-group">
                <label for="year_level">Year Level</label>
                <select class="form-control" id="year_level" name="year_level" required>
                    <option value="">Select Year Level</option>
                    <option value="1st Year" {{ $student->year_level === '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ $student->year_level === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ $student->year_level === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{ $student->year_level === '4th Year' ? 'selected' : '' }}>4th Year</option>
                    <option value="5th Year" {{ $student->year_level === '5th Year' ? 'selected' : '' }}>5th Year</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection