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
                                	<a href="{{ route('product_summary') }}">All Products </a> </li>
                                 <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->


               

	          		<form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
					@csrf


					<div class="card">
					  <div class="card-body p-4">
						  <h5 class="card-title">Add New Product</h5>
						  <hr>
					       <div class="form-body mt-4">
						    <div class="row">
							   <div class="col-lg-8">

						           <div class="border border-3 p-4 rounded">
									<div class="mb-9">
										
										<!--  Summary -->
				  
												<div class="table-responsive">
													<table class="table table-hover">
														<thead class="table-light">
															<tr>
																
															  	<th >Image</th>
																<th >Item # </th>
															  	<th >Category</th>
															  	<th >Flavor</th>
															  	<th >Size</th>
															  	<th >Price</th>
															  	<th >Discount</th>
															  	<th >Added</th>

																
															</tr>
														</thead>
														<tbody>

															
															@foreach($product as $products)

															<tr>
																
															
																<td>
																	<div class="d-flex align-items-center">
																		<div class="recent-product-img border-0" >
																			<img src="{{url('product/'.$products->image)}}" alt="" style="width: 60px; height: 60px;" >
																		</div>
																	</div>
																</td>
																<td> {{$products->id}} </td>
																<td> {{$products->category_name}} </td>
																<td> {{$products->flavor}} </td>
																<td> {{$products->size}} </td>
																<td>P {{$products->price}} </td>
																<td>( {{$products->discount_price}} )</td>
					                                    		<td>{{$products->created_at->diffForHumans()}}</td> 
																
															</tr>

															@endforeach   

														</tbody>
													</table>
												</div>
									<!-- end  Summary -->

									  </div>
									 
						            </div>

							   </div>


							   <div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
					              <div class="row g-3">
									
									
									  <div class="col-12">
										<label for="inputProductType" class="form-label">Product Type</label>
										<select class="form-select" name="product_category" placeholder="Enter Category"style="color: black;" required="">
											<option value="" selected=""  class=""> Select Category </option>

						          			@foreach($ProductCategory as $category)
						          				<option value="{{$category->category_name}}"> {{$category->category_name}} </option>
						          			@endforeach
										  </select>
									  </div>

									  <div class="col-12">
										<label for="inputPrice" class="form-label">Product Name</label>
										<input class="form-control" type="text" name="flavor" placeholder="Enter flavor" required="">
									  </div>
									  <div class="col-12">
										<label for="inputPrice" class="form-label">Product Size / Quantity</label>
										<input class="form-control" type="text" name="size" placeholder="ex. 8 inches round" required="">
									  </div>
									 
									  <div class="col-md-6">
										<label for="inputPrice" class="form-label">Price</label>
										<input type="number" class="form-control" name="price" placeholder="0.00" required="">
									  </div>

									  <div class="col-md-6">
										<label for="inputCompareatprice" class="form-label">Discount Price</label>
										<input type="number" class="form-control" name="discount_price" placeholder="0.00" >
									  </div>
									   <div class="col-12">
											<label for="inputPrice" class="form-label">Upload Image</label>
								          		<input class="border-1 " type="file" style="" name="image" required="">
									  </div>
									  <div class="col-12 pt-3">
										  <div class="d-grid">
										  		<input type="submit" value="Submit" class="btn btn-primary" style="width:100px" required=""> </div>
										  </div>
									  </div>
								  </div> 
							  </div>
							  </div>
					   </div><!--end row-->
					</div>
				  </div>

				</form>

			 
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