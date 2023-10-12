 <style>
.choice span {
 display: inline-block;
 text-align: center;
 /* margin: 10px; */
 width: 70px;
 height: 30px;
}
 </style>
 <x-layout>
  <!-- content section start  -->
  <section class="container mt-md-5 mt-sm-3">
   <div class="row">
    <div class="col-md-6 col-sm-12 border border-1 p-3">
     <div>
      <h5>{{ $product->brand->name }}/{{ $product->name }}</h5>
     </div>
     <div class="text-center my-md-3">
      <img src="{{ $product->img1_url }}" class="img-fluid w-75" alt="">
     </div>
     <div class="row">
      <div class="owl-carousel owl-theme mt-4 p-5" id="product-details-carousel">
       <div class="item" data-item-id="1">
        <div class="card">
         <div class="card-body d-flex justify-content-center">
          <img src="{{ $product->img1_url }}" class="img-fluid card-image-top w-75" alt="">
         </div>
        </div>
       </div>
       <div class="item" data-item-id="2">
        <div class="card">
         <div class="card-body d-flex justify-content-center">
          <img src="{{ $product->img2_url }}" class="img-fluid card-image-top w-75" alt="">
         </div>
        </div>
       </div>
       <div class="item" data-item-id="3">
        <div class="card">
         <div class="card-body d-flex justify-content-center">
          <img src="{{ $product->img3_url}}" class="img-fluid card-image-top w-75" alt="">
         </div>
        </div>
       </div>
       <div class="item" data-item-id="4">
        <div class="card">
         <div class="card-body d-flex justify-content-center">
          <img src="{{ $product->img4_url }}" class="img-fluid card-image-top w-75" alt="">
         </div>
        </div>
       </div>
      </div>
      <div class="row">
       <div class="col-md-8 col-sm-10 modal p-3 my-2" id="carousel-modal">
        <span class="close">&times;</span>
        <div class="modal-content">
         <div class="owl-carousel owl-theme" id="modal-carousel"></div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="col-md-6 col-sm-12 p-3">
     <h3 class="text-warning">{{ $product->name }}</h3>
     <h4 class="text-info fw-bold">Brand - {{ $product->brand->name }}</h4>
     <p class="fw-bold">Color -
      @foreach ($product->colors as $color)
      <span class="badge text-bg-primary">{{ $color->name }}</span>
      @endforeach
     </p>
     <p class="fw-bold">Storage -
      @foreach ($product->storages as $storage)
      <span class="badge text-bg-secondary">{{ $storage->name }}</span>
      @endforeach
     </p>
     <p class="fw-bold">RAM -
      @foreach ($product->rams as $ram)
      <span class="badge text-bg-info">{{ $ram->name }}</span>
      @endforeach
     </p>

     <div class="row mt-1">
      <div class="col-1">
      </div>
      <div class="col-2">
       <h6 class="text-warning">Color</h6>
      </div>
      <div class="col-2">
       <h6 class="text-warning">RAM</h6>
      </div>
      <div class="col-2">
       <h6 class="text-warning">Storage</h6>
      </div>
      @foreach($prices as $key => $price)
      <div class="row my-1">
       <div class="col-1 mt-1">
        <input id="radio-{{ $price->id }}" type="checkbox" name="selected_price" class="price-enable">
       </div>
       <div class="col-2 choice">
        <span class="border border-warning">{{ $price->color->name }}</span>
       </div>
       <div class="col-2 choice">
        <span class="border border-warning">{{ $price->ram->name }}</span>
       </div>
       <div class="col-2 choice">
        <span class="border border-warning">{{ $price->storage->name }}</span>
       </div>
       <div class="col-3">
        @if($price->category->name == 'Brand New')
        <p class="text-success">({{ $price->category->name }})</p>
        @else
        <p class="text-info">({{ $price->category->name }})</p>
        @endif
       </div>
      </div>
      @endforeach

      @foreach($prices as $key=>$price)
      <div class="row d-none" id="price-{{ $price->id }}">
       <div class="col-12 mt-2">
        <div class="d-flex">
         <p style="font-size: 17px;">Price : </p>
         @if ($price->discount_price)
         <h6 style="text-decoration: line-through;">{{ number_format($price->normal_price) }} MMK</h6>
         <div class="ms-1">
          <h5 class="text-danger">{{ number_format($price->discount_price) }} MMK</h5>
         </div>
         @else
         <h5>{{ number_format($price->normal_price) }} MMK</h5>
         @endif
        </div>
       </div>
       <form>
        <div class="d-flex">
         <div class="col-sm-3">
          <div class="input-group">
           <span class="input-group-prepend">
            <button class="btn btn-outline-warning rounded-left" type="button"
             onclick="changeValue(this, -1)">-</button>
           </span>
           <input type="number" class="form-control text-dark text-center px-3"
            style="border-top-left-radius: 0; border-bottom-left-radius: 0;" min="1" max="10" value="1">
           <span class="input-group-append">
            <button class="btn btn-outline-warning rounded-right" type="button"
             onclick="changeValue(this, 1)">+</button>
           </span>
          </div>
         </div>
         <div class="input-group">
          <a href="#!" class="btn bg-warning p-2 mx-2">Add To Cart</a>
         </div>
        </div>
       </form>
       <div class="row price-qty" data-id="{{ $price->id }}" style="display: none">
        <!-- Add content for price-qty section here -->
       </div>
      </div>

      {{-- <script>
                $(document).ready(function(){
                    $("#radio-{{ $price->id }}").click(function(){
      $("#price-{{ $price->id }}").toggleClass('d-none');
      $(".price-qty[data-id={{ $price->id }}]").toggle();
      });
      });

      function changeValue(button, value) {
      let input = $(button).closest('.input-group').find('input');
      let currentValue = parseInt(input.val());
      let newValue = currentValue + value;

      if (newValue >= parseInt(input.attr('min')) && newValue <= parseInt(input.attr('max'))) { input.val(newValue); } }
       </script> --}}
       @endforeach

     </div>
     <div>

     </div>
     <div class="mt-2">
      <p>{!! $product->description !!}</p>
     </div>
    </div>
   </div>
  </section>

  <section class="bg-body-secondary mt-md-5 mt-sm-5">
   <div class="container">
    <div class="col-md-12 mt-sm-2 p-4 text-center">
     <h6>201 <span>Reviews</span> - 4.5 Rating (Overall)</h6>
     <div>
      <span><i class="fas fa-star"></i></span>
      <span><i class="fas fa-star"></i></span>
      <span><i class="fas fa-star"></i></span>
      <span><i class="fas fa-star-half"></i></span>
      <span><i class="fas fa-star-half"></i></span>
     </div>
     <h6 class="fw-bold">We want to hear from you.</h6>
     <small>What's your review?</small>
    </div>
   </div>
  </section>

  <section class="container mt-md-5 mt-sm-3">
   <div class="row">
    <div class="col-md-6 my-4">
     <div class="d-flex flex-column">
      <div class="mb-md-4">
       <strong>Hsu Nandar Lwin</strong>&nbsp;<small class="fst-italic">27 Feb 2018 10:57:43</small>
       <div class="d-flex">
        <div>
         <span>&nbsp;&nbsp;(4.0 Rating)</span>
        </div>
       </div>
       <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, accusantium?
        Laboriosam
        repellendus
        similique, sit laborum saepe consectetur a quam odit, distinctio iure sequi, excepturi
        consequuntur nisi?
        Repellat eius quisquam voluptate reiciendis praesentium pariatur voluptas perspiciatis vero
        id, architecto
        autem porro nostrum! Autem quasi nobis dolore. Cum dolorum nemo laudantium id.</p>
      </div>
      <div class="mb-md-4">
       <strong>Thit Htoo Aung</strong>&nbsp;<small class="fst-italic">27 Feb 2018 10:57:43</small>
       <div class="d-flex">
        <div>
         <span>&nbsp;&nbsp;(4.0 Rating)</span>
        </div>
       </div>
       <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, accusantium?
        Laboriosam
        repellendus
        similique, sit laborum saepe consectetur a quam odit, distinctio iure sequi, excepturi
        consequuntur nisi?
        Repellat eius quisquam voluptate reiciendis praesentium pariatur voluptas perspiciatis vero
        id, architecto
        autem porro nostrum! Autem quasi nobis dolore. Cum dolorum nemo laudantium id.</p>
      </div>
      <div class="mb-md-4">
       <strong>Khant Aung</strong>&nbsp;<small class="fst-italic">27 Feb 2018 10:57:43</small>
       <div class="d-flex">
        <div>
         <span>&nbsp;&nbsp;(4.0 Rating)</span>
        </div>
       </div>
       <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, accusantium?
        Laboriosam
        repellendus
        similique, sit laborum saepe consectetur a quam odit, distinctio iure sequi, excepturi
        consequuntur nisi?
        Repellat eius quisquam voluptate reiciendis praesentium pariatur voluptas perspiciatis vero
        id, architecto
        autem porro nostrum! Autem quasi nobis dolore. Cum dolorum nemo laudantium id.</p>
      </div>
     </div>
    </div>
    <div class="col-md-6 shadow p-3">
     <form action="">
      <div class="row">
       <div class="col-lg-6 col-sm-12 mb-2">
        <input type="text" class="form-control" placeholder="Name" aria-label="name">
       </div>
       <div class="col-lg-6 col-sm-12 mb-2">
        <input type="text" class="form-control" placeholder="Email" aria-label="email">
       </div>
      </div>
      <div class="row">
       <div class="col-lg-6 col-sm-12 mb-2">
        <input type="text" class="form-control" placeholder="Phone" aria-label="name">
       </div>
       <div class="col-lg-6 col-sm-12 mb-2">
        <input type="number" class="form-control" placeholder="Your rating (1-5)" aria-label="email">
       </div>
      </div>
      <div class="mb-md-3 mt-2">
       <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="What's your review?"></textarea>
      </div>
      <button type="submit" class="btn bg-warning mt-2">Submit</button>
     </form>
    </div>
   </div>
  </section>
  <!-- content section end  -->

 </x-layout>



 <script>
$(document).ready(function() {
 // Use event delegation for radio button click
 $(document).on('click', '.price-enable', function() {
  let priceId = $(this).attr('id').split('-')[1];
  $("#price-" + priceId).toggleClass('d-none');
  $(".price-qty[data-id=" + priceId + "]").toggle();
 });

 // Change value function
 function changeValue(button, value) {
  let input = $(button).closest('.input-group').find('input');
  let currentValue = parseInt(input.val());
  let newValue = currentValue + value;

  if (newValue >= parseInt(input.attr('min')) && newValue <= parseInt(input.attr('max'))) {
   input.val(newValue);
  }
 }

 // Attach changeValue function to buttons
 $('.input-group').on('click', 'button', function() {
  let value = $(this).hasClass('rounded-left') ? -1 : 1;
  changeValue(this, value);
 });
});
 </script>