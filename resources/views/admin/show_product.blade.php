@extends('admin_dash.admin_home')
@section('admindash')

    
<head>
    <style type="text/css">
    	
    .center{
    	margin: auto;
    	width: 100%;
    	margin-top: 40px;
    }
    .font_size {
    	color: white;
    	text-align: center;
    	font-size: 40px;
    	padding-top: 20px;
    }
    .product_img{
    	width: 90px !important; 
    	height: 90px !important;
    	border-radius: 0 !important;
    }

    </style>

  </head>

   <div class="page-wrapper">
            <div class="page-content">

                  <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">ECommerce</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
            

                  			@if(session()->has('message'))
                            		<div class="alert alert-success">
                            			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"> </button> 
                            			{{session()->get('message')}}
                            		</div>
                            	@endif

                  				    <div class="row ">
                                <div class="">
                                  <div class="card">
                                    <div class="card-body">
                                      <h4 class="card-title text-dark p-0 m-0">All Products</h4>
                                      
                                      <div class="table-responsive">
                                        <table class="table center">
                                          <thead>
                                            <tr>
                                              <th scope="col">Edit</th>
    									    	<th scope="col">Unavailable</th>
    									      	<th scope="col">Image</th>
    									      	<th scope="col">Category</th>
    									      	<th scope="col">Flavor</th>
    									      	<th scope="col">Size</th>
    									      	<th scope="col">Price</th>
    									      	<th scope="col">Discount Price</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          	@foreach($product as $products)

                                          	  <tr>
											    	<td> 
											    		<a href="{{url('update_product',$products->id)}}" class="btn btn-sm btn-info"> Edit </a>
											    	</td>
											    	<td> 
											    		<a href="{{url('/unavailable_items/'.$products->id)}}" class="btn btn-sm btn-danger"> Unavailable </a>
											    	</td>
											    	<td> 
											    		<img class="product_img" src="/product/{{$products->image}}">
											    	</td>
											    	<td> {{$products->category_name}} </td>
											    	<td> {{$products->flavor}} </td>
											    	<td> {{$products->size}} </td>
											    	<td> {{$products->price}} </td>
											    	<td> {{$products->discount_price}} </td>
											 </tr>
                  									         
                                           @endforeach   

                                          </tbody>  
                                        </table>      
                                         
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>

                {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
   </div>
  </div>   
                



@endsection