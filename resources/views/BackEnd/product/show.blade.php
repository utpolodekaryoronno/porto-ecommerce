@extends("layouts.app")

@section("title", "Product Details")

@section("content")
     <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Product Details</h4>
                                <a href="{{ route("product.index") }}" class="btn btn-icon btn-primary">Back</a>
                            </div>
                            <div class="card-body show-card-body">
                                <div class="d-flex mb-1 align-items-center">
                                    <h3 class="card-title ">Name:</h3>&nbsp;  <h4>{{ $product->name }}</h4>
                                </div>
                                <div class="d-flex mb-2 align-items-center g-2">
                                    <h3 class="card-title ">Subtitle:</h3> &nbsp; <h4>{{ $product->subtitle }}</h4>
                                </div>

                                <div class="show-product-image mb-2">
                                    @foreach ($product->gallery as $image)
                                        <img src="{{ asset('media/product/' . $image->file_name) }}" alt="{{ $product->name }}">
                                    @endforeach
                                </div>
                                <p class="mb-1"><strong>Category:</strong>
                                    @foreach ( $product->categories as $category)
                                    {{ $category->name}}, &nbsp;
                                    @endforeach
                                </p>
                                <p class="mb-1"><strong>Brand:</strong>
                                    {{ $product->brand->name}}
                                </p>
                                <p class="mb-1"><strong>Ragular Price:</strong> {{$product->regular_price}}</p>
                                <p class="mb-1"><strong>Sale Price:</strong> {{$product->sale_price}}</p>
                                <p class="mb-1"><strong>Tags:</strong>
                                    @foreach ($product->tags as $tag)
                                     {{ $tag->name}}, &nbsp;
                                    @endforeach
                                </p>

                                <p><strong>Short Description:</strong> {{$product->short_desc}} </p>
                                <p><strong>Long Description:</strong> {{$product->long_desc}} </p>
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
