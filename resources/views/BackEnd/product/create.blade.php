@extends('layouts.app')

@section('title', 'Create Product')
@section('content')
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="mb-0">Add New Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="mb-0">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="name" class="form-label">Product Name</label>
                                                <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="subtitle" class="form-label">Subtitle</label>
                                                <input type="text" class="form-control w-100" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="regular_price" class="form-label">Regular Price</label>
                                                <input type="text" class="form-control w-100" id="regular_price" name="regular_price" value="{{ old('regular_price') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="sale_price" class="form-label">Sale Price</label>
                                                <input type="text" class="form-control w-100" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Stock</label>
                                                <input type="text" class="form-control w-100" id="stock" name="stock" value="{{ old('stock') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="brand" class="form-label">Select Brand</label>
                                                <select name="brand" id="brand" class="form-control w-100">
                                                    <option value="">-- Select Brand --</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="short_desc" class="form-label">Short Description</label>
                                        <textarea class="form-control w-100" id="short_desc" name="short_desc">{{ old('short_desc') }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="long_desc" class="form-label">Long Description</label>
                                        <textarea class="form-control w-100" id="long_desc" name="long_desc">{{ old('long_desc') }}</textarea>

                                    </div>
                                    <div class="mb-2">
                                        <label for="gallery" class="form-label">Gallery</label>
                                        <input type="file" class="form-control w-100" id="gallery" name="gallery[]" multiple value="{{ old('gallery') }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block">Check Categories</label>
                                        @foreach ($categories as $category)
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="categories[]"
                                                        value="{{ $category->id }}"
                                                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block">Check Tags</label>
                                        @foreach ($tags as $tag)
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="tags[]"
                                                        value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                                    {{ $tag->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Product</button>
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
