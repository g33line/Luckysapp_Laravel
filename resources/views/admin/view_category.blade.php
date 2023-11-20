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
                                <li class="breadcrumb-item active" aria-current="page">All Categories</li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
    

    			

			<!--  Summary -->
				  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Add Category</h5>
									<form action="{{url('/add_category')}}" method="POST">
									          		
					          		@csrf
					          		<input class="input_color" type="text" name="category" placeholder="Type category name" required>
					          		<input type="submit" class="btn btn-primary" name="submit" value="Add">
					          		<!-- <div class="">
										<input class="border-1 " type="file" style="" name="image" required="">
									  </div> -->

					          		</form>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle mb-0 table-hover">
									<thead class="table-light">
										<tr>
											
											<th >Edit</th>
											<th >Delete</th>
										  	<th >Category Name</th>
										  	<th > </th>
										  	<th >Created on</th>
										  	<th> Updated  </th>

											
										</tr>
									</thead>
									<tbody>

										 @foreach($data as $data)

										<tr>
											
											<td>
												<div class="d-flex order-actions">	
													<a href="{{url('edit_category',$data->id)}}" class="text-success"><i class="bx bx-pencil"></i></a>
												</div>
											</td>
											<td>
												<div class="d-flex order-actions">	
													<a href="{{url('delete_category',$data->id)}}" class="text-danger" id="delete"><i class="bx bx-trash" ></i></a>
												</div>
											</td>
											<td> {{$data->category_name}} </td>
											<td>  </td>
                                    		<td> {{$data->created_at}}</td> 
                                    		<td> {{$data->updated_at->diffForHumans()}}</td> 
											
										</tr>

										@endforeach   

									</tbody>
								</table>
							</div>
						</div>
					</div>
				<!-- end  Summary -->




    </div>
</div>              



@endsection