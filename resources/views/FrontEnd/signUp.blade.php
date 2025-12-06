@extends('layouts.app')
@section('title', 'login')

@section('content')

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg border-0" style="max-width: 420px; width: 100%;">
            <div class="card-body p-4">

                <!-- Logo / Title -->
                <div class="text-center mb-4">
                    <div class="mb-3">
                       <i class="fas fa-user-plus fa-4x text-primary"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Porto eCommerce</h3>
                    <p class="text-muted small">Sign Up Form</p>
                </div>



                <form method="POST" action="{{ route('register.store') }}" class="mb-2">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-dark">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-envelope text-primary"></i>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="Type your full name">
                        </div>
                    </div>

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
                    {{-- confirm password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-dark">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-lock text-primary"></i>
                            </span>
                            <input id="confirmpassword" type="password" name="password_confirmation"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Sign Up
                    </button>

                </form>

                <!-- Sign Up Link -->
                <div class="text-center pt-3 border-top pb-2">
                    <p class="text-muted mb-1">Already I have an account</p>
                    <a href="{{ route('login') }}" class="text-primary">
                        <i class="fas fa-user-plus me-2"></i>
                        Login Here
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection
