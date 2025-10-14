@extends('layouts.app')
@section('title', 'Create PDF & Email send')
@section('content')
    <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('contact.pdf') }}">Create A PDF</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row justify-content-center" id="next-section">
                    <div class="col-md-8 box-shadow  py-30px">
                        <h2 class="light-title mt-4"> <strong>Create a PDF & Email send</strong></h2>

                        <form action="{{ route('create.pdf') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control w-100"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control w-100"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input
                                    type="tel"
                                    class="form-control w-100"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input
                                    type="text"
                                    class="form-control w-100"
                                    id="address"
                                    name="address"
                                    value="{{ old('address') }}">
                            </div>


                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div><!-- End .col-md-8 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-8"></div><!-- margin -->
        </main><!-- End .main -->




@endsection

