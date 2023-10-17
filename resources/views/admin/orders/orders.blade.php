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
  <div class="col-xl-12">
   <!-- BEGIN row -->
   <div class="row">
    <!-- BEGIN col-9 -->
    <div class="col-xl-12">
     <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Order Dashboard</li>
     </ul>

     <h1 class="page-header">
        {{ $status }}
     </h1>

     <hr class="mb-4">

     <!-- BEGIN #datatable -->
     <div id="datatable" class="mb-5">
      {{-- <h4><a href="{{ route('admin.orders.create') }}" class="btn btn-primary">New Color Create</a></h4> --}}
      <p></p>
      <div class="card">
       <div class="card-body">
        <table id="datatableDefault" class="table text-nowrap w-100">
         <thead>
          <tr>
           <th>#</th>
           <th>Username</th>
           <th>Phone</th>
           <th>Address</th>
           <th>Status</th>
           <th>Sub Total</th>
           <th>Created At</th>
           <th>Updated At</th>
           <th>Action</th>

          </tr>
         </thead>
         <tbody>
          @foreach($orders as $key => $order)
          <tr>
           <td>{{ ++$key }}</td>
           <td>{{ $order->user->name }}</td>
           <td>{{ $order->user->phone }}</td>
           <td>{{ $order->user->address }}</td>
            <td>
                {{ $order->status }}
                <form action="{{ url('/admin/orders/status/'.$order->id) }}" method="post">
                    @csrf
                    <div class="my-2">
                        <select name="status" id="" class="form-select">
                            <option value="pending">pending</option>
                            <option value="delivering">delivering</option>
                            <option value="completed">completed</option>
                        </select>
                        <button class="btn btn-sm btn-outline-theme mt-2" type="submit">Change</button>
                    </div>

                </form>
            </td>
           <td>{{ $order->sub_total }}</td>
           <td>{{ $order->created_at->format('F j, Y') }}</td>
           <td>{{ $order->updated_at->format('F j, Y') }}</td>
           <td>
            {{-- <a href="{{ url('/orders/pending/') }}" class="btn btn-primary btn-sm">Edit</a> --}}
            <a href="{{ url('/admin/order_detail/'.$order->id) }}" class="btn btn-info btn-sm">Show</a>
            {{-- <form class="d-inline" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger btn-sm">Del</button>
            </form> --}}
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
