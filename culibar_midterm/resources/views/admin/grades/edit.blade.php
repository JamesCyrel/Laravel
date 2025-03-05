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
                <select class="form-control" id="grade" name="grade" required>
                    <option value="">Select Grade</option>
                    <option value="1.25" {{ $grade->grade == 1.25 ? 'selected' : '' }}>1.25</option>
                    <option value="1.50" {{ $grade->grade == 1.50 ? 'selected' : '' }}>1.50</option>
                    <option value="1.75" {{ $grade->grade == 1.75 ? 'selected' : '' }}>1.75</option>
                    <option value="2.00" {{ $grade->grade == 2.00 ? 'selected' : '' }}>2.00</option>
                    <option value="2.25" {{ $grade->grade == 2.25 ? 'selected' : '' }}>2.25</option>
                    <option value="2.50" {{ $grade->grade == 2.50 ? 'selected' : '' }}>2.50</option>
                    <option value="2.75" {{ $grade->grade == 2.75 ? 'selected' : '' }}>2.75</option>
                    <option value="3.00" {{ $grade->grade == 3.00 ? 'selected' : '' }}>3.00</option>
                    <option value="5.00" {{ $grade->grade == 5.00 ? 'selected' : '' }}>5.00</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Grade</button>
        </form>
    </div>
@endsection