@extends('layouts.app')
@section('title', 'Contact')
@section('content')
    <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div id="contact-map" class="contact-section">
                    <div class="contact-content">
                        <h2>📞 Get in Touch</h2>
                        <p>
                        We’d love to hear from you! Whether you have a question, a project idea, or just want to say hello — feel free to reach out. Our team is always ready to help.
                        </p>
                    </div>

                    <!-- Animated Down Arrow -->
                    <a href="#next-section" class="scroll-down">
                        <span></span>
                    </a>
                </div>
                <div class="row justify-content-center" id="next-section">
                    <div class="col-md-8 box-shadow  py-30px">
                        <h2 class="light-title mt-4"> <strong>Contact</strong></h2>

                        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label for="user_message">What’s on your mind?</label>
                                <textarea
                                    cols="30"
                                    rows="3"
                                    id="user_message"
                                    class="form-control w-100"
                                    name="user_message">{{ old('user_message') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input
                                    type="file"
                                    class="form-control w-100"
                                    id="photo"
                                    name="photo">
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


    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
            });
        });
        });
    </script>

@endsection

