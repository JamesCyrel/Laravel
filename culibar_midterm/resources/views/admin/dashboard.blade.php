@extends('layouts.dashboardTemplate')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <!-- Add instructor-specific content here -->
</div>
@endsection 