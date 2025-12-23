@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="d-flex align-items-center justify-content-center text-center py-5">
    <div class="error-box text-center">
        <h1>500</h1>
        <h3 class="h2 mb-3 text-center"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
        <p class="h4 font-weight-normal text-center">The page you requested was not found.</p>
        <a href="{{ url('/') }}" class="btn btn-primary text-center">Back to Home</a>
    </div>
</div>
@endsection
