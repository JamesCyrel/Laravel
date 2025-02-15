@extends('layouts.dashboardTemplate')

@section('title', 'Subjects')

@section('content')
    <div class="container">
        <h1 class="my-4">Subjects</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mathematics</td>
                    <td>MATH101</td>
                    <td>Edit | Delete</td>
                </tr>
                <!-- Add more static subjects as needed -->
            </tbody>
        </table>
    </div>
@endsection