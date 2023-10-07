@extends('layouts.admin_app')
@section('styles')
<link href="{{ asset('admin_app/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
 <!-- BEGIN row -->
 <div class="row justify-content-center">
  <!-- BEGIN col-10 -->
  <div class="col-xl-10">
   <!-- BEGIN row -->
   <div class="row">
    <!-- BEGIN col-9 -->
    <div class="col-xl-12">
     <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Accessory Dashboard</li>
     </ul>

     <h1 class="page-header">
      Accessory Detail
     </h1>

     <hr class="mb-4">

     <!-- BEGIN #datatable -->
     <div id="datatable" class="mb-5">
      <h4 class="text-end"><a href="{{ route('admin.accessories.index') }}" class="btn btn-primary"><i
         class="fas fa-arrow-left me-1"></i>Back</a></h4>
      <div class="card">
       <div class="card-body">
        <p><i class="fas fa-calendar me-2"></i>- {{ $accessory->created_at->format('j M, Y') }}</p>
        <h4>{{ $accessory->name }}</h4>
        <h5 class="mt-3">Brand - {{ $accessory->brand->name }}</h5>
        <div class="my-3">
         <div>
          <table class="table text-nowrap w-100">
           <tr>
            <th>Colors</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Discount</th>
           </tr>
           @forelse ($accessory->colors as $color)
           @php
           $pivotData = $color->pivot;
           $qty = $pivotData->qty;
           $normalPrice = $pivotData->normal_price;
           $discountPrice = $pivotData->discount_price;
           @endphp

           <tr>
            <td><span class="badge text-bg-info">{{ $color->name }}</span></td>
            <td>
             <p>{{ $qty }}</p>
            </td>
            <td>
             <p>{{ $normalPrice }} MMK</p>
            </td>
            <td>
             <p>{{ $discountPrice }} MMK</p>
            </td>
           </tr>
           @empty
           <p>No colors associated with this accessory.</p>
           @endforelse
          </table>
         </div>
        </div>
        <div class="row">
         <div class="col-md-3 mb-3">
          <p>Image-1</p>
          <img src="{{ $accessory->img1_url }}" class="w-75 img-thumbnail" alt="">
         </div>
         <div class="col-md-3 mb-3">
          <p>Image-2</p>
          <img src="{{ $accessory->img2_url }}" class="w-75 img-thumbnail" alt="">
         </div>
         <div class="col-md-3 mb-3">
          <p>Image-3</p>
          <img src="{{ $accessory->img3_url }}" class="w-75 img-thumbnail" alt="">
         </div>
         <div class="col-md-3 mb-3">
          <p>Image-4</p>
          <img src="{{ $accessory->img4_url }}" class="w-75 img-thumbnail" alt="">
         </div>
        </div>

        <div class="my-3">
         <h5>Accessory Description</h5>
         {!! $accessory->description !!}
        </div>
       </div>
      </div>
     </div>

     <!-- END #datatable -->

     <!-- BEGIN #bootstrapTable -->

     <!-- END #bootstrapTable -->
    </div>
    <!-- END col-9-->
   </div>
   <!-- END row -->
  </div>
  <!-- END col-10 -->
 </div>
 <!-- END row -->
 {{-- @include('sweetalert::alert') --}}

</div>
@endsection

@section('scripts')
<script src="{{ asset('admin_app/assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/js/demo/highlightjs.demo.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('admin_app/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/js/demo/table-plugins.demo.js') }}"></script>
<script src="{{ asset('admin_app/assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
<!-- ================== END page-js ================== -->
@endsection