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
      <title>Order Online</title>
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

.cart_image{
   width: 100px;
   height: 100px;
}

.input-width {
    width: 180px;
}


/*right sidebar*/
.item-sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: 250px; /* Adjust this width based on your needs */
    background-color: transparent; /* Background color of the sidebar */
    color: black; /* Text color */
    padding-top: 150px;
    padding-right: 15px;
    align-items: baseline;
}
@media screen and (max-width: 768px){
    .item-sidebar {
        padding-top: 200px;
    }
}

/*end right sidebar*/

    .background-img {
    position: relative;
    width: 100%; /* Adjust this width based on your needs */
    min-height: 100vh;
    overflow: hidden;
   }

@media  (min-width: 768px){
    .editOrderBox{
        width: 70%;

    }
}

.checkoutBox {

    border: 1px solid darkgray;
    border-radius: 10px;
}


      </style>



   </head>
   <body>
       <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


      
      <!-- product section -->
      <br><br><br><br><br>
        <div class="row" style="position:fixed;">
              <div class="col-md-12">
                   <div class="background-img ">
                      <img src="images/storybg_.png" style="width: 2100px; height: 1200px;">

                    </div>
               </div>
        </div>



<section class="menu_section layout_padding">
 <div class="container-fluid">



           
                

    @if($order_quantity>0)
    <form action="{{url('cash_payment')}}" method="POST" enctype="multipart/form-data" class="was-validated">
    @csrf

     <div class="row d-block d-lg-flex">
        <!-- BASKET content -->
            <div class="col col-lg-8 ">


                         <!-- <div class="heading_container heading_center">
                           <h2 class="text-left" style="font-size:35px;">
                               Your 
                               @if($order_quantity>0)
                                    <span>Basket</span>

                                @else
                                    <span>Orders</span>
                                @endif
                           </h2>
                        </div> -->

                    
                        <div class="row list "> 

                            <div class="card radius-10 __web-inspector-hide-shortcut__">
                              <div class="card-body " >
                                 <div class="d-flex align-items-center">
                                    <div class="mx-auto">
                                       <h5 class="mb-0">Basket 
                                            @if($order_quantity>1)
                                                    Items:
                                                @else 
                                                    Item:
                                                @endif 
                                                <b> {{$order_quantity}} </b> </h5>
                                    </div>
                                    <div class="font-22 mx-auto">
                                        @if($order_quantity>0)
        
                                                  <a href="{{url('/menu')}}" class="text-danger " id="cartMenuButton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                                      <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                                    </svg> <br> </a>
                                           
                                        @else
                                            
                                                  <a href="{{url('/menu')}}" class="text-secondary " id="cartMenuButton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                                      <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                                    </svg> <br> </a>
                                            
                                          @endif
                                    </div>
                                 </div>
                                 <hr>

                                 <div class="table-responsive col-lg-12 " > 

                                        <table class="table align-middle  table-hover">
                                           <thead class="table-light">
                                              <tr>
                                                 <th></th>
                                                 <th></th>
                                                 <th>Product</th>
                                                 <th> </th>
                                                 <th>Quantity</th>
                                                 <th>Amount</th>
                                                 <th>Added</th>
                                              </tr>
                                           </thead>
                                           <tbody>

                                              <?php $totalprice=0; ?>
                                              
                                              @foreach($cart as $basket)
                                                 <tr> 
                                                       <td> 
                                                             <div class="col  p-0">
                                                             <a href="{{url('delete_cartitem',$basket->id)}}" type="submit" class="btn btn-sm btn-outline-danger " id="delete" > Cancel </a>  </div>

                                                       </td> 
                                                       <td> <img class="cart_image" src="product/{{$basket->image}}" style="width: 60px; height: 60px;"> </td>
                                                       <td > {{$basket->product_name}} </td>
                                                       <td> {{$basket->product_size}}  </td>
                                                       <td  class="text-center"> {{$basket->order_quantity}} </td>
                                                       <td  class="text-center" > {{$basket->price}} </td>
                                                       <td> {{$basket->created_at->diffForHumans()}} </td>
                                                 </tr>

                                                 <?php $totalprice=$totalprice + $basket->price ?>
                                                @endforeach

                                            </tbody>
                                            </table>

                                     </div>
                              </div>
                           </div>
                        </div>

            </div>
        <!-- BASKET content -->


        <!-- CHECKOUT Column -->
            <div class="col col-lg-4 ">


                        <div class="row">
                            <div class="col-md-12">
                                        <br>     
                                        <div class=" text-center ">
                                            <h5> Proceed to Checkout </h5> 

                                        </div>
                                        <div class="card-body text-center ">
                                            

                                              <p class=" fw-bold">
                                                 TOTAL AMOUNT: 
                                              </p>
                                              <h5 class=""> P {{ number_format($totalprice, 2, '.', ',') }}</h5>
                                              
                                              <hr>
                                        
                                        </div>

                                        <!-- CHECKOUT BUTTONS -->
                                        <div class="text-center ">
                                            
                                            <a href="javaScript::void(0);"  class="btn text-light" value="" style="background-color:#00b3b3;"  onclick="payviaCOD(this)" > Cash on Delivery</a>

                                            <a href="javaScript::void(0);" class="btn  text-light" id="upload" onclick="payviaQR(this)" style="background-color:#00b3b3;">Pay via QR code</a>

                                        </div>
                                        </form>

                                        <!-- end CHECKOUT BUTTONS -->


                                        <!-- ORDER details -->
                                        <!-- CASH ORDER -->
                                        <div  class="container p-0 m-0 CashOrderBox" style="display: none;" >
                                                
                                                <form action="{{url('cash_payment')}}" method="POST" enctype="multipart/form-data" class="was-validated">
                                                @csrf
                                                <br>
                                                <div class="row  row-orderbox d-block " >
                                                    <div class="col text-center align-items-center">
                                                        <h6> Delivery Details 
                                                        <a href="javaScript::void(0);" class="btn btn-sm btn-secondary py-0" onclick="payviaCOD_close(this)"> x </a> </h6>
                                                    </div>
                                                    
                                                    <div class="col "> 
                                                        <div class="form-group">
                                                            <label for="inputDeliveryMode" class="form-label">Delivery Mode</label>
                                                            <input class="form-control " type="text" placeholder="Pickup or Delivery" name="delivery_mode" required="" >
                                                        </div>
                                                    </div>
                                                    <div class="col  ">
                                                        <div class="form-group">
                                                            <label for="inputDeliveryDate" class="form-label">Scheduled Date</label>
                                                            <input class="form-control " type="date"  name="delivery_date" required="" > 
                                                        </div>
                                                    </div>
                                                    <div class="col ">
                                                        <div class="form-group">
                                                            <label for="inputDeliveryTime" class="form-label">Scheduled Time</label>
                                                            <input class="form-control " type="time"  name="delivery_time" required="" > 
                                                        </div>
                                                    </div>
                                                    <div class="col ">
                                                        <div class="form-group">
                                                            <textarea name="instructions" class="form-control border-dark" id="validationTextarea" placeholder="Additional notes..." ></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="mx-3 text-center">
                                                        <button type="submit" class="btn  " style="background-color:#00b3b3;"> Submit Order </button> 
                                                        
                                                    </div>

                                                </div>
                                                </form>

                                        </div> <!-- CASH ORDER  -->


                                        
                                        <!-- QR PAYMENT UPLOAD Reference -->
                                        <div style="display: none; " class="uploadQR p-0 m-0 "> 

                                              <form action="{{url('upload_QRPaymentRef')}}" method="POST" enctype="multipart/form-data">
                                              @csrf 
                                              <br>

                                                <div class="row  row-orderbox d-block " >
                                                    <div class="col text-center align-items-center ">
                                                        <h6> Upload Reference 
                                                        <a href="javaScript::void(0);" class="btn btn-sm btn-secondary py-0" onclick="payviaQR_close(this)"> x </a> </h6>
                                                        <input type="file" name="QRref_image" required="" style="width: 100%; background-color:transparent; border: none; padding: 0px;">
                                                    </div>
                                                 
                                                    <div class="col "> 
                                                        <div class="form-group">
                                                            <label for="inputDeliveryMode" class="form-label">Delivery Mode</label>
                                                            <input class="form-control " type="text" placeholder="Pickup or Delivery" name="delivery_mode" required="" >
                                                        </div>
                                                    </div>
                                                    <div class="col  ">
                                                        <div class="form-group">
                                                            <label for="inputDeliveryDate" class="form-label">Scheduled Date</label>
                                                            <input class="form-control " type="date"  name="delivery_date" required="" > 
                                                        </div>
                                                    </div>
                                                    <div class="col ">
                                                        <div class="form-group">
                                                            <label for="inputDeliveryTime" class="form-label">Scheduled Time</label>
                                                            <input class="form-control " type="time"  name="delivery_time" required="" > 
                                                        </div>
                                                    </div>
                                                    <div class="col ">
                                                        <div class="form-group">
                                                            <textarea name="instructions" class="form-control border-dark" id="validationTextarea" placeholder="Additional notes..."  ></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="mx-3 text-center">
                                                        <button type="submit" class="btn  " style="background-color:#00b3b3;"> Submit Order </button> 
                                                        
                                                    </div>

                                                </div>

                                              </form>
                                       </div>  <!-- QR PAYMENT UPLOAD Reference -->
                                        <!-- ORDER details -->

                            </div>
                        
                        </div>
                        
                <!-- </div> -->

            </div>
        <!-- CHECKOUT Column -->

    </div>       



        
                        
                   


                    @else


                        <div class="heading_container heading_center">

                           <h2 class="text-left" style="font-size:35px;">
                                @if($activeorders>0)
                                    <div class="d-lg-none d-sm-block text-center">
                                        <br>
                                          <a href="{{url('/menu')}}" class="text-danger " id="cartMenuButton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                              <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                            </svg> <br> </a>
                                    </div>
                                @else
                                    <div class="d-lg-none d-sm-block text-center">
                                        <br>
                                          <a href="{{url('/menu')}}" class="text-secondary " id="cartMenuButton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                              <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                            </svg> <br> </a>
                                    </div>
                                @endif

                               Your 
                               @if($order_quantity>0)
                                    <span>Basket</span>

                                @else
                                    <span>Orders</span>
                                @endif
                           </h2>
                        </div>


                        <div class="row list "> 
                 
                            
               
                            <!-- ORDERS LIST -->
                              <div class="card radius-10 __web-inspector-hide-shortcut__">
                              <div class="card-body">
                                 <div class="d-block d-lg-flex align-items-center">
                                    <div class="mx-auto">
                                       <h5 class="mb-0 "> 
                                                            @if($activeorders>0)
                                                                <span class="text-danger"> Active Orders: {{$activeorders}}</span>
                                                            @else 
                                                                <span class="text-secondary"> Active Order: {{$activeorders}}</span>
                                                            @endif
                                                            <b> </b> </h5>
                                    </div>
                                    <div class="mx-auto">
                                        <h5 class="mb-0 text-secondary">Cancelled 
                                                            @if($order_quantity>1)
                                                                Orders:
                                                            @else 
                                                                Order:
                                                            @endif 
                                                            {{$cancelledorders}}<b> </b> </h5>
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="table-responsive col-lg-12"> 


                                    <table class="table align-middle  table-hover">
                                       <thead class="table-light">
                                          <tr>
                                             <th></th>
                                             <th>Order Status</th>
                                             <th></th>
                                             <th>Product</th>
                                             <th>Payment</th>
                                             <th>Quantity</th>
                                             <th>Amount</th>
                                             <th>Product Size</th>
                                             <th>Delivery Mode</th>
                                             <th>Schedule</th>
                                             <th></th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                            @foreach($order as $order)
                                             <tr> 
                                                <td> 

                                                    @if($order->order_status=='Processing')
                                                    
                                                      
                                                    <div class="col  p-0">
                                                         <a href="{{url('cancel_order',$order->id)}}"  class="btn btn-sm btn-outline-danger " id="cancel" > Cancel</a> 
                                                     </div>
                                                    @else
                                                    
                                                    @endif

                                                   </td> 
                                                   <td> {{$order->order_status}}</td> 
                                                   <td> <img class="cart_image" src="product/{{$order->image}}" style="width: 60px; height: 60px;"> </td>
                                                   <td> {{$order->product_name}} </td>
                                                   <td> {{$order->payment_status}}</td> 
                                                   <td class="text-center" > {{$order->order_quantity}} </td>
                                                   <td class="text-center"> {{$order->price}} </td>
                                                   <td> {{$order->product_size}}</td>
                                                   <td class="text-center"> {{$order->delivery_mode}}</td>
                                                   <td> {{$order->delivery_date}}</td> 
                                                   <td> {{$order->delivery_time}}</td> 
                                                   
                                             </tr>

                                             @endforeach

                                        </tbody>

                                    </table>
                                        
                                 </div>
                                </div>
                                </div> <!-- end ORDERS LIST -->

                        </div> <br>  

                </div>
                    
                @endif
              
          </div>

    </div>
 </section>




      <!-- end product section -->


    <!-- footer start -->

        <div class="row pt-5 mt-5">
              <div class="col-md-12">
                    
                      <div class="cpy_">
                       <p class="mx-auto">© 2023 All Rights Reserved <br>
                       
                          All Glory to GOD!
                       
                       </p>
                    </div>

              </div>
        </div>



      <!-- footer end -->


    
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>


<!-- UPLOAD QR alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   
$(function(){
    $(document).on('click','#upload',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                  title: 'Scan the QR code',
                  text: 'Upload the confirmation screenshot.',
                  imageUrl: 'images/QR.png',
                  imageWidth: 400,
                  imageHeight: 200,
                  imageAlt: 'QR codes',
                })

    });

  });
</script>

<script type="text/javascript">
      function payviaQR(caller){
            $('.uploadQR').show();
            $('.CashOrderBox').hide();
      }

      function payviaQR_close(caller){
            $('.uploadQR').hide();
      }
</script>
<!-- end UPLOAD QR alert -->



<!-- Cash order details box -->
<script type="text/javascript">
      function payviaCOD(caller){
            $('.uploadQR').hide();
            $('.CashOrderBox').show();
            
            var getProduct_name = document.getElementById('product_name').value;
            var getProduct_price = document.getElementById('product_price').value;
            var getOrder_quantity= document.getElementById('order_quantity').value;
        
        // Display the input value in the output field
            document.getElementById('showProduct_name').value = getProduct_name;
            document.getElementById('showProduct_price').value = getProduct_price;
            document.getElementById('showOrder_quantity').value = getOrder_quantity;
      }

      function payviaCOD_close(caller){
            $('.CashOrderBox').hide();
      }
</script>

<!-- end  Cash order details box -->


<!-- Cancel alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   
$(function(){
    $(document).on('click','#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Cancel This Order?',
                    text: "Are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Cancelled!',
                        'Order has been cancelled.',
                        'success'
                      )
                    }
                  }) 
    });

  });
</script>
<!-- end cancel alert -->


<!-- DELETE alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Remove This Item?',
                    text: "Are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Removed!',
                        'Item has been removed.',
                        'success'
                      )
                    }
                  }) 
    });

  });
</script>
<!-- end delete alert -->
    

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




    
   </body>
</html>