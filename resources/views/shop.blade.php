<x-layout>
 <x-client_secondary_nav />
 <!-- content section start -->
 <section class="container mt-md-5">
  <div style="text-align: center;">
   @if($filterName === '')
   <h3>Search Result</h3>
   @else
   <h3>{{ $filterName }}</h3>
   @endif
  </div>
  <div class="row mt-4">
   @foreach($mergedProducts as $product)
   <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between m-1 shadow p-3 bg-body rounded">
    <div class="text-end">
     @if($product->storages || $product->rams)
     <a href="{{url('/product_detail/'.$product->id) }}">
      <i class="fas fa-cart-arrow-down text-dark"></i>
     </a>
     @else
     <a href="{{url('/accessory_detail/'.$product->id) }}">
      <i class="fas fa-cart-arrow-down text-dark"></i>
     </a>
     @endif
    </div>
    <div class="text-center mb-4">
     <img src="{{ $product->img1_url }}" class="img-fluid w-50" alt="">
    </div>
    <div>
     @if($product->storages || $product->rams)
     <a href="{{url('/product_detail/'.$product->id) }}">{{ $product->name }}
      <sup class="text-warning">New</sup></a>
     @else
     <a href="{{url('/accessory_detail/'.$product->id) }}">{{ $product->name }}
      <sup class="text-warning">New</sup></a>
     @endif
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
    </div>
   </div>
   @endforeach
  </div>
 </section>
 <!-- content section end -->
</x-layout>