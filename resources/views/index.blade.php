<x-layout>
 <x-client_secondary_nav />
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
           <h6 class="me-3">Ks -
            {{ $accessory->colors->first()->pivot->discount_price ? number_format($accessory->colors->first()->pivot->discount_price) : number_format($accessory->colors->first()->pivot->normal_price) }}
           </h6>
           <small class="text-danger text-decoration-line-through">
            {{ $accessory->colors->first()->pivot->discount_price ? "Ks - " : '' }}
            {{ $accessory->colors->first()->pivot->discount_price ? number_format($accessory->colors->first()->pivot->normal_price) : "" }}
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
 <hr class="my-3 mx-5">
 <section class="container mt-md-5 mb-4">
  <div class="mt-5 d-flex justify-content-center py-4 my-5">
   <h2 class="text-center topic">Latest Products</h2>
  </div>
  <div class="row">
   @foreach($products as $product)
   <div
    class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between m-1 shadow p-3 bg-body rounded product-card">
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
       {{ $prices[0]->discount_price ? number_format($prices[0]->normal_price) : "" }}
       {{ $prices[0]->discount_price ? " Ks" : "" }}
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
 <hr class="my-5 mx-5">
 <section class="mb-5">
  <div class="container">
   <!-- <div class="row"> -->
   <div class="row my-3 ms-1">
    <div class="col-md-6 col-sm-12 mt-3">
     <div class="justify-content-center aligns-items-center mt-lg-5">
      <p>✅ အဟောင်းပေးအသစ်ယူ အလဲအထပ်ရပါတယ်ရှင့်</p>
      <p>✅ Win Mobile မှာ အရစ်ကျစနစ်နဲ့ ငွေပေးချေလိုရတယ်လေ။</p>
      <p>✅ အရစ်ကျ ဝယ်ယူထားတဲ့ ဖုန်းအတွက် ကုန်ကျစရိတ်ကို တစ်လချင်းစီ အေးဆေး ပေးသွင်းသွားရုံပဲ။</p>
     </div>

     <div class="mt-5">
      <a href="contact.html" type="button" class="text-white rounded px-3 py-2 me-2"
       style="background: #c20f04;opacity:0.8;">Contact us</a>
      <a href="shop.html" type="button" class="text-white rounded px-3 py-2 me-2"
       style="background: #c20f04;opacity:0.8;">Shop Now >> </a>
     </div>

    </div>
    <div class="col-md-6 col-sm-12 mt-lg-0 mt-5">
     <img src="./assets/banner_promo.jpg" class="img-fluid w-100 rounded" alt="">
    </div>
   </div>
   <!-- </div> -->
  </div>
 </section>
 <hr class="my-3 mx-5">
 <section>
  <div class="container py-4">
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
       <h6>Ks -
        {{ $ava->colors->first()->pivot->discount_price ? number_format($ava->colors->first()->pivot->discount_price) : number_format($ava->colors->first()->pivot->normal_price) }}
       </h6>
       <small
        class="text-decoration-line-through text-danger">{{ $ava->colors->first()->pivot->discount_price ? number_format($ava->colors->first()->pivot->normal_price) : "" }}
        {{ $ava->colors->first()->pivot->discount_price ? " Ks" : '' }}</small>
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
 <hr class="mx-5">


 <section class="mt-lg-5 mt-sm-3 promotions">
  <div class="container p-3">
   <div class="row text-center justify-content-center align-items-center">

    <div class="col-lg-6 col-sm-11 mx-2">
     <img src="./assets/promo_clipart.jpg" alt="" width="100px" height="100px">
     <h3 class="d-inline">ကြိုတင် Preorder တင်လို့ရပြီနော် </h3>

     <div class="row">
      <!-- <div class=" col-mfw-bold mt-5"> -->
      <div class="col-lg-5 col-10 mx-lg-3 mx-auto p-3 mt-lg-0 mt-3 bg-light shadow">Redmi Note 13 Pro+ (12/256)
       <p>Color - Black / White</p>
      </div>

      <div class="col-lg-5 col-10 p-3 mx-auto mt-lg-0 mt-3 bg-light shadow">Redmi Note 13 Pro+ (12/512)
       <p>Color - Black / White</p>
      </div>
      <!-- </div> -->
     </div>

     <!-- <div class="d-flex justify-content-center fw-bold mt-5">
        <div class="mx-3 p-3 bg-light shadow">Redmi Note 13 Pro+ (12/256)
          <p>Color - Black / White</p>
        </div>

        <div class="p-3 bg-light shadow">Redmi Note 13 Pro+ (12/512)
          <p>Color - Black / White</p>
        </div>
      </div> -->

    </div>

    <div class="col-lg-3 col-sm-11 mt-sm-5 mt-lg-0 mt-md-5 mt-5">
     <img src="./assets/promo_img.jpg" alt="" style="width:300px;height:300px;transform:rotate(15deg);">
    </div>

   </div>
  </div>
 </section>
 <hr class="mx-5">

 <section class="container d-flex justify-content-center mt-5 services">

  <div class="row">
   <div class="col-lg-3 col-md-5 col-sm-10 p-3 mx-auto mt-2 bg-light shadow">
    <i class="fas fa-truck text-dark d-flex justify-content-center" style="font-size:3rem;text-align:center;"></i>
    <!-- <h4>Service</h4> -->
    <p class="text-center mt-3" style="font-size:14px; line-height:1.5rem">နယ်မှဝယ်ယူသော Customer များ ကားဂိတ်
     (သိုမဟုတ်) အမြန်ချောပို Royal Express/ MGL ဖြင့် ပစ္စည်းအိမ်တိုင်ရောက် ပိုတင်ပေးပါသည်။</p>
   </div>

   <div class="col-lg-3 col-md-5 col-sm-10  p-3 mx-auto mt-2 bg-light shadow">
    <i class="fas fa-wallet text-dark d-flex justify-content-center" style="font-size:3rem;text-align:center;"></i>
    <!-- <h4>Service</h4> -->
    <p class="text-center mt-3" style="font-size:14px; line-height:1.5rem">KBZ Bank, CB Bank, AYA Bank, Yoma Bank, Kpay,
     Wave Money များဖြင့်လဲ ငွေပေးချေ ၀ယ်ယူနိုင်ပါသည်။</p>
   </div>

   <div class="col-lg-3 col-md-5 col-sm-10 p-3 mx-auto mt-2 bg-light shadow">
    <i class="fas fa-smile text-dark d-flex justify-content-center" style="font-size:3rem;text-align:center;"></i>
    <!-- <h4>Service</h4> -->
    <p class="text-center mt-3" style="font-size:14px; line-height:1.5rem">အရည်အသွေး အထူးကောင်းမွန်တဲ့ 𝐎𝐟𝐟𝐢𝐜𝐢𝐚𝐥
     𝐎𝐫𝐢𝐠𝐢𝐧𝐚𝐥 𝐒𝐞𝐜𝐨𝐧𝐝 အလုံးသန့် များကိုသာ (100%)အာမခံဖြင့်ရောင်းချပေးတာမို ယုံကြည်စိတ်ချစွာ ဝယ်ယူအားပေး
     နိုင်ပါသည်။</p>
   </div>

   <div class="col-lg-3 col-md-5 col-sm-10 p-3 mx-auto mt-2 bg-light shadow">
    <i class="fas fa-map-marker-alt text-dark d-flex justify-content-center"
     style="font-size:3rem;text-align:center;"></i>
    <!-- <h4>Service</h4> -->
    <p class="text-center mt-3" style="font-size:14px; line-height:1.5rem">ဆိုင်(၁) အေးမြကြည်လင်ဈေးအနီး၊ ကျောက်ဆည်မြို။
    </p>
    <p class="text-center " style="font-size:14px; line-height:1.5rem">ဆိုင်(၂) ရန်ကုန် - မန္တလေး လမ်းမကြီးဘေး၊ ပေါက်တော
     တံတားတောင်ဘက်၊ ကျောက်ဆည်မြို။</p>
   </div>

  </div>

 </section>
 <!-- content section end  -->

</x-layout>