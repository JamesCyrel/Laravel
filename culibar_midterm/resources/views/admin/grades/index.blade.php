@extends('layouts.dashboardTemplate')

@section('title', 'Grades')

@section('content')
    <div class="container">
        <h1 class="my-4">Grades</h1>
        <a href="{{ route('admin.grades.create') }}" class="btn btn-primary mb-3">Add Grade</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Units</th>
                    <th>Remark</th>
                    <th>Curriculum Evaluation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    @php
                        $enrollment = App\Models\Enrollment::where('student_id', $grade->student_id)
                            ->where('subject_id', $grade->subject_id)
                            ->first();
                    @endphp
                    <tr>
                        <td>{{ $grade->student->name }}</td>
                        <td>{{ $enrollment ? $enrollment->course : $grade->student->course }}</td>
                        <td>{{ $enrollment ? $enrollment->semester : '-' }}</td>
                        <td>{{ $grade->subject->name }}</td>
                        <td>{{ $grade->grade }}</td>
                        <td>{{ $grade->subject->units }}</td>
                        <td>{{ $grade->remark }}</td>
                        <td>{{ $grade->curriculum_evaluation }}</td>
                        <td>
                            <a href="{{ route('admin.grades.edit', $grade) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.grades.destroy', $grade) }}" method="POST" style="display:inline;">
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