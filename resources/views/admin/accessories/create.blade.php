@extends('layouts.admin_app')
@section('styles')
<link href="{{ asset('admin_app/assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}"
 rel="stylesheet">
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
    <div class="col-md-10">
     <div id="formGrid" class="mb-5">
      <div class="d-flex justify-content-between">
       <h4>Accessory Create</h4>
       <p><a href="{{ route('admin.accessories.index') }}" class="btn btn-primary"><i
          class="fas fa-arrow-left me-1"></i>Back</a></p>
      </div>
      <div class="card">
       <div class="card-body">
        <form action="{{ route('admin.accessories.store') }}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="row">
          <div class="col-lg-12">
           <div class="mb-3 row">
            <label for="inputEmail1" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
             <input type="text" class="form-control" id="inputEmail1" name="name" placeholder="Enter Accessory Name">
             @error('name')
             <span class="text-danger">*{{ "The accessory name field is required." }}</span>
             @enderror
            </div>
           </div>
           <div class="mb-3 row">
            <label for="inputEmail1" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
             <select name="brand_id" id="" class="form-select form-control">
              <option value="">Choose Brand</option>
              @foreach ($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
              @endforeach
             </select>
             @error('brand_id')
             <span class="text-danger">*{{ "The accesssory brand field is required." }}</span>
             @enderror
            </div>
           </div>
           <div class="mb-3 row">
            <label for="inputEmail1" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
             <select name="accessorycat_id" id="" class="form-select form-control">
              <option value="">Choose Category</option>
              @foreach($accessory_categories as $cat)
              <option value="{{ $cat->id}} ">{{ $cat->name }}</option>
              @endforeach
             </select>
             @error('accessorycat_id')
             <span class="text-danger">*{{ "The accesssory categories field is required." }}</span>
             @enderror
            </div>
           </div>


           <div class="mb-3 row">
            <label for="inputEmail2" class="col-sm-2 col-form-label">Image 1</label>
            <div class="col-sm-10">
             <input type="file" class="form-control" id="inputEmail2" name="img1">
             @error('img1')
             <span class="text-danger">*{{ $message }}</span>
             @enderror
            </div>
           </div>
           <div class="mb-3 row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Image 2</label>
            <div class="col-sm-10">
             <input type="file" class="form-control" id="inputEmail3" name="img2">
            </div>
           </div>
           <div class="mb-3 row">
            <label for="inputEmail4" class="col-sm-2 col-form-label">Image 3</label>
            <div class="col-sm-10">
             <input type="file" class="form-control" id="inputEmail4" name="img3">
            </div>
           </div>
           <div class="mb-3 row">
            <label for="inputEmail5" class="col-sm-2 col-form-label">Image 4</label>
            <div class="col-sm-10">
             <input type="file" class="form-control" id="inputEmail5" name="img4">
            </div>
           </div>
          </div>
         </div>
         <div class="row">
          <div class="form-group mb-3">
           <label for="" class="form-label d-block">Accessory Description</label>
           <textarea name="description" id="desc" cols="30" rows="10"></textarea>
          </div>
         </div>
         <div class="row">
          <div class="form-group col-12 mb-2">
           <label for="Color">colors:</label><br>
           <div class="form-check form-check-inline">
            @foreach($colors as $color)
            <div class="d-flex justify-content-between mb-1">
             @php
             $inputName = "colors[{$color->id}]";
             $colorValue = $color->value ?? null;
             $qtyValue = $color->value ?? null;
             $priceValue = $color->value ?? null;
             $discountValue = $color->value ?? null;
             @endphp
             <div style="margin-right: 20px;">
              <input {{ $color->value ? 'checked' : null }} data-id="{{ $color->id }}" type="checkbox"
               class="service-enable form-check-input" id="color-{{ $color->id }}" value="{{ $color->id }}"
               name="{{ $inputName }}[color_id]">
              <label for="color-{{ $color->id }}" class="form-label">{{ $color->name }}</label>
             </div>

             <div>
              <input value="{{ $qtyValue }}" {{ $qtyValue ? null : 'disabled' }} data-id="{{ $color->id }}"
               name="{{ $inputName }}[qty]" type="number" class="color-qty form-control" placeholder="Quantity">
             </div>
             <div>
              <input value="{{ $priceValue }}" {{ $priceValue ? null : 'disabled' }} data-id="{{ $color->id }}"
               name="{{ $inputName }}[normal_price]" type="number" class="color-price form-control"
               placeholder="Normal Price">
             </div>
             <div>
              <input value="{{ $discountValue }}" {{ $discountValue ? null : 'disabled' }} data-id="{{ $color->id }}"
               name="{{ $inputName }}[discount_price]" type="number" class="color-discount form-control"
               placeholder="Discount Price">
             </div>
            </div>
            @endforeach
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
$(document).ready(function() {
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

<script>
$('document').ready(function() {
 $('.service-enable').on('click', function() {
  let id = $(this).attr('data-id')
  let enabled = $(this).is(":checked")
  $('.color-qty[data-id="' + id + '"]').attr('disabled', !enabled)
  $('.color-qty[data-id="' + id + '"]').val(null)

  $('.color-price[data-id="' + id + '"]').attr('disabled', !enabled)
  $('.color-price[data-id="' + id + '"]').val(null)

  $('.color-discount[data-id="' + id + '"]').attr('disabled', !enabled)
  $('.color-discount[data-id="' + id + '"]').val(null)
 })
});
</script>
@endsection