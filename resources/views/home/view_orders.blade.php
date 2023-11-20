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

.cart_image{
   width: 100px;
   height: 100px;
}

.input-width {
    width: 180px;
}




      </style>



   </head>
   <body>
       <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      
      
      <!-- product section -->
      <br><br><br><br><br>


      <section class="menu_section layout_padding">
         <div class="container-fluid">




            <div class="heading_container heading_center">
               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
              </svg>
               <h2>

                   Your <span>Orders</span>
               </h2>
            </div>
                
            <div class="row list "> 
                 
               
               

                  <div class="card radius-10 __web-inspector-hide-shortcut__">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="mx-auto">
                           <h5 class="mb-0">Active Orders: {{$totalorders}}<b> </b> </h5>
                        </div>
                        <div class="mx-auto">
                            <h5 class="mb-0">Cancelled Orders: {{$totalorders}}<b> </b> </h5>
                        </div>
                     </div>
                     <hr>
                     <div class="table-responsive col-lg-12"> 


                        <table class="table align-middle  table-hover">
                           <thead class="table-light">
                              <tr>
                                 <th></th>
                                 <th>Product</th>
                                 <th>Order Status</th>
                                 <th>Quantity</th>
                                 <th>Amount</th>
                                 <th>Product Size</th>
                                 <th>Delivery Mode</th>
                                 <th>Schedule</th>
                                 <th></th>
                                 <th>Payment</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                                @foreach($order as $order)
                                 <tr> 
                                       <td> <img class="cart_image" src="product/{{$order->image}}" style="width: 60px; height: 60px;"> </td>
                                       <td> {{$order->product_name}} </td>
                                       <td> {{$order->order_status}}</td> 
                                       <td class="text-center" > {{$order->order_quantity}} </td>
                                       <td> {{$order->price}} </td>
                                       <td> {{$order->product_size}}</td>
                                       <td class="text-center"> {{$order->delivery_mode}}</td>
                                       <td> {{$order->delivery_date}}</td> 
                                       <td> {{$order->delivery_time}}</td> 
                                       <td> {{$order->payment_status}}</td> 
                                       <td> 

                                        @if($order->order_status=='Processing')
                                             <div class="col  p-0">
                                             <a href="{{url('cancel_order',$order->id)}}" type="submit" class="btn btn-danger text-light" id="delete" > 
                                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill " viewBox="0 0 16 16">
                                             <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/> </svg> </a>  </div>
                                        @else
                                        
                                        @endif

                                       </td> 
                                 </tr>

                                 @endforeach
                           </tbody>
                        </table>

                     </div>
                  </div>
               </div>


               </div>
                    <br>  
                </div>
           
              
          </div>

    </div>
        
        
         
      </section>


      <div class="cpy_ mt-5" >
         <p class="mx-auto">© 2023 All Rights Reserved <br>
         
            All Glory to GOD!
         
         </p>
      </div>

    
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>


<!-- DELETE alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   
$(function(){
    $(document).on('click','#delete',function(e){
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