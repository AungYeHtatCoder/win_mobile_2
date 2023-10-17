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
    <div class="row" style="z-index: 100;">
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
         style="text-decoration:line-through; font-size:20px;">{{ number_format($color->pivot->normal_price) }}</span>
        <span class="text-danger fw-bold">{{ number_format($color->pivot->discount_price) }}</span>
       </h4>
       @else
       <h4 class="text-info fw-bold">Price : Ks-{{ number_format($color->pivot->normal_price) }}</h4>
       @endif
       <div class="d-flex">
        <div class="col-sm-3 my-1">
            <form action="{{ url('/addToCart') }}" method="post">
                @csrf
                <div class="input-group">
                    <span class="input-group-prepend">
                     <button class="btn btn-outline-warning rounded-left" type="button"
                      onclick="changeValue(this, -1)">-</button>
                    </span>
                    <input type="number" class="form-control text-dark text-center px-3"
                     style="border-top-left-radius: 0; border-bottom-left-radius: 0;" min="1" max="10" value="1" name="qty">
                    <span class="input-group-append">
                     <button class="btn btn-outline-warning rounded-right" type="button"
                      onclick="changeValue(this, 1)">+</button>
                    </span>
                  </div>
                </div>
                <input type="hidden" name="accessory_id" value="{{ $accessory->id }}">
                <input type="hidden" name="color_id" value="{{ $color->id }}">
                <div class="input-group">
                <button type="submit" class="btn bg-warning p-2 mx-2">Add to cart</button>
                </div>
            </form>
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
   </div>
  </div>
 </section>


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
