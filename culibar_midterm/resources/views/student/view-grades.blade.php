@extends('layouts.dashboardTemplate')

@section('title', 'View Grades')

@section('content')
    <div class="container">
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