@extends('admin_dash.admin_home')
@section('admindash')

<style type="text/css">
	
	.form-label {
		padding-top: 10px;
	}
</style>

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
                                 <li class="breadcrumb-item active" aria-current="page"> 
                                 	<a href="{{url('/qr_payments')}}"> QR Payments </a></li>
                                 <li class="breadcrumb-item active" aria-current="page"> QR Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->


               


					<div class="card">
					  <div class="card-body p-4">
					       <div class="form-body ">
						    <div class="row">
							   <div class="col-lg-4">

						           <div class="border border-3 p-4 rounded">
									<div class="mb-9">
										
										<a href="{{url('/verify_QRref',$qrdetails->id)}}" class="btn btn-sm btn-block btn-outline-danger"> Confirm Payment </a>

										<div class="col-12">
			                            <label for="inputPrice" class="form-label">Product Name</label>
			                            <input class="form-control" type="text" name="flavor" placeholder="Enter flavor"  value="{{$qrdetails->product_name}}" readonly>
			                            </div>
			                            <div class="col-12">
			                            <label for="inputPrice" class="form-label">Product Size / Quantity</label>
			                            <input class="form-control" type="text" name="size" placeholder="ex. 8 inches round"  value="{{$qrdetails->product_size}}" readonly>
			                            </div>
			                           
			                            <div class="col-md-6">
			                            <label for="inputPrice" class="form-label">Price</label>
			                            <input type="number" class="form-control" name="price" placeholder="0.00" value="{{$qrdetails->price}}" readonly>
			                            </div>

			                            <div class="col-md-6">
			                            <label for="inputCompareatprice" class="form-label">Customer</label>
			                            <input type="text" class="form-control" name="discount_price"   value="{{$qrdetails->name}}" readonly>
			                            </div>


									  </div>
									 
						            </div>

							   </div>


							   <div class="col-lg-8">
								<div class="border border-3 rounded">
					              <div class="row g-3">
									

				                              <div class="label_design text-center ">
				                                <img style="margin:auto" height="auto" width="400px" src="{{url('QR_reference/'.$qrdetails->QR_reference)}}" />
				                              </div>
				               

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