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
      <li class="breadcrumb-item active">Home Banners</li>
     </ul>

     <h1 class="page-header">
      Home Banners
     </h1>

     <hr class="mb-4">

     <!-- BEGIN #datatable -->
     <div id="datatable" class="mb-5">
      <h4 class="text-end"><a href="{{ route('admin.banners.create') }}" class="btn btn-primary"><i
         class="fas fa-plus me-1"></i>Banner Create</a></h4>
      <p></p>
      <div class="card">
       <div class="card-body">
        <table id="datatableDefault" class="table text-nowrap w-100">
         <thead>
          <tr>
           <th>#</th>
           <th>Image</th>
           <th>Created_at</th>
           <th>Action</th>
          </tr>
         </thead>
         <tbody>
          @foreach ($banners as $key => $banner)
          <tr>
           <td>{{ ++$key }}</td>
           <td>
            <img width="100px" class="img-thumbnail" src="{{ $banner->img_url }}" alt="">
           </td>
           <td>
            {{ $banner->created_at->format('j M, Y') }}
           </td>
           <td>
            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <a href="{{ route('admin.banners.show', $banner->id) }}" class="btn btn-sm btn-info">Show</a>
            <form action="{{ route('admin.banners.destroy', $banner->id) }}" class="d-inline" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger btn-sm">Del</button>
            </form>
           </td>
          </tr>
          @endforeach
         </tbody>
        </table>
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
 @include('sweetalert::alert')

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