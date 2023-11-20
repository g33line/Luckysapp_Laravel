@extends('admin_dash.admin_home')
@section('admindash')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                	<a href="{{url('/order_summary')}}">Order Summary </a> </li>
                                 <li class="breadcrumb-item active" aria-current="page"> QR Payments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->


               


					<div class="card">
					  <div class="card-body p-4">
					       <div class="form-body ">
					       	<div class="d-block d-lg-flex align-items-center mb-3">
									
										<h5 class="mb-0">Pending QRs : {{$pendingQRs}} </h5>
									
								</div>
						    <div class="row">
							   <div class="col-lg-12">

						           <div class="border border-3 p-4 rounded">
									<div class="mb-9">
										
										<!--  Summary -->
				  
												<div class="table-responsive">
													<table class="table table-hover">
														<thead class="table-light">
															<tr>
																
															  	<th >Uploaded QRs</th>
															  	<th ></th>
															  	<th> Name </th>
															  	<th> Product Name </th>
															  	<th> Quantity </th>
															  	<th> Amount </th>
															  	
																
															</tr>
														</thead>
														<tbody>

															@foreach($qrpayments as $qrpayment)
															@if($qrpayment->payment_status=='Awaiting QR Confirmation')
															
															<tr>
																
																<td> {{$qrpayment->created_at->diffForHumans()}} </td>
																<td>
																		<a href="{{url('/qr_details',$qrpayment->id)}}" class="btn btn-sm btn-outline-danger">
																		<div class="d-flex align-items-center">
																			<div class="recent-product-img border-0" >
																				<img src="{{url('QR_reference/'.$qrpayment->QR_reference)}}" alt="" style="width: 60px; height: 60px;" >
																			</div>
																		</div>
																	
																	</a>
																	
																</td> 
																<td> {{$qrpayment->name}} </td>
																<td> {{$qrpayment->product_name}} </td>
																<td> {{$qrpayment->order_quantity}} </td>
																<td> {{$qrpayment->price}} </td>
															
																
															</tr>


															@endif

															
									                        	
															@endforeach
															

														</tbody>
													</table>
												</div>
									<!-- end  Summary -->

									  </div>
									 
						            </div>

							   </div>


					   </div><!--end row-->
					</div>
				  </div>

				

			 
			</div>
		</div>





<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});	
</script>







@endsection