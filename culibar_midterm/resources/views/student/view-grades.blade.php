@extends('layouts.dashboardTemplate')

@section('title', 'View Grades')

@section('content')
    <div class="container">
        <h5>Name: {{ auth()->user()->name }}</h5>
        @php
            $student = App\Models\Student::where('email', auth()->user()->email)->first();
            $enrollment = App\Models\Enrollment::where('student_id', $student->id)->latest()->first();
        @endphp
        <h5>Course: {{ $student->course }}</h5>
        <h5>Semester: {{ $enrollment ? $enrollment->semester : '-' }}</h5>
        
        <h1 class="my-4">Grades</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Remark</th>
                    <th>Curriculum Evaluation</th>
                </tr>
            </thead>
            <tbody>
                @if($grades->isEmpty())
                    <tr>
                        <td colspan="4">No grades available.</td>
                    </tr>
                @endif
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade->subject->name }}</td>
                        <td>{{ $grade->grade }}</td>
                        <td>{{ $grade->remark }}</td>
                        <td>{{ $grade->curriculum_evaluation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection