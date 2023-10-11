<x-layout>
 <!-- content section start -->
 <section class="container mt-md-5">
  <div class="row">
   @foreach($mergedProducts as $product)
   <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between m-1 shadow p-3 bg-body rounded">
    <div class="text-end">
     <a href="my_cart.html"><i class="fas fa-cart-arrow-down text-dark"></i></a>
     <a href="#"><i class="fas fa-heart text-dark"></i></a>
    </div>
    <div class="text-center mb-4">
     <img src="{{ $product->img1_url }}" class="img-fluid w-50" alt="">
    </div>
    <div>
     <a href="{{url('/product_detail/'.$product->id) }}">{{ $product->name }}
      <sup class="text-warning">New</sup></a>
    </div>
    <div>
     <small>Color : </small>
     @foreach($product->colors as $color)
     <small>{{ $color->name }},</small>
     @endforeach
    </div>
    <div>
     @if($product->storages)
     <small>Storage : </small>
     @foreach($product->storages as $storage)
     <small>{{ $storage->name }},</small>
     @endforeach
     @endif
    </div>
    <div>
     @if($product->rams)
     <small>RAM : </small>
     @foreach($product->rams as $ram)
     <small>{{ $ram->name }},</small>
     @endforeach
     @endif
    </div>
    <div>
     <div class="d-flex justify-content-between">
      @if($product->colors->first()->pivot->normal_price)
      <h6>Ks - {{ $product->colors->first()->pivot->normal_price }}</h6>
      @else
      <h6>Ks - {{ $product->normal_price }}</h6>
      @endif
      <strong class="text-decoration-line-through text-danger">$20</strong>
     </div>
     <!-- <div class="">
            <span class="fas fa-star"></span>
            <span class="fas fa-star"></span>
            <span class="fas fa-star"></span>
            <span class="fas fa-star-half"></span>
            <span class="fas fa-star-half"></span>
          </div> -->
     <div class="custom-hide text-end">
      <a href="#" class="btn btn-warning text-white">Add to cart</a>
     </div>
    </div>
   </div>
   @endforeach
  </div>
 </section>
 <!-- content section end -->
</x-layout>