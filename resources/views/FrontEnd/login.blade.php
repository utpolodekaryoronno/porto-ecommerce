@extends('layouts.app')
@section('title', 'login')

@section('content')

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg border-0" style="max-width: 420px; width: 100%;">
            <div class="card-body p-4">

                <!-- Logo / Title -->
                <div class="text-center mb-4">
                    <div class="mb-3">
                       <i class="fas fa-shopping-bag fa-5x text-primary"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Porto eCommerce</h3>
                    <p class="text-muted small">Login Form</p>
                </div>



                <form method="POST" action="{{ route('login.store') }}" class="mb-2">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-envelope text-primary"></i>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="hello@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-dark">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-lock text-primary"></i>
                            </span>
                            <input id="password" type="password" name="password"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted mx-2" for="remember">
                            Remember me
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login
                    </button>

                </form>

                <!-- Sign Up Link -->
                <div class="text-center pt-3 border-top pb-2">
                    <p class="text-muted mb-1">Don't have an account yet?</p>
                    <a href="{{ route('register') }}" class="text-primary">
                        <i class="fas fa-user-plus me-2"></i>
                        Sign Up Here
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection
