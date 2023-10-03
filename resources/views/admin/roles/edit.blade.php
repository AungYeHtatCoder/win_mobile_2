@extends('layouts.admin_app')
@section('styles')
<link href="{{ asset('admin_app/assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/jquery-typeahead/dist/jquery.typeahead.min.css') }}" rel="stylesheet">
@endsection
@section('content')
  <div class="container">
				<!-- BEGIN row -->
				<div class="row justify-content-center">
					<!-- BEGIN col-10 -->
					<div class="col-xl-10">
						<!-- BEGIN row -->
						<div class="row">

							<div class="col-md-10">
    	<div id="formGrid" class="mb-5">
									<h4>Role Update <span> <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Back To Role Dashboard</a></span></h4>
									<p></p>
									<div class="card">
										<div class="card-body">
											<form action="{{ route('admin.roles.update', $role['id']) }}" method="post">
            @csrf
            @method('PUT')
												<div class="mb-3 row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Role Name</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputEmail3" name="title" value="{{ $role->title }}">
													</div>
												</div>
													{{-- permission multiple select box --}}
														<div class="mb-3">
															<label class="form-label">Choose Permission <span class="text-danger">*</span></label>
															<select name="permissions[]" class="selectpicker form-control" id="ex-multiselect" multiple>
																<optgroup label="Picnic">
																	 @foreach($permissions as $id => $permission)
                <option value="{{ $id }}"
                 {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                 {{ $permission }}</option>
                @endforeach
																</optgroup>
															</select>
														</div>
												<div class="form-group row">
													<div class="col-sm-10 offset-sm-2">
														<button type="submit" class="btn btn-outline-theme">Create New Role</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
   </div>
            
      </div>
     </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('admin_app/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-slider/dist/bootstrap-slider.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/jquery-typeahead/dist/jquery.typeahead.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/tag-it/js/tag-it.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-tmpl/js/tmpl.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-load-image/js/load-image.all.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/summernote/dist/summernote-lite.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/select-picker/dist/picker.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/highlightjs.demo.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/form-plugins.demo.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
	<!-- ================== END page-js ================== -->

@endsection