@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">

                <!-- Big 404 Number -->
                <h1 class="display-1 fw-bold text-primary mb-0">404</h1>

                <!-- Subtitle -->
                <h2 class="display-5 fw-bold text-dark mb-3">Oops! Page Not Found</h2>

                <!-- Description -->
                <p class="lead text-muted mb-5">
                    The page you are looking for might have been removed,<br>
                    had its name changed, or is temporarily unavailable.
                </p>


                <!-- Action Buttons -->
                <div class="d-grid d-md-flex justify-content-center">
                    <a href="{{ url('/') }}" class="btn  mx-3 btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
                        <i class="bi bi-house-door me-2"></i> Back to Home
                    </a>
                    <button onclick="history.back()" class="btn mx-3 btn-outline-secondary btn-lg px-5 py-3 rounded-pill">
                        <i class="bi bi-arrow-left me-2"></i> Go Back
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
