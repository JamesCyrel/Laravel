@extends('layouts.dashboardTemplate')

@section('title', 'Edit Grade')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Grade</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.grades.update', $grade) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="student_id">Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select class="form-control" id="subject_id" name="subject_id" required>
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id == $grade->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="number" step="0.01" class="form-control" id="grade" name="grade" value="{{ $grade->grade }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Grade</button>
        </form>
    </div>
@endsection