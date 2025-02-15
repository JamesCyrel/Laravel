@extends('layouts.dashboardTemplate')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <p>Number of Students: {{ $studentCount }}</p>
    <!-- Add more dynamic content as needed -->
</div>
@endsection