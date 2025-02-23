@extends('layouts.dashboardTemplate')

@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profile Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-4">
                            <div class="profile-image-container mb-3">
                                <i class="fas fa-user-circle fa-6x text-primary"></i>
                            </div>
                            <h5>{{ auth()->user()->name }}</h5>
                            <span class="badge badge-primary">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <div class="col-md-9">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

<style>
    .profile-image-container {
        padding: 20px;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .profile-image-container:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .badge {
        padding: 8px 16px;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .btn {
        padding: 8px 20px;
        font-weight: 500;
    }
</style>
@endsection
