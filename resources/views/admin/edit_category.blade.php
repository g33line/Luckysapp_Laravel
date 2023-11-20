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
                                <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('view_category') }}">All Categories </a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                  <h5 class="mb-0">Edit Category</h5>
                  
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
                      <th >Action</th>
                        <th >Category Name</th>
                        <th >Created on</th>
                        <th> </th>

                      
                    </tr>
                  </thead>
                  <tbody>

                      <form action="{{url('/modify_category',$data->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf

                    <tr>
                      
                      <td>
                        <div class="d-flex order-actions">  
                          <a href="#" class="text-success" style="cursor: auto;"><i class="bx bx-pencil"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex order-actions">  
                         <input type="submit" class="btn btn-light text-success border-1" name="submit" value="Modify">
                        </div>
                      </td>
                      <td> 
                        <input class="input_color" type="text" name="category" placeholder="Type category name" value="{{$data->category_name}}">
                      </td>
                      <td> {{$data->created_at}}</td> 
                      <td> {{$data->created_at->diffForHumans()}}</td> 
    
                    </tr>

                      </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- end  Summary -->




    </div>
</div>              



@endsection