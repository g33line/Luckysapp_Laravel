<!DOCTYPE html>
<html> 
   <head>
      <!-- Basic -->

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/logo.png" type="">
      <title>MENU</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  
      <style> 

 
.menu_section .heading_container {
  margin-bottom: 20px;
}


.menu_section .options {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.menu_section .options a {
  display: inline-block;
  padding: 15px 15px;
  border-radius: 30px;
  width: 100%;
  text-align: center;
  -webkit-transition: all .3s;
  transition: all .3s;
  
}

.menu_section .options .option1 {
  background-color: #00b3b3;
  border: 1px solid #00b3b3;
  color: #ffffff;
  width: 100%;
  padding:auto;

}

@media screen and (min-width: 768px){
    .menu_section .options .option1{
        width: 100%;
        padding-left:10px;
        }

.menu_section .options .option1:hover {
  background-color: transparent;
  color: #00b3b3;
  cursor: auto;
}


.list {
    /*display: grid;
    grid-template-columns: repeat(4,1fr);*/
    column-gap: 20px;
    row-gap: 20px;
    padding-top: 20px;
    justify-content: center;
}

.menubtn{
    font-size: large;
    font-weight: bold;
}
.menubtn:hover{
    color: #00b3b3;
    border-bottom: 1px solid #00b3b3;
}



.category_tabs {
   position: fixed;
   top: 0;
   left: 0;
   width:85.5%; /* Adjust width as needed */
   background-color: white;
   padding-top: 150px;
   padding-left: 10px;
}


.category-menu {
  display: flex;
   justify-content: space-around; /* Adjust as needed */
   list-style: none;
   padding: 0;
}

.category-menu li {
   margin: 0;
   padding: 10px;
}

.category-menu a {
   color: black;
   text-decoration: none;
}


/*right sidebar*/
.item-sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: 250px; /* Adjust this width based on your needs */
    background-color: transparent; /* Background color of the sidebar */
    color: black; /* Text color */
    padding-top: 120px;
    padding-right: 15px;
    align-items: baseline;
}


/*end right sidebar*/


.section-padding-top{
  padding-top: 70px;
  padding-bottom: 0px;
}

      </style>


   </head>
   <body>
       <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


 <br><br><br><br><br>
   

<!-- product section -->

<section class="menu_section layout_padding">
   <div class="container" >




<!-- BASKET SUMMARY -->

 <div class="item-sidebar text-center my-5 d-none d-md-block">
      <a href="{{url('/orderonline')}}" class="text-danger " id="cartMenuButton">
      <h5> 
      @if($order_quantity>0)
        
              <a href="{{url('/orderonline')}}" class="text-danger " id="cartMenuButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                  <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg> <br> </a>
       
    @else
        
              <a href="{{url('/orderonline')}}" class="text-secondary " id="cartMenuButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                  <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg> <br> </a>
        
      @endif
      <span> {{$order_quantity}} </span> 
        @if($order_quantity>1)
                Items
            @else 
                Item
            @endif 
                  </h5>
      @if($order_quantity>0)
          <h5 class=""> <small> {{ number_format($price, 2, '.', ',') }} </small></h5>
      @else

      @endif
    </a>

</div>

<!-- END BASKET SUMMARY -->

<!-- right SIDEBAR-->



<br><br>
<section class="section-padding-top">
        <div class="heading_container heading_center " id="allproducts" >
           <h2>
                  All <span>Products</span> 
               </h2>
        </div>


        
          <!-- SEARCH product -->

            <div>
              <form action="{{url('menu_search')}}" method="GET" class="text-center">
                @csrf
                <div class="container text-center">
                    <div class="row justify-content-md-center">
                      <div class="col col-lg-2">
                        
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="search" placeholder="I am looking for..." style="width:100%" class="text-center">
                      </div>
                      <div class="col col-lg-2">
                        
                      </div>
                    </div>
                  
                  <input type="submit" name="" value="Search">


              </form>
            </div>
            <br><br>

              <!--end SEARCH product -->


            <div class="d-lg-none d-sm-block text-center">
                    <br> 
                    <h5 class="">  

                      @if($order_quantity>0)
                          <div class="d-lg-none d-sm-block text-center">
                              <br>
                                <a href="{{url('/orderonline')}}" class="text-danger " id="cartMenuButton">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                  </svg> <br> </a>
                          </div>
                      @else
                          <div class="d-lg-none d-sm-block text-center">
                              <br>
                                <a href="{{url('/orderonline')}}" class="text-secondary " id="cartMenuButton">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                  </svg> <br> </a>
                          </div>
                      @endif
                      <span> {{$order_quantity}} </span> 
                    @if($order_quantity>1)
                        Items
                    @else 
                        Item
                    @endif </h5>
                  </a>
            </div>
            <br>

            <div class="row list">

              @forelse($product as $products)
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                              <h5 class="card-title font-semibold">{{ $products->flavor }}</h5>


                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}} </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required="" />
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  
              @empty 

                  <div class="mx-auto">
                     <h4 class="text-secondary">  Not available.</h4>
                     <br><br>
                  </div>

               @endforelse

            </div>
</section>




<br><br><hr>

<!-- CAKE SECTION -->

<section class="section-padding-top d-none d-lg-block">
        <div class="heading_container heading_center " id="cakesection" >
           <h2>
            <span>Cakes</span> 
           </h2>
        </div>

            <div class="row list">
              @php $cakeAvailable = false; @endphp
              @foreach($product as $products)
                  @if($products->category_name === 'Cake')
                  @php $cakeAvailable = true; @endphp 
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                             <h5 class="card-title font-semibold">{{ $products->flavor }}</h5>


                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}} </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required="" />
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  @endif
              @endforeach
              @if(!$cakeAvailable)
                  <div class="col text-center">
                      <p class="text-danger">No Cakes available at the moment.</p>
                  </div>
              @endif

            </div>
            <br><br>
</section>
            
<!-- end CAKE SECTION -->

<!-- CUPCAKE SECTION -->

<section class="section-padding-top  d-none d-lg-block">
        <div class="heading_container heading_center " id="cupcakesection">
           <h2>
            <span>Cupcakes</span> 
           </h2>
         </div>

           <div class="row list">
            @php $cupcakeAvailable = false; @endphp
              @foreach($product as $products)
                  @if($products->category_name === 'Cupcake')
                  @php $cupcakeAvailable = true; @endphp 
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                              <h5 class="card-title font-semibold">{{ $products->flavor }}</h5>


                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}} </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required=""/>
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  @endif
              @endforeach
              @if(!$cupcakeAvailable)
                  <div class="col text-center">
                      <p class="text-danger">No Cupcakes available at the moment.</p>
                  </div>
              @endif

            </div>
            <br><br>
</section>
            
            
<!-- end CUPCAKE SECTION -->

<!-- CHEESECAKE SECTION -->

<section class="section-padding-top  d-none d-lg-block">
        <div class="heading_container heading_center " id="cheesecakesection" >
           <h2>
            <span>Cheesecakes</span> 
           </h2>
        </div>

            <div class="row list">
              @php $cheesecakeAvailable = false; @endphp
              @foreach($product as $products)
                  @if($products->category_name === 'Cheesecake')
                  @php $cheesecakeAvailable = true; @endphp 
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                              <h5 class="card-title font-semibold">{{ $products->flavor }}</h5>

                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}}  </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required=""/>
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  @endif
              @endforeach
              @if(!$cheesecakeAvailable)
                  <div class="col text-center">
                      <p class="text-danger">No Cheesecakes available at the moment.</p>
                  </div>
              @endif

            </div>
            <br><br>
</section>
<!-- end CHEESECAKE SECTION -->

<!-- BREAD SECTION -->

<section class="section-padding-top  d-none d-lg-block">
        <div class="heading_container heading_center " id="breadsection">
           <h2>
            <span>Bread</span> 
           </h2>
        </div>

            <div class="row list">
              @php $breadAvailable = false; @endphp
              @foreach($product as $products)
                  @if($products->category_name === 'Bread')
                  @php $breadAvailable = true; @endphp 
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                              <h5 class="card-title font-semibold">{{ $products->flavor }}</h5>


                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}}  </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required=""/>
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  @endif
              @endforeach
              @if(!$breadAvailable)
                  <div class="col text-center">
                      <p class="text-danger">No Bread available at the moment.</p>
                  </div>
              @endif

            </div>
            <br><br>
  </section>
<!-- end BREAD SECTION -->

<!-- COOKIES SECTION -->

<section class="section-padding-top  d-none d-lg-block">
        <div class="heading_container heading_center " id="cookiessection">
           <h2>
            <span>Cookies</span> 
           </h2>
       </div>

            <div class="row list">
              @php $cookiesAvailable = false; @endphp
              @foreach($product as $products)
                  @if($products->category_name === 'Cookies')
                  @php $cookiesAvailable = true; @endphp 
                      <div class="col-sm-6 col-md-3 col-lg-3 card shadow-lg px-0 mx-3 mb-2" style="border-radius: 10px;">
                          <!-- Your product display code here -->

                          <img src="product/{{$products->image}}" style="border-radius-top: 10px; height: 100%; width: 100%;" alt="...">
                          <div class="card-body">
                              <h5 class="card-title font-semibold">{{ $products->flavor }}</h5> 


                              <div class=row> 
                                <div class="col"> <h5 class=""> P {{ number_format($products->price, 0, '.', ',') }} </h5> </div>
                                <div class="col-7 text-right"> <h6 class=""> <small> {{$products->size}}  </small></h6> </div>
                              </div>


                              <form action="{{url('add_cart',$products->id)}}" method="POST">
                                  @csrf

                                    <div class="options ">

                                      <button  class="option1" value="" >  </button>
                                      <br>
                                      <!-- Buy now button icon  -->
                                      <div class="row " style="justify-content: space-between;">
                                            <div class="col ">
                                                  <button type="submit" class="btn btn-light" value=""> 
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg> </button>  
                                            </div>
                                            <div class="col">
                                                   <input type="number" name="quantity" min="1" class="" style="height:40px" required=""/>
                                            </div>
                                      </div>

                                    </div>
                                </form>
                          </div>
                      </div>
                  @endif
              @endforeach
              @if(!$cookiesAvailable)
                  <div class="col text-center">
                      <p class="text-danger">No Cookies available at the moment.</p>
                  </div>
              @endif

            </div>
</section>
<!-- end COOKIES SECTION -->




<!-- MENU CATEGORIES-->

<div class="row">
      <div class="col-md-12">

          <div class="category_tabs ">
             <ul class="category-menu d-none d-md-flex">
                  
                 <li class="nav-item ">
                    <a type="button" class="btn menubtn active" href="#allproducts">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-info" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg><br>All Products
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a type="button" class="btn menubtn " href="#cakesection">
                      <img src="https://static.vecteezy.com/system/resources/previews/013/453/751/original/pastry-cake-3d-rendering-isometric-icon-png.png" style="width: 30px; height:30px;"> <br>Cake </a>

                  </li>
                  <li class="nav-item">
                      <a type="button" class="btn menubtn " href="#cupcakesection"> <img src="images/cupcake.png" style="width: 30px; height:30px;"> <br>Cupcake</a>
                  </li>
                  <li class="nav-item">
                      <a type="button" class="btn menubtn " href="#cheesecakesection"> <img src="https://cakevan.com.au/wp-content/uploads/2022/06/152.png" style="width: 30px; height:30px;"> <br>Cheesecake</a>
                  </li>
                  <li class="nav-item">
                      <a type="button" class="btn menubtn " href="#breadsection"> <img src="https://png.monster/wp-content/uploads/2022/06/png.monster-714.png" style="width: 30px; height:30px;"> <br>Bread</a>
                  </li>
                  <li class="nav-item">
                      <a type="button" class="btn menubtn " href="#cookiessection"> <img src="https://www.pngall.com/wp-content/uploads/2016/07/Cookie-Download-PNG.png" style="width: 30px; height:30px;"> <br>Cookies</a>
                  </li>
             </ul>
          </div>
</div>
</div>

<!-- end  MENU CATEGORIES-->
        
        
        
         
      </section>


      <!-- end product section -->


      <!--Start Back To Top Button--> 
          <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
      <!--End Back To Top Button-->

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
    
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>


<!-- Add this script tag to your HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function () {
      $('.category-menu a').on('click', function (e) {
         e.preventDefault();
         var target = $(this).attr('href');
         $('html, body').animate({
            scrollTop: $(target).offset().top
         }, 800);
      });
   });
</script>

    
<!-- Toaster CDN -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
       @if(Session::has('message'))
       var type = "{{ Session::get('alert-type','info') }}"
       switch(type){
          case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;
          case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;
          case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;
          case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break; 
       }
       @endif 
      </script>
      <!-- end toaster CDN -->


<!-- Refresh Page and Keep Scroll Position -->
<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
<!-- end Refresh Page and Keep Scroll Position -->


   </body>
</html>