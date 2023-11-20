<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				
				<div>
					<img src="{{ asset('images/logo.png') }}" style="width: 50px; height: 50px; overflow: hidden;" alt="logo icon">
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li class="menu-label">Navigation</li>
				<li>
					<a href="{{ route('dashboard') }}" class="">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Categories</div>
					</a>
					<ul>
						<li> <a href="{{ route('view_category') }}"><i class="bx bx-right-arrow-alt"></i>All Categories</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
						<li> <a href="{{ route('product_summary') }}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
						<li> <a href="{{url('/new_product')}}"><i class="bx bx-right-arrow-alt"></i>Add New Product</a>
						</li>
						<li> <a href="{{url('/product_unavailable')}}"><i class="bx bx-right-arrow-alt"></i>Unavailable Products</a>
						</li>
					</ul>
				</li>
				 
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Order Summary</div>
					</a>
					<ul>
						<li> <a href="{{url('/order_summary')}}"><i class="bx bx-right-arrow-alt"></i>All Orders</a>
						</li>
						<li> <a href="{{url('/order_pending')}}"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a>
						</li>
						<li> <a href="{{url('/qr_payments')}}"><i class="bx bx-right-arrow-alt"></i>QR payments</a>
						</li>
						<li> <a href="{{url('/orderdelivered')}}"><i class="bx bx-right-arrow-alt"></i>Delivered Orders</a>
						</li>
						<li> <a href="{{url('/cancelled_orders')}}"><i class="bx bx-right-arrow-alt"></i>Cancelled Orders</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-message-square-edit"></i>
						</div>
						<div class="menu-title">Customers</div>
					</a>
					<ul>
						<li> <a href="{{url('/customers_list')}}"><i class="bx bx-right-arrow-alt"></i>Registered Users</a>
						</li>
						<li> <a href="{{url('/customer_reviews')}}"><i class="bx bx-right-arrow-alt"></i>Reviews</a>
						</li>						
						<li> <a href="{{url('/review_comments')}}"><i class="bx bx-right-arrow-alt"></i>Comments</a>
						</li>						
						<li> <a href="{{url('/customer_messages')}}"><i class="bx bx-right-arrow-alt"></i>Messages</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{url('/google_maps')}}" class="">
						<div class="parent-icon"><i class='bx bx-category'></i>
						</div>
						<div class="menu-title">Google Maps</div>
					</a>
				
				
				
			</ul>
			<!--end navigation-->
		</div>