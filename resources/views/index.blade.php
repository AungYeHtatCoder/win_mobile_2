<x-layout>

 <!-- content section start  -->
 <section class="container mt-lg-5">
  <div class="row d-flex justify-content-center">
   <div class="col-lg-6 col-sm-12">
    <div class="owl-carousel owl-theme" id="landing-page-carousel">
     @foreach ($banners as $key => $banner)
     <div class="item">
      <div class="card">
       <img src="{{ $banner->img_url }}" class="d-block w-100" alt="...">
      </div>
     </div>
     @endforeach
    </div>
   </div>

   <div class="col-lg-6 col-sm-12">
    <div class="row">
     @foreach($accessories as $accessory)
     <div class="col-md-4 col-sm-12 side_img">
      <div class="mb-3 card">
       <div class="d-flex flex-column">
        <img src="{{ $accessory->img1_url }}" class="img-fluid mx-auto" alt="Avatar">
        <a href="{{url('/accessory_detail/'.$accessory->id) }}" class="text-dark fw-bold">{{ $accessory->name }}</a
         href="">
       </div>
       <div>
        <div class="mt-0 pt-0">
            <small>Color :</small>
            @foreach($accessory->colors as $color)
            <small class="badge text-bg-info"> {{ $color->name }}</small>
            @endforeach
         <div>
          <div class="">
           <h6 class="me-3">Ks - {{ $accessory->colors->first()->pivot->discount_price ? number_format($accessory->colors->first()->pivot->discount_price) : number_format($accessory->colors->first()->pivot->normal_price) }}</h6>
           <small class="text-danger text-decoration-line-through">
            {{ $accessory->colors->first()->pivot->discount_price ? "Ks - " : '' }} {{ $accessory->colors->first()->pivot->discount_price ? number_format($accessory->colors->first()->pivot->normal_price) : "" }}
           </small>
          </div>
         </div>

         {{-- <div class="custom-hide">
          <a href="#" class="btn btn-warning text-white">Add to cart</a>
         </div> --}}
        </div>
       </div>
      </div>
     </div>
     @endforeach
    </div>
   </div>
  </div>
 </section>

 <section class="container mt-md-5">
  <div class="row">
   @foreach($products as $product)
   <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between m-1 shadow p-3 bg-body rounded">
    <div class="text-end">
     <a href="{{url('/product_detail/'.$product->id) }}"><i class="fas fa-cart-arrow-down text-dark"></i></a>
     {{-- <a href="#"><i class="fas fa-heart text-dark"></i></a> --}}
    </div>
    <div class="text-center mb-4">
     <img src="{{ $product->img1_url }}" class="img-fluid w-50" alt="">
    </div>
    <div>
     <a href="{{url('/product_detail/'.$product->id) }}">{{ $product->name }} <sup class="text-warning">New</sup></a>
    </div>
    <div>
     <small>Color : </small>
     @foreach($product->colors as $color)
     <small class="badge text-bg-info"> {{ $color->name }}</small>
     @endforeach
    </div>
    <div>
     <small>Storage : </small>
     @foreach($product->storages as $storage)
     <small>{{ $storage->name }},</small>
     @endforeach
    </div>
    <div>
     <small>RAM : </small>
     @foreach($product->rams as $ram)
     <small>{{ $ram->name }},</small>
     @endforeach
    </div>
    <div>
     <div class="d-flex justify-content-between">
        <h6>
            Ks -
            @php
                $prices = $product->product_prices;
            @endphp
            @isset($prices[0])
            {{ $prices[0]->discount_price ? number_format($prices[0]->discount_price) : number_format($prices[0]->normal_price) }}
            @endisset
        </h6>
        <small class="text-decoration-line-through text-danger">
            @isset ($prices[0])
            {{ $prices[0]->discount_price ? number_format($prices[0]->normal_price) : "" }} {{ $prices[0]->discount_price ? " Ks" : "" }}
            @endisset
        </small>
     </div>
     {{-- <div class="custom-hide text-end">
      <a href="#" class="btn btn-warning text-white">Add to cart</a>
     </div> --}}
    </div>
   </div>
   @endforeach
  </div>
 </section>

 <section>
  <div class="container">
   <div class="row">
    <div class="row shadow bg-body rounded my-3 ms-1">
     <div class="col-md-6 col-sm-12 mt-3">
      <h4 class="text-center">King of the week</h4>
      <div>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem pariatur itaque distinctio harum,
        velit
        soluta impedit. Ad odit quae distinctio adipisci fugiat dolorem cupiditate maxime est! Rerum maiores
        consequatur, dolore non quas ex odio quos pariatur quae, explicabo eius impedit?</p>
      </div>
     </div>
     <div class="col-md-6 col-sm-12 mt-3">
      <img src="./assets/side8.jpg" class="img-fluid w-100" alt="">
     </div>
    </div>
   </div>
  </div>
 </section>

 <section>
  <div class="container">
   <div class="mt-5 d-flex justify-content-center">
    <h2 class="text-center topic">Available Accessories</h2>
   </div>
   <div class="row mt-sm-3 mt-lg-5">
    @foreach($available_accessories as $ava)
    <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between m-1 shadow p-3 bg-body rounded">
     <div class="text-end">
      <a href="my_cart.html"><i class="fas fa-cart-arrow-down text-dark"></i></a>
      {{-- <a href="#"><i class="fas fa-heart text-dark"></i></a> --}}
     </div>
     <div class="text-center mb-4">
      <img src="{{ $ava->img1_url }}" class="img-fluid w-50" alt="">
     </div>
     <div>
      <a href="{{url('/accessory_detail/'.$ava->id) }}">{{ $ava->name }} <sup class="text-warning">New</sup></a>
     </div>
     <div>
      <small>Color :</small>
      @foreach($ava->colors as $color)
      <small class="badge text-bg-info"> {{ $color->name }}</small>
      @endforeach
     </div>
     <div>
      <div class="d-flex justify-content-between">
       <h6>Ks - {{ $ava->colors->first()->pivot->discount_price ? number_format($ava->colors->first()->pivot->discount_price) : number_format($ava->colors->first()->pivot->normal_price) }}</h6>
       <small class="text-decoration-line-through text-danger">{{ $ava->colors->first()->pivot->discount_price ? number_format($ava->colors->first()->pivot->normal_price) : "" }} {{ $ava->colors->first()->pivot->discount_price ? " Ks" : '' }}</small>
      </div>
      {{-- <div class="custom-hide text-end">
       <a href="#" class="btn btn-warning text-white">Add to cart</a>
      </div> --}}
     </div>
    </div>
    @endforeach
   </div>
  </div>
 </section>

 <section class="mt-lg-5 mt-sm-3">
  <div class="container bg-body-tertiary p-3">
   <div class="row text-center">
    <div class="col-lg-8 col-sm-12 m-auto">
     <h3>Order Now!</h3>
     <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga cum maxime hic quidem corporis distinctio reiciendis
      nisi? Magni ducimus iste magnam temporibus, quos harum, culpa deleniti similique facilis quas qui exercitationem
      rem labore eveniet, voluptates totam pariatur! Consectetur, distinctio quos.
     </p>
    </div>
   </div>
  </div>
 </section>
 <!-- content section end  -->

</x-layout>
