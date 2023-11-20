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
                                <li class="breadcrumb-item active" aria-current="page">Customer</li>
                                <li class="breadcrumb-item active" aria-current="page">Messages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

				  
						<div class="col-12 col-lg-12 col-xl-12 d-flex">
						   <div class="card radius-10 w-100 ">
							   <div class="card-header border-bottom bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-0">Messages</h5>
									</div>
									<div class="font-22 ms-auto">
										<i class="bx bx-dots-horizontal-rounded text-light"></i>
									</div>
								</div>
							</div>
							 <ul class="list-group list-group-flush p-2">

							 	@foreach($custmessages as $message)
								<li class="list-group-item bg-transparent">
								  <div class="d-flex align-items-center">

								  		<div class=" ">
											<a href="{{url('delete_message',$message->id)}}" id="deletemessage" type="button" class="btn btn-sm btn-outline-secondary">Delete </a>

									    </div>

									  <div class="ms-3">
										<h6 class="mb-0"> {{$message->name}}  <span> <small class="fw-light ps-3">{{$message->created_at}} ({{$message->created_at->diffForHumans()}})</small>  </span></h6> 	
										{{$message->email}}
										<p class="mb-0 small-font"> {{$message->message}} </p>
									  </div>
								  
								</div>
								</li>

								@endforeach
							  </ul>
							  <span class="text-dark px-3">
			            </span>
						   </div>
						</div>
					  </div><!--End Row-->

					 <!-- end Total Earnings and Customer Reviews-->
					

			</div>
		</div>


@endsection