<!-- primary navbar section start -->
<section class="container-fluid row">
 <nav class="navbar navbar-expand-md fixed-top">
  <a href="{{ url('/') }}" class="navbar-brand col-lg-1 col-md-1 d-flex justify-content-start">
   <img src="./assets/logo_1.png" class="d-inline" alt="" style="width:60px;height:auto" />
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
    </li>

    <li class="nav-item">
     <a href="/contact" class="nav-link d-inline fw-bold">Contact</a>
    </li>

        <li class="nav-item"><a href="{{ url('/aboutus') }}" class="nav-link d-inline fw-bold">About Us</a></li>

        <li class="mobile-view">
          <a href="#" class="nav-link d-inline fw-bold">Account</a>
          <i class="fas fa-plus plus-icons" data-bs-target="#account" data-bs-toggle="collapse"></i>
          <!-- mobile menu -->
          <ul id="account" class="collapse sub-menus">
            <li>
              <a href="{{ url('/login') }}"><i class="fas fa-lock me-2"></i>Signin</a>
            </li>
            <li>
              <a href="/profile"><i class="fas fa-user me-2"></i>Profile</a>
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
     <div class="btn-group" role="group">
      <a href="/profile" id="dropdown" type="button" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><i
        class="far fa-user mx-2"></i></a>
      <div class="dropdown-menu text-start">
        @guest
        <a href="{{ url('/login') }}" class="dropdown-item">
            <i class="fa-solid fa-unlock me-2"></i>
            <span>Login</span>
        </a>
        <a href="{{ url('/register') }}" class="dropdown-item">
            <i class="fa-solid fa-user-pen me-2"></i>
            <span>Register</span>
        </a>
        @endguest

              @auth
              <div class="dropdown-divider"></div>
              <a href="{{ url('/profile') }}" class="dropdown-item">
                <i class="fa-solid fa-user me-2"></i>
                <span>Profile</span>
              </a>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  Logout
                </button>
              </form>
              @endauth

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