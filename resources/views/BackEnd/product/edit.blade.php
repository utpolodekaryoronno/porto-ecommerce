@extends('layouts.app')

@section('title', 'Update Product')
@section('content')
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Update Product</h4>
                                <a href="{{ route("product.index") }}" class="btn btn-icon btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mb-0">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="name" class="form-label">Product Name</label>
                                                <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name', $product->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="subtitle" class="form-label">Subtitle</label>
                                                <input type="text" class="form-control w-100" id="subtitle" name="subtitle" value="{{ old('subtitle', $product->subtitle) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="regular_price" class="form-label">Regular Price</label>
                                                <input type="text" class="form-control w-100" id="regular_price" name="regular_price" value="{{ old('regular_price', $product->regular_price) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="sale_price" class="form-label">Sale Price</label>
                                                <input type="text" class="form-control w-100" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="short_desc" class="form-label">Short Description</label>
                                        <textarea class="form-control w-100" id="short_desc" name="short_desc">{{ old('short_desc', $product->short_desc) }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="long_desc" class="form-label">Long Description</label>
                                        <textarea class="form-control w-100" id="long_desc" name="long_desc">{{ old('long_desc', $product->long_desc) }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
