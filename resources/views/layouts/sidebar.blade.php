		<div id="sidebar" class="app-sidebar">
		 <!-- BEGIN scrollbar -->
		 <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
		  <!-- BEGIN menu -->
		  <div class="menu">
		   <div class="menu-header">Navigation</div>
		   <div class="menu-item active">
		    <a href="{{ url('/home') }}" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-cpu"></i></span>
		     <span class="menu-text">Dashboard</span>
		    </a>
		   </div>
					@can('storage_access')
		   <div class="menu-item">
		    <a href="analytics.html" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
		     <span class="menu-text">Analytics</span>
		    </a>
		   </div>
					@endcan
		   <div class="menu-item has-sub">
						@can('complete_order_management_access')
		    <a href="#" class="menu-link">
		     <span class="menu-icon">
		      <i class="bi bi-envelope"></i>
		     </span>
		     <span class="menu-text">Orders</span>
		     <span class="menu-caret"><b class="caret"></b></span>
		    </a>
						@endcan
		    <div class="menu-submenu">
		     <div class="menu-item">
								@can('pending_order_access')
		      <a href="{{ url('/admin/orders/pending/') }}" class="menu-link">
		       <span class="menu-text">Pending Orders</span>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('delivering_order_access')
		      <a href="{{ url('/admin/orders/delivering/') }}" class="menu-link">
		       <span class="menu-text">Delivering Orders</span>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('complete_order_access')
		      <a href="{{ url('/admin/orders/completed/') }}" class="menu-link">
		       <span class="menu-text">Completed Orders</span>
		      </a>
								@endcan
		     </div>
		    </div>
		   </div>
		   <div class="menu-header">Authentications</div>
		   <div class="menu-item has-sub">
						@can('user_management_access')
		    <a href="javascript:;" class="menu-link">
		     <div class="menu-icon">
		      <i class="bi bi-bag-check"></i>
		      <span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span>
		     </div>
		     <div class="menu-text d-flex align-items-center">UserManagement</div>
		     <span class="menu-caret"><b class="caret"></b></span>
		    </a>
						@endcan
		    <div class="menu-submenu">
		     <div class="menu-item">
								@can('permission_access')
		      <a href="{{ route('admin.permissions.index') }}" class="menu-link">
		       <div class="menu-text">Permission</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('role_access')
		      <a href="{{ route('admin.roles.index') }}" class="menu-link">
		       <div class="menu-text">Role</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('user_access')
		      <a href="{{ route('admin.users.index') }}" class="menu-link">
		       <div class="menu-text">Users</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
		      <a href="pos_table_booking.html" class="menu-link">
		       {{-- <div class="menu-text">Table Booking</div> --}}
		      </a>
		     </div>
		     <div class="menu-item">
		      <a href="pos_menu_stock.html" class="menu-link">
		       {{-- <div class="menu-text">Menu Stock</div> --}}
		      </a>
		     </div>
		    </div>
		   </div>

		   {{-- User Interface --}}
		   <div class="menu-header">User Interface</div>
		   <div class="menu-item has-sub">
						@can('banner_management_access')
		    <a href="javascript:;" class="menu-link">
		     <div class="menu-icon">
		      <i class="bi bi-layout-sidebar"></i>
		     </div>
		     <div class="menu-text d-flex align-items-center">Home Page</div>
		     <span class="menu-caret"><b class="caret"></b></span>
		    </a>
						@endcan
		    <div class="menu-submenu">
		     <div class="menu-item">
								@can('banner_access')
		      <a href="{{ route('admin.banners.index') }}" class="menu-link">
		       <div class="menu-text">Home Banners</div>
		      </a>
								@endcan
		     </div>
		    </div>
		   </div>
		   {{-- User Interface --}}

		   {{-- Product Management --}}
					@can('product_management_access')
		   <div class="menu-header">Product Management</div>
		   <div class="menu-item has-sub">
		    <a href="javascript:;" class="menu-link">
		     <div class="menu-icon">
		      <i class="bi bi-grid-3x3"></i>
		      {{-- <span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span> --}}
		     </div>
		     <div class="menu-text d-flex align-items-center">Product Data</div>
		     <span class="menu-caret">
		      <b class="caret"></b>
		     </span>
		    </a>
						@endcan
		    <div class="menu-submenu">
		     <div class="menu-item">
								@can('product_access')
		      <a href="{{ route('admin.products.index') }}" class="menu-link">
		       <div class="menu-text">Products</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('product_access')
		      <a href="{{ route('admin.product_prices.index') }}" class="menu-link">
		       <div class="menu-text">Product Stocks</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('accessory_access')
		      <a href="{{ route('admin.accessories.index') }}" class="menu-link">
		       <div class="menu-text">Accessories</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('accessory_category_access')
		      <a href="{{ route('admin.accessory_categories.index') }}" class="menu-link">
		       <div class="menu-text">Accessory Categories</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('category_access')
		      <a href="{{ route('admin.categories.index') }}" class="menu-link">
		       <div class="menu-text">Categories</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('brand_access')
		      <a href="{{ route('admin.brands.index') }}" class="menu-link">
		       <div class="menu-text">Brands</div>
		      </a>
								@endcan
		     </div>

		     <div class="menu-item">
								@can('color_access')
		      <a href="{{ route('admin.colors.index') }}" class="menu-link">
		       <div class="menu-text">Color</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('storage_access')
		      <a href="{{ route('admin.storages.index') }}" class="menu-link">
		       <div class="menu-text">Storage</div>
		      </a>
								@endcan
		     </div>
		     <div class="menu-item">
								@can('ram_access')
		      <a href="{{ route('admin.rams.index') }}" class="menu-link">
		       <div class="menu-text">RAM</div>
		      </a>
								@endcan
		     </div>
		    </div>
		   </div>
		  </div>
		  {{-- Product Management --}}

		  <div class="menu">
		   <div class="menu-divider"></div>
		   <div class="menu-header">Users</div>
		   <div class="menu-item">
		    @if(Auth::user()->id === 1)
		    <a href="{{ route('admin.profiles.index') }}" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-people"></i></span>
		     <span class="menu-text">AdminProfile</span>
		    </a>
		    @else
		    <a href="{{ route('admin.profiles.index') }}" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-people"></i></span>
		     <span class="menu-text">UserProfile</span>
		    </a>
		    @endif
		   </div>
		   <div class="menu-item">
		    <a href="calendar.html" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-calendar4"></i></span>
		     <span class="menu-text">Calendar</span>
		    </a>
		   </div>
					@can('storage_access')
		   <div class="menu-item">
		    <a href="settings.html" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-gear"></i></span>
		     <span class="menu-text">Settings</span>
		    </a>
		   </div>
		   <div class="menu-item">
		    <a href="helper.html" class="menu-link">
		     <span class="menu-icon"><i class="bi bi-gem"></i></span>
		     <span class="menu-text">Helper</span>
		    </a>
		   </div>
		  </div>
		  <!-- END menu -->
		  <div class="p-3 px-4 mt-auto">
		   <a href="../../documentation/index.html" class="btn d-block btn-outline-theme">
		    <i class="fa fa-code-branch me-2 ms-n2 opacity-5"></i> Documentation
		   </a>
		  </div>
				@endcan
		 </div>
		 <!-- END scrollbar -->
		</div>