@extends('layouts.app')

@section('title', 'Update Category')
@section('content')
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card shadow">
                             <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Update Category</h4>
                                <a href="{{ route("category.index") }}" class="btn btn-icon btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="mb-0">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name', $category->name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="photo" class="form-label d-block">Category Photo</label>

                                        <label for="photo" class="cover">
                                            <img id="previewImage" src="{{ asset('media/category/' .$category->photo) }}" alt="{{$category->name}}">
                                        </label>
                                        <input class="form-control" hidden type="file" id="photo" name="photo" onchange="previewFile(this)">

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
