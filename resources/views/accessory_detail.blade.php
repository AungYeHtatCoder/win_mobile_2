<x-layout>

 <section class="container mt-md-5 mt-sm-3">
  <div class="row">
   <div class="col-md-6 col-sm-12 border border-1 p-3">
    <div>
     <h5>Category/Accessory/{{ $accessory->category->name }}</h5>
    </div>
    <div class="text-center my-md-3">
     <img src="{{ $accessory->img1_url }}" class="img-fluid w-75" alt="">
    </div>
    <div class="row">
     <div class="owl-carousel owl-theme mt-4 p-5" id="product-details-carousel">
      <div class="item" data-item-id="1">
       <div class="card">
        <div class="card-body d-flex justify-content-center">
         <img src="{{ $accessory->img1_url }}" class="img-fluid card-image-top w-75" alt="">
        </div>
       </div>
      </div>
      <div class="item" data-item-id="2">
       <div class="card">
        <div class="card-body d-flex justify-content-center">
         <img src="{{ $accessory->img2_url }}" class="img-fluid card-image-top w-75" alt="">
        </div>
       </div>
      </div>
      <div class="item" data-item-id="3">
       <div class="card">
        <div class="card-body d-flex justify-content-center">
         <img src="{{ $accessory->img3_url }}" class="img-fluid card-image-top w-75" alt="">
        </div>
       </div>
      </div>
      <div class="item" data-item-id="4">
       <div class="card">
        <div class="card-body d-flex justify-content-center">
         <img src="{{ $accessory->img4_url }}" class="img-fluid card-image-top w-75" alt="">
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
    <h3 class="text-warning">{{ $accessory->name }}</h3>




    <div>
     <div class="">

      <div class="tab">
       @foreach($accessory->colors as $key => $color)
       <button class="tablinks p-2 rounded" onclick="selectColor(event, '{{ $color->name }}')"
        style="background-color: blanchedalmond;border: none; "
        id="{{ $key === 0 ? 'defaultOpen' :'' }}">{{ $color->name }}</button>
       @endforeach
      </div>


      @foreach($accessory->colors as $color)
      <div id="{{ $color->name }}" class="tabcontent mt-2" style="border: none;outline: none;">
       <h6>Color : {{ $color->name }}</h6>
       @if($color->pivot->discount_price)
       <h4 class="text-info fw-bold">Price : Ks -<span
         style="text-decoration:line-through; font-size:20px;">{{ $color->pivot->normal_price }}</span>
        <span class="text-danger fw-bold">{{ $color->pivot->discount_price }}</span>
       </h4>
       @else
       <h4 class="text-info fw-bold">Price : Ks-{{ $color->pivot->normal_price }}</h4>
       @endif
       <!-- <div class="d-flex my-2">
        <p class="text-success">15 <span>In stock</span></p> &nbsp; / &nbsp;
        <p class="text-danger">8 <span>Left</span></p>
       </div> -->
       <div class="d-flex">
        <div class="col-sm-3 my-1">
         <div class="input-group">
          <span class="input-group-prepend">
           <button class="btn btn-outline-warning rounded-left" type="button" onclick="decreaseValue()">-</button>
          </span>
          <input id="numberInput" type="number" class="form-control text-dark text-center px-3"
           style="border-top-left-radius: 0; border-bottom-left-radius: 0;" min="1" max="10" value="1">
          <span class="input-group-append">
           <button class="btn btn-outline-warning rounded-right" type="button" onclick="increaseValue()">+</button>
          </span>
         </div>
        </div>
        <div class="input-group">
         <a href="#!" class="btn bg-warning p-2 mx-2">Add to cart</a>
        </div>
       </div>
      </div>
      @endforeach

     </div>

     <form>


     </form>
    </div>
    <div class="mt-2">
     <p>{!! $accessory->description !!}</p>
    </div>
    <!-- <div class="my-3">
     <h6>Specification</h6>
     <ul>
      <li>Status : New</li>
      <li>Storage : 64GB</li>
      <li>RAM : 4GB</li>
      <li>Camera : 12px Main, 5MP Front, 64 Altra Wide</li>
      <li>Battery : 45000 mah</li>
      <li>Color : Skyblue</li>
     </ul>
    </div> -->
   </div>
  </div>
 </section>


</x-layout>

<script>
function selectColor(evt, color) {
 var i, tabcontent, tablinks;
 tabcontent = document.getElementsByClassName("tabcontent");
 for (i = 0; i < tabcontent.length; i++) {
  tabcontent[i].style.display = "none";
 }
 tablinks = document.getElementsByClassName("tablinks");
 for (i = 0; i < tablinks.length; i++) {
  tablinks[i].className = tablinks[i].className.replace(" active", "");
 }
 document.getElementById(color).style.display = "block";
 evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>