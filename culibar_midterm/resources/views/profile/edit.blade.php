@extends('layouts.dashboardTemplate')

@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Profile</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
