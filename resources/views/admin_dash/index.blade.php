@extends('admin_dash.admin_home')
@section('admindash')



<div class="page-wrapper">
			<div class="page-content">


 
			    <!-- Revenue Summary     -->
	            <div class="row">
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                	<a href="{{url('/order_summary')}}" >
	                  <div class="card-body">
	                    <h5>Received Orders</h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                        	
		                          <h2 class="mb-0"> {{$total_orders}}</h2> 
		                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
	                      </div>
	                    </div>
	                  </div> </a>
	                </div>
	              </div>
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                	<a href="{{url('/orderdelivered')}}">
	                  <div class="card-body">
	                    <h5 class="text-success">Total Delivered </h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                          <h2 class="mb-0">{{$total_delivered}}</h2>
	                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
	                      </div>
	                    </div>
	                  </div> </a>
	                </div>
	              </div>
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                	<a href="{{url('/order_pending')}}">
	                  <div class="card-body ">
	                    <h5 class="text-danger">Pending Orders </h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                          <h2 class="mb-0">{{$total_pending}}</h2>
	                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
	                      </div>
	                    </div>
	                  </div> </a>
	                </div>
	              </div>
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                	<a href="{{url('/cancelled_orders')}}">
	                  <div class="card-body">
	                    <h5> Cancelled Orders</h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                          <h2 class="mb-0">{{$total_cancelled}}</h2>
	                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
	                      </div>
	                    </div>
	                  </div> </a>	
	                </div>
	              </div>
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                  <div class="card-body">
	                    <h5 class="text-success">Paid Orders </h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                          <h2 class="mb-0"> P {{ number_format($sum_delivered, 2, '.', ',') }}</h2>
	                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <div class="col-sm-4 grid-margin">
	                <div class="card">
	                  <div class="card-body">
	                    <h5 class="text-danger">Receivables </h5>
	                    <div class="row">
	                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
	                        <div class="d-flex d-sm-block d-md-flex align-items-center">
	                          <h2 class="mb-0">P {{ number_format($sum_receivables, 2, '.', ',') }}</h2>
	                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> -->
	                        </div>
	                        <!-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> -->
	                      </div>
	                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
	                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>

	            </div>
	            <!-- end Revenue Summary     -->
			   


				<!-- Total Earnings and Customer Reviews-->
					 <div class="row">
						<div class="col-12 col-lg-6 col-xl-4 d-flex">
						  <div class="card radius-10  w-100">
							 <div class="card-body">
								   <p>Total Sales</p>
								   <h4 class="mb-0"> P {{ number_format($total_sales, 2, '.', ',') }}</h4>
								   <!-- <small>1.4% <i class="zmdi zmdi-long-arrow-up"></i> Since Last Month</small> -->
								   <hr>
							   
							   <div class="mt-4">
								   	<div>
										<h6 class="">Sales by Category</h6>
									</div>
							   		<div class=" table-responsive ">
								 
									   	<table class="table align-items-center table-hover  py-0">
										  <tbody>

										  	
											<tr>
											  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i>Cake </td>
											  <td>{{ number_format($sumcategoryCake, 2, '.', ',') }}</td>
											  <td>{{$categoryCake}}</td>
											</tr>

											<tr>
											  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i>Cupcake</td>
											  <td>{{ number_format($sumcategoryCupcake, 2, '.', ',') }}</td>
											  <td>{{$categoryCupcake}}</td>
											</tr>
											<tr>
											  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i>Cheesecake</td>
											  <td>{{ number_format($sumcategoryCheesecake, 2, '.', ',') }}</td>
											  <td>{{$categoryCheesecake}}</td>
											</tr>
											<tr>
											  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i>Bread</td>
											  <td>{{ number_format($sumcategoryBread, 2, '.', ',') }}</td>
											  <td>{{$categoryBread}}</td>
											</tr>
											<tr>
											  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i>Cookies</td>
											  <td>{{ number_format($sumcategoryCookies, 2, '.', ',') }}</td>
											  <td>{{$categoryCookies}}</td>
											</tr>
											
										  </tbody>
										</table>

									</div>
									<hr>
									<div class=" ">
										<h4 class="mb-0"> {{$total_users }}</h4>
										<p>Registered Customers</p>
										<hr>
										  <div class="row ">
										    <div class="col ">
										      	<h4 class="mb-0"> {{$totalreviews }}</h4>
												<p>Total Reviews</p>
										    </div>
										    
										    <div class="col ">
										      	<h4 class="mb-0"> {{$totalmessages }}</h4>
												<p>Messages</p>
										    </div>
										  </div>
									</div>
								 
								   
							  </div>
							 </div>
						  </div>
						</div>
				  
						<div class="col-12 col-lg-6 col-xl-8 d-flex">
						   <div class="card radius-10 w-100">
							   <div class="card-header border-bottom bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Customer Reviews</h6>
									</div>
									<div class="font-22 ms-auto">
										<!-- <i class="bx bx-dots-horizontal-rounded"></i> -->
									</div>
								</div>
							</div>
							 <ul class="list-group list-group-flush">

							 	@foreach($custreviews as $review)
								<li class="list-group-item bg-transparent">
								  <div class="d-flex align-items-center">
								  <div class="ms-1">
									<h6 class="mb-0"> {{$review->name}} </h6>
									<small class="">{{$review->created_at}} ({{$review->created_at->diffForHumans()}})</small>
									<p class="mb-0 small-font"> {{$review->review}} </p>
								  </div>
								</div>
								</li>

								@endforeach
							  </ul>
							  <span class="text-dark px-3">
			                  {!!$custreviews->withQueryString()->links('pagination::bootstrap-5')!!}
			            </span>
						   </div>
						</div>
					  </div><!--End Row-->

					 <!-- end Total Earnings and Customer Reviews-->
					

			</div>
		</div>


@endsection