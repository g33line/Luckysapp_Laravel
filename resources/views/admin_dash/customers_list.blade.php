@extends('admin_dash.admin_home')
@section('admindash')


<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                <li class="breadcrumb-item active" aria-current="page">Registered Users</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Search Users -->
					<div class=" pe-3 ms-auto">

						<form action="{{url('user_search')}}" method="get">
						@csrf
							<input type="text" name="search" placeholder="Find user...">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
							</svg> </span>
							<input type="submit" class="btn px-0 " value="Search"><span> 

						</form>
					</div>
					<!-- end Search Orders -->

                </div>
                <!--end breadcrumb-->

             
    

			<!--  Summary -->
				  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Contacts List </h5>
								</div>
								<div class="font-22 ms-auto text-white">
									<i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive me-2">
								<table class="table align-middle  table-hover">
									<thead class="table-light">
										<tr>
											
											<th >User Type</th>
										  	<th >Image</th>
										  	<th >Name</th>
										  	<th >Email</th>
										  	<th >Phone</th>
										  	<th >Adress</th>
										  	<th >Registered on</th>
										  	<th >Total Orders</th>

											
										</tr>
									</thead>
									<tbody>

										@forelse($user as $user)

										<tr>
											
											<td>
												<div class="d-flex order-actions">	
													@if($user->usertype=='1')
														<span class="fw-bold">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
														  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
														</svg>
														Admin </span>
													@else
														<button type="submit" class="btn btn-sm btn-outline-secondary">  Set as Admin  </button>
													@endif
												</div>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img border-0" >
														<img src="{{ (!empty($user->profile_photo_path))?url('upload/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="" style="width: 60px; height: 60px;" class="user-img">

													</div>
												</div>
											</td>
											<td> {{$user->name}}  </td>
											<td> {{$user->email}}  </td>
											<td> {{$user->phone}}  </td>
											<td> {{$user->address}}  </td>
											<td> {{$user->created_at}} </td>
											<td>  </td> 
											
										</tr>

										@empty 

											<tr>
												<td colspan="18" class="text-center pt-3">
													<h5 class="text-secondary"> User not found. </h5>
												</td>
											</tr>

										@endforelse  

									</tbody>
								</table>
							</div>
						</div>
					</div>
				<!-- end  Summary -->






    </div>
</div>              



@endsection