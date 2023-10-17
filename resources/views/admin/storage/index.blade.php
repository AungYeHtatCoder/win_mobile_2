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
      <li class="breadcrumb-item active">Storage Dashboard</li>
     </ul>

     <h1 class="page-header">
      Storage
     </h1>

     <hr class="mb-4">

     <!-- BEGIN #datatable -->
     <div id="datatable" class="mb-5">
      <h4><a href="{{ route('admin.storages.create') }}" class="btn btn-primary">New Storage Create</a></h4>
      <p></p>
      <div class="card">
       <div class="card-body">
        @if (session('toast_success'))
        <div class="alert alert-primary" role="alert">
         {{ session('toast_success') }}
        </div>
        @endif
        <table id="datatableDefault" class="table text-nowrap w-100">
         <thead>
          <tr>
           <th>#</th>
           <th>Storage Name</th>
           <th>Created At</th>
           <th>Updated At</th>
           <th>Action</th>

          </tr>
         </thead>
         <tbody>
          @foreach($storages as $key => $storage)
          <tr>
           <td>{{ ++$key }}</td>
           <td>{{ $storage->name }}</td>
           <td>{{ $storage->created_at->format('F j, Y') }}</td>
           <td>{{ $storage->updated_at->format('F j, Y') }}</td>
           <td>
            <a href="{{ route('admin.storages.edit', $storage->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('admin.storages.show', $storage->id) }}" class="btn btn-info btn-sm">Show</a>
            <form class="d-inline" action="{{ route('admin.storages.destroy', $storage->id) }}" method="POST">
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
       {{-- <div class="card-arrow">
											<div class="card-arrow-top-left"></div>
											<div class="card-arrow-top-right"></div>
											<div class="card-arrow-bottom-left"></div>
											<div class="card-arrow-bottom-right"></div>
										</div>
										<div class="hljs-container">
											<pre><code class="xml" data-url="assets/data/table-plugins/code-1.json"></code></pre>
										</div> --}}
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