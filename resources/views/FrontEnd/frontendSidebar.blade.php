<div class="col-lg-3 order-lg-first">
    <a href="{{ route("admin") }}" class="btn btn-primary mb-1 d-block">Go Admin</a>
    <div class="side-custom-menu">
        <h2>TOP CATEGORIES</h2>

        <div class="bg-light border rounded p-3">
  
  <!-- Product Categories -->
  <div class="mb-3">
    <ul class="list-unstyled">
      @foreach ($categories as  $category)
          <li><a href="#" class="text-decoration-none d-block py-1">{{ $category->name }}</a></li>
      @endforeach
    </ul>
  </div>
  <!-- Product Brands -->
  <div class="mb-3">
    <h4 class="border-bottom pb-2">Brands</h4>
    
      @foreach ($brands as $brand)
          <a href="#" class="text-decoration-none py-1">{{ $brand->name }}</a> , &nbsp;
      @endforeach
    
  </div>
  <!-- Product Tags (Dropdown) -->
  <div>
    <h4 class="border-bottom pb-2 pb-3">Tags</h4>
    <div class="dropdown">
        <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center dropdown-toggle" 
                type="button" id="tagsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>Show Tags</span>
        </button>
        <div class="dropdown-menu w-100" aria-labelledby="tagsDropdown">
            @foreach ($tags as $tag)
                <a class="dropdown-item f-size-15px" href="#">{{ $tag->name }}</a>
            @endforeach        
        </div>
    </div>
</div>



</div>

        {{-- <div class="side-menu-body">
            <ul>
                <li><a href="#"><i class="icon-cat-shirt"></i>Fashion</a></li>
                <li><a href="#"><i class="icon-cat-computer"></i>Electronics</a></li>
                <li><a href="#"><i class="icon-cat-gift"></i>Gifts</a></li>
                <li><a href="#"><i class="icon-cat-couch"></i>Home & Garden</a></li>
                <li><a href="#"><i class="icon-cat-computer"></i>Music</a></li>
                <li><a href="#"><i class="icon-cat-sport"></i>Sports</a></li>
            </ul>

            <a href="#" class="btn btn-block btn-primary">HUGE SALE - <strong>70%</strong> Off</a>
        </div> --}}
    </div><!-- End .side-custom-menu -->
</div>