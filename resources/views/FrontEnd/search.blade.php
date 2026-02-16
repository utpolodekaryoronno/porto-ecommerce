@extends('layouts.app')

@section('title', 'Related Products')
@section("content")
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <section class="featured-section mb-0 pb-0 px-5">
                            <h2 class="carousel-title">Search Related Products</h2>

                            @if ($products->isNotEmpty())
                                <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                                    'margin': 20,
                                    'items': 2,
                                    'autoplayTimeout': 5000,
                                    'responsive': {
                                        '559': {
                                            'items': 3
                                        },
                                        '975': {
                                            'items': 3
                                        }
                                    }
                                }">
                                    @foreach ($products as $product )
                                        <div class="product-default">
                                            <figure>
                                                <a href="{{ route('single.product', $product->slug) }}">
                                                    @if($product->gallery->first())
                                                        <img src="{{ asset('media/product/' . $product->gallery->first()->file_name) }}" alt="{{ $product->name }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->
                                                <h2 class="product-title">
                                                    <a href="{{ route('single.product', $product->slug) }}">{{$product->name}}</a>
                                                </h2>
                                                <div class="price-box">
                                                    @if($product->sale_price)
                                                        <span class="product-price text-decoration-line-through" >$ {{$product->regular_price}}</span> &nbsp; &nbsp;
                                                        <span class="product-price">$ {{$product->sale_price}}</span>
                                                    @else
                                                        <span class="product-price">$ {{$product->regular_price}}</span>
                                                    @endif

                                                </div><!-- End .price-box -->
                                                <div class="product-action mb-0">
                                                    <!-- ✅ Add to Cart Button -->
                                                    <form action="{{ route('cart.store') }}" method="POST" class="mb-0">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="icon-bag"></i> ADD TO CART
                                                        </button>
                                                    </form>
                                                </div>
                                            </div><!-- End .product-details -->
                                        </div>
                                    @endforeach
                                </div>
                            @else

                            <h4 class="pb-5 text-danger">Product Not Found </h4>

                            @endif

                        </section>
                    </div><!-- End .col-lg-9 -->

                    @include('FrontEnd.frontendSidebar')
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
    </main><!-- End .main -->
@endsection
