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
                                <li class="breadcrumb-item active" aria-current="page">Unavailable Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

            

            <!--  Unavailable Summary -->
                  <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">Unavailable Products</h5>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            
                                            <th >Restore</th>
                                            <th >Remove Item</th>
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

                                        @foreach($unavailable as $products)

                                        <tr>
                                            
                                            <td>
                                                <div class="d-flex order-actions">  
                                                    <a href="{{url('products/restore/'.$products->id)}}" class="text-success"><i class="bx bx-recycle"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex order-actions ">  
                                                    <a href="{{url('products/delete/'.$products->id)}}" id="delete" class="ms-4 text-danger"><i class="bx bx-trash"></i></a>
                                                </div>
                                            </td>
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
                                            <td>{{$products->updated_at->diffForHumans()}}</td> 
                                            
                                        </tr>

                                        @endforeach   

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- end Unavailable Summary -->




    </div>
</div>              



@endsection