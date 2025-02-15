@extends('layouts.dashboardTemplate')

@section('title', 'Grades')

@section('content')
    <div class="container">
        <h1 class="my-4">Grades</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Mathematics</td>
                    <td>A</td>
                    <td>Edit | Delete</td>
                </tr>
                <!-- Add more static grades as needed -->
            </tbody>
        </table>
    </div>
@endsection