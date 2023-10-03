@extends('layouts.admin_app')
@section('content')
  <div class="row">
   <div class="col-md-8">
    	<div id="formGrid" class="mb-5">
									<h4>Permission Update Dashboard <span> <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">Back To Permission Dashboard</a></span></h4>
									<p></p>
									<div class="card">
										<div class="card-body">
											<form action="{{ route('admin.permissions.update', $permission_edit['id']) }}" method="post">
                        @csrf
                        @method('PUT')
												<div class="mb-3 row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Permission Name</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputEmail3" name="title" value="{{ $permission_edit->title }}">
													</div>
												</div>
												
												<div class="form-group row">
													<div class="col-sm-10 offset-sm-2">
														<button type="submit" class="btn btn-outline-theme">Create New Permission</button>
													</div>
												</div>
											</form>
										</div>
										{{-- <div class="card-arrow">
											<div class="card-arrow-top-left"></div>
											<div class="card-arrow-top-right"></div>
											<div class="card-arrow-bottom-left"></div>
											<div class="card-arrow-bottom-right"></div>
										</div>
										<div class="hljs-container">
											<pre><code class="xml" data-url="assets/data/form-elements/code-11.json"></code></pre> --}}
										{{-- </div> --}}
									</div>
								</div>
   </div>
 @include('sweetalert::alert')

  </div>
@endsection