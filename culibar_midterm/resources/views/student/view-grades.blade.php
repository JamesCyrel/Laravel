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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mathematics</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>B+</td>
                </tr>
                <tr>
                    <td>History</td>
                    <td>A-</td>
                </tr>
                <!-- Add more static grades as needed -->
            </tbody>
        </table>
    </div>
@endsection