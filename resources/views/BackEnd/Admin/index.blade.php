@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('content')
     <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2>Products List</h2>
                            <a href="#" class="btn btn-primary">Add Product</a>
                        </div>
                        <table id="myDataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laptop</td>
                                    <td>$800</td>
                                    <td>20</td>
                                    <td>Electronics</td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-icon btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="btn btn-icon btn-info"><i class="fa-solid fa-pen"></i></a>

                                        <form action="" method="POST" class="d-inline delete-form" data-message="Are you sure you want to delete this brand?">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Shirt</td>
                                    <td>$25</td>
                                    <td>100</td>
                                    <td>Clothing</td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-icon btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="btn btn-icon btn-info"><i class="fa-solid fa-pen"></i></a>

                                        <form action="" method="POST" class="d-inline delete-form" data-message="Are you sure you want to delete this brand?">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Watch</td>
                                    <td>$150</td>
                                    <td>50</td>
                                    <td>Accessories</td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-icon btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="btn btn-icon btn-info"><i class="fa-solid fa-pen"></i></a>

                                        <form action="" method="POST" class="d-inline delete-form" data-message="Are you sure you want to delete this brand?">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Watch</td>
                                    <td>$150</td>
                                    <td>50</td>
                                    <td>Accessories</td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-icon btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="btn btn-icon btn-info"><i class="fa-solid fa-pen"></i></a>

                                        <form action="" method="POST" class="d-inline delete-form" data-message="Are you sure you want to delete this brand?">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
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
