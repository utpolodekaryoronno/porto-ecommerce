@extends('layouts.app')

@section('title', 'Product')
@section('content')
     <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2>Products List</h2>
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
                        </div>
                        <table id="myDataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Logo</th>
                                    <th>Created At</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->iteration}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->slug}}</td>
                                        <td>
                                            @if($product->logo)
                                                <a href="#"><img src="{{ asset('media/product/' . $product->logo) }}" alt="{{ $product->name }}" style="width: 70px; height: 40px; border-radius: 5px;"></a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-icon btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route("product.edit", $product->id) }}" class="btn btn-icon btn-info"><i class="fa-solid fa-pen"></i></a>

                                            <form action="{{ route("product.destroy", $product->id) }}" method="POST" class="d-inline delete-form" data-message="Are you sure you want to delete this product?">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
