@extends('layouts.admin_app')
@section('styles')
<!-- ================== BEGIN page-css ================== -->
<link href="{{ asset('admin_app/assets/plugins/lity/dist/lity.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
 rel="stylesheet">
<link href="{{ asset('admin_app/assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet">
<!-- ================== END page-css ================== -->

@endsection
@section('content')
<div class="card">
 <div class="card-body p-0">
  <!-- BEGIN profile -->
  <div class="profile">
   <!-- BEGIN profile-container -->
   <div class="profile-container">
    <!-- BEGIN profile-sidebar -->

    <!-- END profile-sidebar -->

    <!-- BEGIN profile-content -->
    <div class="profile-content">

     <div class="profile-content-container">
      <div class="row gx-4">
       <div class="col-xl-8">
        <div class="tab-content p-0">
         <!-- BEGIN tab-pane -->
         <div class="tab-pane fade show active" id="profile-post">
          {{-- profile --}}
          <div class="card mb-3">
           <div class="card-body">
            <!-- post header -->
            <div class="d-flex align-items-center mb-3">
             <a href="#" class="text-decoration-none"><img src="{{ Auth::user()->profile }}" alt="" width="50"
               class="rounded-circle"></a>
             <div class="flex-fill ps-2">
              <div class="fw-bold"><a href="#" class="text-decoration-none">{{ Auth::user()->name }}</a></div>
              <div class="small text-inverse text-opacity-50">
               <script>
               const currentDate = new Date();
               const year = currentDate.getFullYear();
               const month = currentDate.getMonth() +
                1; // Adding 1 because getMonth() returns a zero-based index (0-11)
               const day = currentDate.getDate();

               document.write(`Year: ${year}, Month: ${month}, Day: ${day}`);
               </script>

              </div>
             </div>
            </div>

            <!-- post content -->
            <div class="profile-img-list">
             <div class="profile-img-list-item main">
              <a href="{{ Auth::user()->profile }}" data-lity class="profile-img-list-link">
               <span class="profile-img-content" style="background-image: url('{{ Auth::user()->profile }}')">
               </span>
              </a>
             </div>
            </div>

            <hr class="mb-1">

            <!-- post action -->

            <hr class="mb-3 mt-1">

            <form action="{{ route('admin.profiles.update', Auth::user()->id) }}" method="post"
             enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="d-flex align-items-center">
              <div class="flex-fill ps-2">
               <div class="position-relative d-flex align-items-center">
                <input type="file" name="profile" id="imageInput" class="form-control">
               </div>
              </div>
             </div>
             <div class="d-flex align-items-center mt-1
												">
              <div class="flex-fill ps-2">
               <div class="position-relative d-flex align-items-center">
                <button type="submit" class="btn btn-outline-theme">UpdateProfile</button>
               </div>
              </div>
             </div>
            </form>

           </div>
           <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
           </div>
          </div>

          {{-- profile upload end --}}

         </div>
         <!-- END tab-pane -->

         <!-- BEGIN tab-pane -->

         <!-- END tab-pane -->

         <!-- BEGIN tab-pane -->

         <!-- END tab-pane -->
        </div>
       </div>


       {{-- new col start --}}

       {{-- new col end --}}
       <div class="col-xl-4">
        <div class="desktop-sticky-top d-none d-lg-block">
         <div class="card mb-3">
          <div class="list-group list-group-flush">
           <div class="list-group-item fw-bold px-3 d-flex">
            <span class="flex-fill">Change Password</span>
            <div class="text-inverse text-opacity-50"><i class="fa fa-cog"></i></div>
           </div>
           <div class="list-group-item px-3">
            <div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
            <div class="fw-bold mb-2"># You can change your password here</div>
            <a class="card text-inverse text-decoration-none mb-1">
             <div class="card-body">
              <div class="row no-gutters">
               <div class="col-md-12">
                <form action="{{ route('admin.changePassword', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                  <label for="old_password">Old Password</label>
                  <input type="password" id="old_password" class="form-control" name="old_password"
                   placeholder="add Current PWD">
                  @error('old_password')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                 <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" id="password" class="form-control" name="password" placeholder="Add New PWD">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                 <div class="form-group">
                  <label for="password_confirmation">Confirm New Password</label>
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                   placeholder="Add Confirm PWD">
                 </div>
                 <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">Change Password</button>

                 </div>
                </form>
               </div>

              </div>
             </div>
             <div class="card-arrow">
              <div class="card-arrow-top-left"></div>
              <div class="card-arrow-top-right"></div>
              <div class="card-arrow-bottom-left"></div>
              <div class="card-arrow-bottom-right"></div>
             </div>
            </a>
            {{-- <div><small class="text-inverse text-opacity-50">1.89m share</small></div> --}}
           </div>


           {{-- change phone and address  --}}
           <!-- <div class="list-group-item px-3">
            <div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
            <div class="fw-bold mb-2"># You can change your Phone here</div>
            <a class="card text-inverse text-decoration-none mb-1">
             <div class="card-body">
              <div class="row no-gutters">
               <div class="col-md-12">
                <form action="{{ route('admin.changePhoneAddress', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control" name="phone"
                   placeholder="{{ Auth::user()->phone }}">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                 <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" id="address" class="form-control" name="address"
                   value="{{ Auth::user()->address }}">

                  @error('address')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                 <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">Change Phone</button>
                 </div>
                </form>
               </div>

              </div>
             </div>
             <div class="card-arrow">
              <div class="card-arrow-top-left"></div>
              <div class="card-arrow-top-right"></div>
              <div class="card-arrow-bottom-left"></div>
              <div class="card-arrow-bottom-right"></div>
             </div>
            </a>
            {{-- <div><small class="text-inverse text-opacity-50">1.89m share</small></div> --}}
           </div> -->
           {{-- change phone & address end --}}
           {{-- kpay add start --}}
           <!-- <div class="list-group-item px-3">
            {{-- <div class="text-inverse text-opacity-50"><small><strong></strong></small></div> --}}
            <div class="fw-bold mb-2"># You can change your Kpay No</div>
            <a class="card text-inverse text-decoration-none mb-1">
             <div class="card-body">
              <div class="row no-gutters">
               <div class="col-md-12">
                <form action="{{ route('admin.changeKpayNo', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                  <label for="kpay_no">kpay_no</label>
                  <input type="text" id="kpay_no" class="form-control" name="kpay_no"
                   value="{{ Auth::user()->kpay_no }}">
                  @error('kpay_no')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>

                 <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">Change Kpay No</button>
                 </div>
                </form>
               </div>

              </div>
             </div>
             <div class="card-arrow">
              <div class="card-arrow-top-left"></div>
              <div class="card-arrow-top-right"></div>
              <div class="card-arrow-bottom-left"></div>
              <div class="card-arrow-bottom-right"></div>
             </div>
            </a>
            {{-- <div><small class="text-inverse text-opacity-50">1.89m share</small></div> --}}
           </div> -->
           {{-- kpay add end --}}

           <!-- <a href="#" class="list-group-item list-group-action text-center">
            Show more
           </a> -->
          </div>
          <div class="card-arrow">
           <div class="card-arrow-top-left"></div>
           <div class="card-arrow-top-right"></div>
           <div class="card-arrow-bottom-left"></div>
           <div class="card-arrow-bottom-right"></div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- END profile-content -->
   </div>
   <!-- END profile-container -->
  </div>
  <!-- END profile -->
 </div>
 <div class="card-arrow">
  <div class="card-arrow-top-left"></div>
  <div class="card-arrow-top-right"></div>
  <div class="card-arrow-bottom-left"></div>
  <div class="card-arrow-bottom-right"></div>
 </div>
</div>
@endsection
@section('scripts')
<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('admin_app/assets/plugins/lity/dist/lity.min.js')}}"></script>
<!-- ================== END page-js ================== -->
<script src="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/plugins/select-picker/dist/picker.min.js') }}"></script>
@endsection