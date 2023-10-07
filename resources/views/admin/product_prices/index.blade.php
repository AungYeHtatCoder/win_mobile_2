@extends('layouts.admin_app')
@section('styles')
<link href="{{ asset('admin_app/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
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
									<li class="breadcrumb-item active">Product Stocks</li>
								</ul>

								<h1 class="page-header">
									Product Stocks
								</h1>

								<hr class="mb-4">

								<!-- BEGIN #datatable -->
								<div id="datatable" class="mb-5">
									{{-- <h4 class="text-end"><a href="{{ route('admin.product_prices.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i>Product Stock Create</a></h4> --}}
									<p></p>
									<div class="card">
										<div class="card-body">
											<table id="datatableDefault" class="table text-nowrap w-100">
												<thead>
													<tr>
														<th>#</th>
														<th>Name</th>
                                                        <th>Brand</th>
                                                        <th>Color</th>
                                                        <th>Storage</th>
                                                        <th>RAM</th>
                                                        <th>Category</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Created_at</th>
														{{-- <th>Action</th> --}}
													</tr>
												</thead>
                                                <tbody>
                                                    @foreach ($prices as $key => $price)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $price->product->name }}</td>
                                                        <td>
                                                            {{ $price->product->brand->name }}
                                                        </td>
                                                        <td>
                                                            {{ $price->color->name }}
                                                        </td>
                                                        <td>
                                                            {{ $price->storage->name }}
                                                        </td>
                                                        <td>
                                                            {{ $price->ram->name }}
                                                        </td>
                                                        <td>
                                                            {{ $price->category->name }}
                                                        </td>
                                                        <td>
                                                            {{ $price->qty }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($price->normal_price) }} MMK
                                                        </td>
                                                        <td>
                                                            {{ $price->discount_price ? number_format($price->discount_price)." MMK" : "" }}
                                                        </td>
                                                        <td>
                                                            {{ $price->created_at->format('j M, Y') }}
                                                        </td>
                                                        {{-- <td>
                                                            <a href="{{ route('admin.products.edit', $price->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="{{ route('admin.products.show', $price->id) }}" class="btn btn-sm btn-info">Show</a>
                                                            <form action="{{ route('admin.products.destroy', $price->id) }}" class="d-inline" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                                            </form>
                                                        </td> --}}
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
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/table-plugins.demo.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
	<!-- ================== END page-js ================== -->
@endsection
