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