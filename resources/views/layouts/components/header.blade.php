<header class="header">
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Porto Logo">
                </a>
            </div><!-- End .header-left -->



            <div class="header-center">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{route('search.product')}}" method="GET">
                        <div class="header-search-wrapper position-relative">
                            <input type="search"  id="search-box"   class="form-control" name="q" value="{{ request('q') }}" placeholder="Search products...">

                             <div id="suggest-list" class="list-group position-absolute w-100"></div>
                            <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="header-right">
                <button class="mobile-menu-toggler" type="button">
                    <i class="icon-menu"></i>
                </button>
                @if (Auth::guard('web')->check()){
                    <div class="header-contact">
                        <form action="{{route("logout")}}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-outline mx-2">Logout</button>
                        </form>
                    </div>
                }
                @else{

                    <div class="header-contact">
                        <a href="{{route("register")}}" class="btn btn-outline mx-2">Sign Up</a>
                        <a href="{{route("login")}}" class="btn btn-outline mx-2">Login</a>
                    </div><!-- End .header-contact -->
                }
                @endif


                <a href="{{ route('cart.index') }}" class="cart-btn">
                    <div class="cart-icon">
                        <i class="icon-bag"></i>
                        @if (count(session('cart', [])) > 0)
                            <span class="cart-badge">{{ count(session('cart', [])) }}</span>
                        @endif
                    </div>
                </a>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="{{ Route::is('home') ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>

                    @if (Auth::guard('web')->check() && Auth::guard('web')->user()->role == 'admin')
                        <li class="{{ Route::is('contact.index') ? 'active' : ''}}">
                            <a href="{{ route('contact.index') }}">
                                Contact
                            </a>
                        </li>

                        <li class="{{ Route::is('contact.pdf') ? 'active' : ''}}">
                            <a href="{{ route('contact.pdf') }}">
                                Contact PDF Generate
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="category.html" class="sf-with-ul">Categories</a>
                        <div class="megamenu megamenu-fixed-width">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="menu-title">
                                                <a href="#">Variations 1<span class="tip tip-new">New!</span></a>
                                            </div>
                                            <ul>
                                                <li><a href="category-banner-full-width.html">Fullwidth Banner<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                                                <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                                                <li><a href="category-sidebar-left.html">Left Sidebar</a></li>
                                                <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                                                <li><a href="category-horizontal-filter1.html">Horizontal Filter1</a></li>
                                                <li><a href="category-horizontal-filter2.html">Horizontal Filter2</a></li>
                                            </ul>
                                        </div><!-- End .col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="menu-title">
                                                <a href="#">Variations 2</a>
                                            </div>
                                            <ul>
                                                <li><a href="#">Product List Item Types</a></li>
                                                <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a></li>
                                                <li><a href="category-3col.html">3 Columns Products</a></li>
                                                <li><a href="category-4col.html">4 Columns Products <span class="tip tip-new">New</span></a></li>
                                                <li><a href="category-5col.html">5 Columns Products</a></li>
                                                <li><a href="category-6col.html">6 Columns Products</a></li>
                                                <li><a href="category-7col.html">7 Columns Products</a></li>
                                                <li><a href="category-8col.html">8 Columns Products</a></li>
                                            </ul>
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-lg-8 -->
                                <div class="col-lg-4">
                                    <div class="banner">
                                        <a href="#">
                                            <img src="assets/images/menu-banner-2.jpg" alt="Menu banner">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-lg-4 -->
                            </div>
                        </div><!-- End .megamenu -->
                    </li>
                    <li class="megamenu-container">
                        <a href="product.html" class="sf-with-ul">Products</a>
                        <div class="megamenu">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="menu-title">
                                                <a href="#">Variations</a>
                                            </div>
                                            <ul>
                                                <li><a href="product.html">Horizontal Thumbnails</a></li>
                                                <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product.html">Inner Zoom</a></li>
                                                <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                            </ul>
                                        </div><!-- End .col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="menu-title">
                                                <a href="#">Variations</a>
                                            </div>
                                            <ul>
                                                <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                                <li><a href="product-simple.html">Simple Product</a></li>
                                                <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                            </ul>
                                        </div><!-- End .col-lg-4 -->
                                        <div class="col-lg-4">
                                            <div class="menu-title">
                                                <a href="#">Product Layout Types</a>
                                            </div>
                                            <ul>
                                                <li><a href="product.html">Default Layout</a></li>
                                                <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                            </ul>
                                        </div><!-- End .col-lg-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-lg-8 -->
                                <div class="col-lg-4">
                                    <div class="banner">
                                        <a href="#">
                                            <img src="assets/images/menu-banner.jpg" alt="Menu banner" class="product-promo">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-lg-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .megamenu -->
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">Pages</a>

                        <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dashboard</a>
                                <ul>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                        </ul>
                    </li>

                    <li class="float-right"><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                    <li class="float-right"><a href="#">Special Offer!</a></li>
                </ul>
            </nav>
        </div><!-- End .header-bottom -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->


