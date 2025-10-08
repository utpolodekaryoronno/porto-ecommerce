<div class="col-lg-3 order-lg-first">
    <a href="{{ route("home") }}" class="btn btn-primary mb-1 d-block">Go Back</a>
    <div class="side-custom-menu">
        <h2>All Features</h2>

        <div class="side-menu-body">
            <ul>
                <li><a href="{{ route('product.index') }}"><i class="icon-cat-shirt"></i>Products</a></li>
                <li><a href="{{route('category.index')}}"><i class="icon-cat-computer"></i>Category</a></li>
                <li><a href="{{ route('tags.index') }}"><i class="icon-cat-gift"></i>Tags</a></li>
                <li><a href="{{ route('brands.index') }}"><i class="icon-cat-couch"></i>Brands</a></li>
            </ul>

        </div><!-- End .side-menu-body -->
    </div><!-- End .side-custom-menu -->
</div><!-- End .col-lg-3 -->
