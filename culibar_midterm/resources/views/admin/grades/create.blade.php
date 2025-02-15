@extends('layouts.dashboardTemplate')

@section('title', 'Add Grade')

@section('content')
    <div class="container">
        <h1 class="my-4">Add Grade</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.grades.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_id">Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select class="form-control" id="subject_id" name="subject_id" required>
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        @php
                            $isGraded = $grades->where('student_id', old('student_id'))->pluck('subject_id')->toArray();
                        @endphp
                        <option value="{{ $subject->id }}" @if(in_array($subject->id, $isGraded)) disabled @endif>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="number" step="0.01" class="form-control" id="grade" name="grade" value="{{ old('grade') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Grade</button>
        </form>
    </div>
@endsection