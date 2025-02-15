@extends('layouts.dashboardTemplate')

@section('title', 'Student Dashboard')

@section('content')
<div class="container">
    <h1>Student Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <!-- Add instructor-specific content here -->
</div>
@endsection 