@extends('layouts.app')

@section("content")
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="home-slider owl-carousel owl-carousel-lazy">
                            <div class="home-slide">
                                <div class="owl-lazy slide-bg" data-src="assets/images/slider/slide-1.jpg"></div>
                                <div class="home-slide-content text-white">
                                    <h3>Get up to <span>60%</span> off</h3>
                                    <h1>Summer Sale</h1>
                                    <p>Limited items available at this price.</p>
                                    <a href="category.html" class="btn btn-dark">Shop Now</a>
                                </div><!-- End .home-slide-content -->
                            </div><!-- End .home-slide -->

                            <div class="home-slide">
                                <div class="owl-lazy slide-bg" data-src="assets/images/slider/slide-2.jpg"></div>
                                <div class="home-slide-content text-white">
                                    <h3>OVER <span>200+</span></h3>
                                    <h1>GREAT DEALS</h1>
                                    <p>While they last!</p>
                                    <a href="category.html" class="btn btn-dark">Shop Now</a>
                                </div><!-- End .home-slide-content -->
                            </div><!-- End .home-slide -->
                        </div><!-- End .home-slider -->

                        <div class="counters-section mb-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-4 count-container text-center">
                                        <div class="count-wrapper">
                                            <span class="count" data-from="0" data-to="{{ $products->count() - 1 }}" data-speed="2000" data-refresh-interval="50">{{ $products->count() - 1 }}</span>+
                                        </div><!-- End .count-wrapper -->
                                        <h4 class="count-title">Total Products</h4>
                                    </div><!-- End .col-md-4 -->

                                    <div class="col-sm-6 col-md-6 col-lg-4 count-container text-center">
                                        <div class="count-wrapper">
                                            <span class="count" data-from="0" data-to="{{ $brands->count() - 1 }}" data-speed="2000" data-refresh-interval="50">{{ $brands->count() - 1 }}</span>+
                                        </div><!-- End .count-wrapper -->
                                        <h4 class="count-title">Total Brands</h4>
                                    </div><!-- End .col-md-4 -->

                                    <div class="col-sm-6 col-md-6 col-lg-4 count-container text-center">
                                        <div class="count-wrapper">
                                            <span class="count" data-from="0" data-to="24" data-speed="2000" data-refresh-interval="50">24</span><span>HR</span>
                                        </div><!-- End .count-wrapper -->
                                        <h4 class="count-title">SUPPORT AVAILABLE</h4>
                                    </div><!-- End .col-md-4 -->

                                </div><!-- End .row -->
                            </div><!-- End .container -->
                        </div>
                    </div><!-- End .col-lg-9 -->

                    @include('FrontEnd.frontendSidebar')

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

        <section class="featured-section">
            <div class="container">
                <h2 class="carousel-title">Featured Products</h2>
                <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                    'margin': 20,
                    'items': 2,
                    'autoplayTimeout': 5000,
                    'responsive': {
                        '559': {
                            'items': 3
                        },
                        '975': {
                            'items': 4
                        }
                    }
                }">
                @foreach ($products as $product)
                    <div class="product-default">
                        <figure>
                            <a href="{{ route('single.product', $product->slug) }}">
                                <img class="home-product-img" src="{{ asset('media/product/' . $product->gallery->first()->file_name) }}" alt="{{ $product->name }}">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h2 class="product-title">
                                <a href="{{ route('single.product', $product->slug) }}">{{ $product->name }}</a>
                            </h2>

                            <div class="price-box">
                                @if($product->sale_price)
                                    <span class="product-price text-decoration-line-through">${{ $product->regular_price }}</span>
                                    &nbsp;
                                    <span class="product-price">${{ $product->sale_price }}</span>
                                @else
                                    <span class="product-price">${{ $product->regular_price }}</span>
                                @endif
                            </div>

                            <!-- ✅ Add to Cart Button -->
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-bag"></i> ADD TO CART
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    </main><!-- End .main -->

    {{-- card store js with ajax  --}}




@endsection
