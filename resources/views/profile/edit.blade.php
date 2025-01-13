@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Profile Header -->
        <h2 class="mb-4 fw-semibold fs-1">
            {{ __('Profile') }}
        </h2>

        <!-- Profile Management Sections -->
        <div class="row g-4">
            <!-- Update Profile Information -->
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
