@extends('layouts.app')
@section('title', 'Related Products')
@section("content")
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <section class="featured-section">
            <div class="container">
                <h2 class="carousel-title">Category Related Products</h2>
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
                                     <img class="home-product-img" src="{{ asset('media/product/' . $product->gallery->first()->file_name) }}" alt="{{ $product->name }}">
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
                    </div><!-- End .col-lg-9 -->

                    @include('FrontEnd.frontendSidebar')

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>

    </main><!-- End .main -->
@endsection
