<!-- primary navbar section start -->
<section class="container row">
 <nav class="navbar navbar-expand-md fixed-top">
  <a href="{{ url('/') }}" class="navbar-brand col-lg-1 col-md-1 d-flex justify-content-start">
    <img src="./assets/logo_1.png" class="d-inline" alt="" style="width:60px;height:auto"/>
   <!-- <span  class="logo d-inline fw-bold"> Win <br/> <small>Mobile</small></span> -->
  </a>

  <div class="col-md-10 mobile-search">
   <form class="mobile-search-box">
    <input type="search" placeholder="Search.." name="search" class="search form-rounded">
    <button type="submit" class="search-btn border-0 search-btn"><i class="fa fa-search"></i></button>
   </form>
  </div>

  <button type="button" class="navbar-toggler navbuttons" data-bs-toggle="collapse" data-bs-target="#nav">
   <div class="bg-dark lines1"></div>
   <div class="bg-dark lines2"></div>
   <div class="bg-dark lines3"></div>
  </button>

      <div id="nav" class="navbar navbar-collapse collapse justify-content-center align-items-center menu-lg-bars">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="/" class="nav-link d-inline fw-bold">Home</a></li>
          <li class="nav-item">
            <a href="/shop" class="nav-link d-inline fw-bold">Shop</a> 
            <!-- <i class="fas fa-plus plus-icons " data-bs-target="#phone" data-bs-toggle="collapse"></i> -->
            <!-- dropdown menu -->
            <!-- <div class="menu container-fluid dropdown-contents">
              <ul class="row">
                <li><a href="#">Brand New</a>
                  <ul>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>IOS</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Android</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Tablet</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Keypad</a></li>
                  </ul>
                </li>

                <li><a href="#">Second Hand</a>
                  <ul>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>IOS</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Android</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Tablet</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Keypad</a></li>
                  </ul>
                </li>

                <li>
                  <img src="./assets/side8.jpg" alt="">
                </li>

      </ul>
     </div> -->
     <!-- end dropdown menu -->

     <!-- mobile menu -->
     <!-- <ul id="phone" class="collapse sub-menus">
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>IOS</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Android</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Tablet</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Keypad</a></li>
     </ul> -->
     <!-- end mobile menu -->
    </li>
    {{-- <li class="nav-item dropdowns">
            <a href="#" class="nav-link" data-bs-target="#brand" data-bs-toggle="collapse">Brand
              <i class="fas fa-plus plus-icons"></i>
            </a>
            <!-- dropdown menu -->
            <div class="menu container-fluid dropdown-contents">
              <ul class="row">
                <li><a href="#">Brand New</a>
                  <ul>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Apple</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Samsung</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Huawei</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Xiaomi</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Vivo</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Oppo</a></li>
                  </ul>
                </li>

                <li><a href="#">Second Hand</a>
                  <ul>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Apple</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Samsung</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Huawei</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Xiaomi</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Vivo</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Oppo</a></li>
                  </ul>
                </li>

                <li>
                  <img src="./assets/side8.jpg" alt="">
                </li>

              </ul>
            </div>
            <!-- end dropdown menu -->
            <!-- mobile menu -->
            <ul id="brand" class="collapse sub-menus">
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Apple</a></li>
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Samsung</a></li>
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Huawei</a></li>
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Xiaomi</a></li>
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Vivo</a></li>
              <li><a href="#"><i class="fas fa-greater-than me-2"></i>Oppo</a></li>
            </ul>
            <!-- end mobile menu -->
          </li>
           --}}
          <li class="nav-item">
            <a href="/contact" class="nav-link d-inline fw-bold">Contact</a>
            <!-- <i class="fas fa-plus plus-icons"  data-bs-target="#accessory" data-bs-toggle="collapse"></i> -->
            <!-- dropdown menu -->
            <!-- <div class="menu container-fluid dropdown-contents">
              <ul class="row">
                <li><a href="#">Accessory</a>
                  <ul>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Airpod</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Watch</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Power bank</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Speaker</a></li>
                    <li><a href="#"><span class="fas fa-greater-than me-2"></span>Headphone</a></li>
                  </ul>
                </li>

       <li><a href="#">Brand</a>
        <ul>
         @foreach($brands as $brand)
         <li><a href="{{ url('/shop/accessorybrands/'.$brand->id) }}"><span
            class="fas fa-greater-than me-2"></span>{{ $brand->name }}</a></li>
         @endforeach
        </ul>
       </li>

       <li>
        <img src="./assets/side8.jpg" alt="">
       </li>

      </ul>
     </div> -->
     <!-- end dropdown menu -->
     <!-- mobile menu -->
     <!-- <ul id="accessory" class="collapse sub-menus">
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Airpod</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Watch</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Power bank</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Speaker</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Headphone</a></li>
      <li><a href="#"><i class="fas fa-greater-than me-2"></i>Cover</a></li>
     </ul> -->
     <!-- end mobile menu -->
    </li>

          <li class="nav-item"><a href="/aboutus.html" class="nav-link d-inline fw-bold">About Us</a></li>

          <li class="mobile-view">
            <a href="#" class="nav-link d-inline fw-bold">Account</a>
              <i class="fas fa-plus plus-icons"  data-bs-target="#account" data-bs-toggle="collapse"></i>
              <!-- mobile menu -->
              <ul id="account" class="collapse sub-menus">
                <li>
                  <a href="/"><i class="fas fa-lock me-2"></i>Signin</a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-user me-2"></i>Profile</a>
                </li>
                <li>
                  <a href="/my-cart"><i class="fas fa-shopping-bag me-2"></i>Cart</a>
                </li>
              </ul>
              <!-- end mobile menu -->
            </a>
          </li>
        </ul>
      </div>

  <div class="d-none d-md-block d-lg-block icons">
   <ul class="d-flex">
    <li>
     {{-- <a href="#!" class="text-dark"><i class="far fa-heart mx-2"></i></a> --}}
    </li>
    <li>
      <div class="btn-group" role="group">
            <a href="/profile" id="dropdown" type="button" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><i class="far fa-user mx-2"></i></a>
          <div class="dropdown-menu text-center">
              <a href="/" class="dropdown-item">Sign in</a>
              <a href="/" class="dropdown-item">login</a>
              <div class="dropdown-divider"></div>
              <a href="/" class="dropdown-item">Profile</a>
          </div>
      </div>
    </li>
    <li>
        <a href="/my-cart" class="text-dark position-relative ms-3">
            <i class="fa fa-shopping-bag mx-2"></i>
            @auth
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $carts ? $carts->count() : '0' }}</span>
            @else
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            @endauth
            @guest
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            @endguest
        </a>
    </li>
   </ul>
  </div>

 </nav>
</section>
<!-- primary navbar section end -->
