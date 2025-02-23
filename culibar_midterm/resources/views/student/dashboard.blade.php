@extends('layouts.dashboardTemplate')

@section('title', 'Student Dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary text-white p-3 mr-3">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Welcome back, {{ auth()->user()->name }}!</h4>
                            <p class="text-muted mb-0">Student Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">My Courses</h5>
                    <span class="badge badge-light">{{ $enrolledCourses->count() }} Courses</span>
                </div>
                <div class="card-body">
                    @if($enrolledCourses->count() > 0)
                        <div class="list-group">
                            @foreach($enrolledCourses as $course)
                                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-book text-primary mr-2"></i>
                                        {{ $course->name }}
                                    </div>
                                    <span class="badge badge-primary badge-pill">Active</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                            <p class="text-muted">You are not enrolled in any courses yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-user-circle fa-lg text-primary mr-3"></i>
                            <div>
                                <h6 class="mb-0">My Profile</h6>
                                <small class="text-muted">View and edit your information</small>
                            </div>
                        </a>
                        <a href="{{ route('student.view-grades') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-graduation-cap fa-lg text-success mr-3"></i>
                            <div>
                                <h6 class="mb-0">View Grades</h6>
                                <small class="text-muted">Check your academic performance</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .list-group-item {
        transition: background-color 0.2s ease;
    }

    .list-group-item:hover {
        background-color: #f8f9fa;
    }

    .badge-pill {
        padding: 0.5em 1em;
    }
</style>
@endsection