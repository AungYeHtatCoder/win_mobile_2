@extends('layouts.admin_app')
@section('styles')
	<!-- ================== BEGIN page-css ================== -->
	<link href="{{ asset('admin_app/assets/plugins/lity/dist/lity.min.css')}}" rel="stylesheet">
 <link href="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
 	<link href="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
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
							<div class="profile-sidebar">
								<div class="desktop-sticky-top">
									<div class="profile-img">
										<img src="assets/img/user/profile.jpg" alt="">
									</div>
									<!-- profile info -->
         <h4 class="text align-center">User Information </h4>
									<h4>{{ Auth::user()->name }}</h4>
									<div class="mb-3 text-inverse text-opacity-50 fw-bold mt-n2">@ <span>{{ Auth::user()->email }}</span> </div>
								
									<div class="mb-1">
										<i class="fa fa-map-marker-alt fa-fw text-inverse text-opacity-50"></i> {{ Auth::user()->address }}
									</div>
									<div class="mb-3">
										<i class="fa fa-link fa-fw text-inverse text-opacity-50"></i> {{ Auth::user()->phone }}
									</div>
         <div class="mb-3">
										<i class="fa fa-link fa-fw text-inverse text-opacity-50"></i>Kpay No {{ Auth::user()->kpay_no }}
									</div>
         <div class="mb-3">
										<i class="fa fa-link fa-fw text-inverse text-opacity-50"></i> Join Date {{ Auth::user()->join_date }}
									</div>
         <div class="mb-3">
          @if(Auth::user()->salaries->isNotEmpty())
            <h3>Salary History:</h3>
            <ul>
                @foreach(Auth::user()->salaries as $salary)
                    <li>
                        Amount: {{ $salary->amount }}
                        Payment Date: {{ $salary->payment_date }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No salary records available.</p>
        @endif
         </div>
							
									<hr class="mt-4 mb-4">
							
									<!-- people-to-follow -->
									{{-- <div class="fw-bold mb-3 fs-16px">People to follow</div>
									<div class="d-flex align-items-center mb-3">
										<img src="assets/img/user/user-1.jpg" alt="" width="30" class="rounded-circle">
										<div class="flex-fill px-3">
											<div class="fw-bold text-truncate w-100px">Noor Rowe</div>
											<div class="fs-12px text-inverse text-opacity-50">3.1m followers</div>
										</div>
										<a href="#" class="btn btn-sm btn-outline-theme fs-11px">Follow</a>
									</div>
									<div class="d-flex align-items-center mb-3">
										<img src="assets/img/user/user-2.jpg" alt="" width="30" class="rounded-circle">
										<div class="flex-fill px-3">
											<div class="fw-bold text-truncate w-100px">Abbey Parker</div>
											<div class="fs-12px text-inverse text-opacity-50">302k followers</div>
										</div>
										<a href="#" class="btn btn-sm btn-outline-theme fs-11px">Follow</a>
									</div>
									<div class="d-flex align-items-center mb-3">
										<img src="assets/img/user/user-3.jpg" alt="" width="30" class="rounded-circle">
										<div class="flex-fill px-3">
											<div class="fw-bold text-truncate w-100px">Savannah Nicholson</div>
											<div class="fs-12px text-inverse text-opacity-50">720k followers</div>
										</div>
										<a href="#" class="btn btn-sm btn-outline-theme fs-11px">Follow</a>
									</div>
									<div class="d-flex align-items-center mb-3">
										<img src="assets/img/user/user-4.jpg" alt="" width="30" class="rounded-circle">
										<div class="flex-fill px-3">
											<div class="fw-bold text-truncate w-100px">Kenny Bright</div>
											<div class="fs-12px text-inverse text-opacity-50">1.4m followers</div>
										</div>
										<a href="#" class="btn btn-sm btn-outline-theme fs-11px">Follow</a>
									</div>
									<div class="d-flex align-items-center">
										<img src="assets/img/user/user-5.jpg" alt="" width="30" class="rounded-circle">
										<div class="flex-fill px-3">
											<div class="fw-bold text-truncate w-100px">Cara Poole</div>
											<div class="fs-12px text-inverse text-opacity-50">989k followers</div>
										</div>
										<a href="#" class="btn btn-sm btn-outline-theme fs-11px">Follow</a>
									</div> --}}
								</div>
							</div>
							<!-- END profile-sidebar -->
					
							<!-- BEGIN profile-content -->
							<div class="profile-content">
								<ul class="profile-tab nav nav-tabs nav-tabs-v2">
									<li class="nav-item">
										<a href="#profile-post" class="nav-link active" data-bs-toggle="tab">
											<div class="nav-field">UserName</div>
											<div class="nav-value">{{ Auth::user()->name }}</div>
										</a>
									</li>
									<li class="nav-item">
           <a href="#profile-followers" class="nav-link" data-bs-toggle="tab">
               <div class="nav-field">Staff Role</div>
               <div class="nav-value">
                   @if(Auth::user()->roles->isNotEmpty())
                       {{ Auth::user()->roles->first()->title }}
                   @else
                       No Role Assigned
                   @endif
               </div>
           </a>
       </li>

									<li class="nav-item">
										<a href="#profile-media" class="nav-link" data-bs-toggle="tab">
											<div class="nav-field">Salary</div>
											<div class="nav-value">
            250000
           </div>
										</a>
									</li>
									<li class="nav-item">
										<a href="#profile-video" class="nav-link" data-bs-toggle="tab">
											<div class="nav-field">Join Date</div>
											<div class="nav-value">{{ Auth::user()->join_date }}</div>
										</a>
									</li>
									<li class="nav-item">
										<a href="#profile-followers" class="nav-link" data-bs-toggle="tab">
											<div class="nav-field">Kpay No</div>
											<div class="nav-value">{{ Auth::user()->kpay_no }}</div>
										</a>
									</li>
								</ul>
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
																<a href="#" class="text-decoration-none"><img src="{{ Auth::user()->profile }}" alt="" width="50" class="rounded-circle"></a>
																<div class="flex-fill ps-2">
																	<div class="fw-bold"><a href="#" class="text-decoration-none">{{ Auth::user()->name }}</a></div>
																	<div class="small text-inverse text-opacity-50">
                  <script>
                  const currentDate = new Date();
                  const year = currentDate.getFullYear();
                  const month = currentDate.getMonth() + 1; // Adding 1 because getMonth() returns a zero-based index (0-11)
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
															
													<form action="{{ route('admin.profiles.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center">
                <div class="flex-fill ps-2">
                    <div class="position-relative d-flex align-items-center">
                     <input type="file" name="profile" id="imageInput" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
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
												<div class="tab-pane fade" id="profile-followers">
													<div class="list-group">
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-1.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Ethel Wilkes</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">North Raundspic</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-2.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Shanaya Hansen</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">North Raundspic</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-3.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">James Allman</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">North Raundspic</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-4.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Marie Welsh</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Crencheporford</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-5.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Lamar Kirkland</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Prince Ewoodswan</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-6.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Bentley Osborne</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Red Suvern</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-7.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Ollie Goulding</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Doa</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-8.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Hiba Calvert</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Stemunds</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-9.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Rivka Redfern</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Fallnee</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
														<div class="list-group-item d-flex align-items-center">
															<img src="assets/img/user/user-10.jpg" alt="" width="50" class="rounded-sm ms-n2">
															<div class="flex-fill px-3">
																<div><a href="#" class="text-inverse fw-bold text-decoration-none">Roshni Fernandez</a></div>
																<div class="text-inverse text-opacity-50 fs-13px">Mount Lerdo</div>
															</div>
															<a href="#" class="btn btn-outline-theme">Follow</a>
														</div>
													</div>
													<div class="text-center p-3"><a href="#" class="text-inverse text-decoration-none">Show more <b class="caret"></b></a></div>
												</div>
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
															<a href="#" class="text-inverse text-opacity-50"><i class="fa fa-cog"></i></a>
														</div>
														<div class="list-group-item px-3">
															<div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
															<div class="fw-bold mb-2"># You can change your password here</div>
															<a href="#" class="card text-inverse text-decoration-none mb-1">
																<div class="card-body">
																	<div class="row no-gutters">
																		<div class="col-md-8">
																			     <form action="{{ route('admin.changePassword', Auth::user()->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                   <label for="old_password">Old Password</label>
                   <input type="password" id="old_password" class="form-control" name="old_password" placeholder="add Current PWD">
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
                   <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Add Confirm PWD">
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
															<div><small class="text-inverse text-opacity-50">1.89m share</small></div>
														</div>
														
														
													{{-- change phone and address  --}}
              <div class="list-group-item px-3">
															<div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
															<div class="fw-bold mb-2"># You can change your Phone & Address here</div>
															<a href="#" class="card text-inverse text-decoration-none mb-1">
																<div class="card-body">
																	<div class="row no-gutters">
																		<div class="col-md-8">
																		<form action="{{ route('admin.changePhoneAddress', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                 <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" id="address" class="form-control" name="address" value="{{ Auth::user()->address }}">

                  @error('address')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                 </div>
                <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">Change Phone & Address</button>
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
															<div><small class="text-inverse text-opacity-50">1.89m share</small></div>
														</div>
             {{-- change phone & address end --}}
             {{-- kpay add start --}}
               <div class="list-group-item px-3">
															<div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
															<div class="fw-bold mb-2"># You can change your Phone & Address here</div>
															<a href="#" class="card text-inverse text-decoration-none mb-1">
																<div class="card-body">
																	<div class="row no-gutters">
																		<div class="col-md-8">
																		<form action="{{ route('admin.changeKpayNo', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
                  <label for="kpay_no">kpay_no</label>
                  <input type="text" id="kpay_no" class="form-control" name="kpay_no" value="{{ Auth::user()->kpay_no }}">
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
															<div><small class="text-inverse text-opacity-50">1.89m share</small></div>
														</div>
             {{-- kpay add end --}}
             {{-- add join date start --}}
               <div class="list-group-item px-4">
															<div class="text-inverse text-opacity-50"><small><strong></strong></small></div>
															<div class="fw-bold mb-2"># You can change your Kpay No here</div>
															<a class="card text-inverse text-decoration-none mb-1">
																<div class="card-body">
																	<div class="row no-gutters">
																		<div class="col-md-8">
																		<form action="{{ route('admin.addJoinDate', Auth::user()->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-group">
															<label class="form-label">Join Date <span class="text-danger">*</span></label>
															{{-- <div class="input-group"> --}}
																<input type="text" name="join_date" class="form-control" id="datepicker-component" placeholder="10/12/2023(d/m/y)">
																{{-- <label class="input-group-text" for="datepicker-component"><i class="fa fa-calendar"></i></label> --}}
															{{-- </div> --}}
														</div>
                 
                <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">AddJoinDate</button>
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
															<div><small class="text-inverse text-opacity-50">1.89m share</small></div>
														</div>
             {{-- add join date end --}}
														<a href="#" class="list-group-item list-group-action text-center">
															Show more
														</a>
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