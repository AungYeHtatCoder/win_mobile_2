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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <!-- BEGIN row -->
    <div class="row justify-content-center">
        <!-- BEGIN col-10 -->
        <div class="col-xl-12">
            <!-- BEGIN row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="formGrid" class="mb-5">
                        <div class="d-flex justify-content-between">
                            <h4>Product Price Create</h4>
                            <p><a href="{{ url('/admin/products/prices/'.$product->id) }}" class="btn btn-primary"><i class="fas fa-arrow-left me-1"></i>Back</a></p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('/admin/products/prices/create/'.$product->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Product</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail1" name="name" disabled placeholder="Enter Product Name" value="{{ $product->name }}">
                                                    @error('name')
                                                    <span class="text-danger">*{{ "The product name field is required." }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Brand</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="" id="" disabled  value="{{ $product->brand->name }}">
                                                    @error('brand_id')
                                                    <span class="text-danger">*{{ "The product brand field is required." }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10 mt-2">
                                                    <div class="d-flex">
                                                        @foreach ($categories as $category)
                                                        <div class="me-3">
                                                            <input type="radio" class="me-1" name="category_id" id="cat{{ $category->id }}"  value="{{ $category->id }}">
                                                            <label for="cat{{ $category->id }}" class="form-label">{{ $category->name }}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @error('category_id')
                                                    <span class="text-danger">*{{ "The product category field is required." }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Qty</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputEmail1" name="qty" placeholder="Enter Product Qty">
                                                    @error('qty')
                                                    <span class="text-danger">*{{ "The product qty field is required." }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputEmail1" name="normal_price" placeholder="Enter Normal Price">
                                                    @error('normal_price')
                                                    <span class="text-danger">*{{ "The price field is required." }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Discount (Optional)</label>
                                                <div class="col-sm-10 mt-2">
                                                    <input type="number" class="form-control" id="inputEmail1" name="discount_price" placeholder="Enter Discount Price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Color</label>
                                                <div class="col-sm-10">
                                                    <select name="color_id" id="" class="form-select">
                                                        <option value="">Choose Color</option>
                                                        @foreach ($product->colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">Storage</label>
                                                <div class="col-sm-10">
                                                    <select name="storage_id" id="" class="form-select">
                                                        <option value="">Choose Storage</option>
                                                        @foreach ($product->storages as $storage)
                                                        <option value="{{ $storage->id }}">{{ $storage->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="inputEmail1" class="col-sm-2 col-form-label">RAM</label>
                                                <div class="col-sm-10">
                                                    <select name="ram_id" id="" class="form-select">
                                                        <option value="">Choose RAM</option>
                                                        @foreach ($product->rams as $ram)
                                                        <option value="{{ $ram->id }}">{{ $ram->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2 offset-sm-5">
                                            <button type="submit" class="btn btn-outline-theme"><i class="fas fa-plus me-1"></i>Create</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- ================== END page-js ================== -->
    <script>
        $(document).ready(function () {
            $(".select2").select2({

            });
        });
    </script>
    <script>
        $('#desc').summernote({
          placeholder: 'Enter Product Description',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });

      </script>
@endsection
