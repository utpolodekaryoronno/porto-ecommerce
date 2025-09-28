@extends("layouts.app")

@section("title", "Tag Details")

@section("content")
     <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Tag Details</h4>
                                <a href="{{ route("tags.index") }}" class="btn btn-icon btn-primary">Back</a>
                            </div>
                            <div class="card-body text-center show-card-body">
                                <h3 class="card-title">Name: {{ $tag->name }}</h3>
                                <span><strong>Slug:</strong> {{ $tag->slug }}</span>
                                <p class="card-text"><strong>Created At:</strong> {{ $tag->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div><!-- End .col-lg-9 -->

                    @include('BackEnd.Admin.sidebar')

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .home-top-container -->

        <div class="info-boxes-container">
            <div class="container">
                <div class="info-box">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>FREE SHIPPING & RETURN</h4>
                        <p>Free shipping on all orders over $99.</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->

                <div class="info-box">
                    <i class="icon-us-dollar"></i>

                    <div class="info-box-content">
                        <h4>MONEY BACK GUARANTEE</h4>
                        <p>100% money back guarantee</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->

                <div class="info-box">
                    <i class="icon-support"></i>

                    <div class="info-box-content">
                        <h4>ONLINE SUPPORT 24/7</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->
            </div><!-- End .container -->
        </div><!-- End .info-boxes-container -->



        <div class="mb-4"></div><!-- margin -->

    </main><!-- End .main -->

@endsection
