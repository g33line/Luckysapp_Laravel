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
                                
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/order_summary')}}">Order Summary </a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pending Orders</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Search Orders -->
					<div class=" pe-3 ms-auto">

						<form action="{{url('order_search')}}" method="get">
						@csrf
							<input type="text" name="search" placeholder="Search order...">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
							</svg> </span>
							<input type="submit" class="btn px-0 " value="Search"><span> 

						</form>
					</div>
					<!-- end Search Orders -->
					
                </div>
                <!--end breadcrumb-->
 


				<!-- Order Summary -->

				  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">For Processing : {{$pending}} </h5>

								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle table-hover">
									<thead class="table-light">
										<tr>
											<th >Action</th>
											<th> Status</th>
										  	<th >Updated</th>
											<th>Payment</th>
											<th >Orders </th>
										  	<th ></th>
										  	<th >Product name</th>
										  	<th >Size</th>
										  	<th >Price</th>
										  	<th >Discount</th>
										  	<th >Received on</th>
										  	<th >From</th>
										  	<th >Address</th>
										  	<th >Delivery Mode</th>
										  	<th >Delivery Date</th>
										  	<th >Time</th>
										  	<th >Phone</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

										@foreach($order as $order)
										@if($order->order_status === 'Processing' || $order->order_status === 'Order is Ready')
										<tr>

											<td>
												<div class="d-flex order-actions">	

													@if($order->order_status=='Processing')
													<a href="{{url('order_ready',$order->id)}}" class="" style="color: #00b3b3" name="deliver_button"><i class="bx bx-arrow-to-right"></i></a>
													
													<a href="{{url('cancelOrder',$order->id)}}" id="cancel" class="ms-4 text-danger" name="remove"><i class="bx bx-x"></i></a>

													@elseif($order->order_status=='Order is Ready')
														<a  style="cursor:auto"><i class="bx bx-time"></i></a>

														<a  class="ms-4 text-muted"><i class="bx bx-printer" name="print"></i></a>
													@endif
												</div>
											</td>
											<td>
												@if($order->order_status=='Order is Ready')

													<a href="{{url('ordercomplete',$order->id)}}" class="btn btn-sm btn-outline-info"> <span> {{$order->order_status}} </span> </a>

												@else
													{{$order->order_status}}
												@endif
											</td>
                                    		<td>{{$order->updated_at->diffForHumans()}}</td> 
											<td>
												@if($order->payment_status=='COD')

													<span class="text-danger"> {{$order->payment_status}} </span>

												@elseif($order->payment_status=='Awaiting QR Confirmation')

													<a href="{{url('verify_QRref',$order->id)}}" class="btn btn-sm btn-outline-danger"> <span> Verify QR_Ref </span> </a>

												@else

													<span class="text-success">{{$order->payment_status}} </span>

												@endif

											</td>
											<td class="text-center" style="font-size:16px;"> <b>{{$order->order_quantity}} </b> </td>
											<td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img border-0" >
														<img src="{{url('product/'.$order->image)}}" alt="" style="width: 60px; height: 60px;" >
													</div>
												</div>
											</td>
											<td> {{$order->product_name}} </td>
											<td> {{$order->product_size}} </td>
											<td>P {{$order->price}} </td>
											<td>( {{$order->discount_price}} )</td>
                                    		<td>{{$order->created_at}}</td> 
											<td> {{$order->name}} </td>
											<td> {{$order->address}} </td>
											<td> {{$order->delivery_mode}} </td>
											<td> {{$order->delivery_date}} </td>
											<td> {{$order->delivery_time}}  </td>
											<td> {{$order->phone}} </td>
											<td></td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<!-- end Order Summary -->

</div>
</div>

@endsection