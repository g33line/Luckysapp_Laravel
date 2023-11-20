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




      </style>



   </head>
   <body>
       <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      
      
      <!-- product section -->
      <br><br><br><br><br>


      <section class="menu_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                   Your <span>Basket</span>
               </h2>
            </div>
                
                <div class="row list "> 
                 
               

                  <div class="card radius-10 __web-inspector-hide-shortcut__">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div>
                           <h5 class="mb-0">Orders Summary</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                     </div>
                     <hr>
                     <div class="table-responsive">
                        <table class="table align-middle mb-0">
                           <thead class="table-light">
                              <tr>
                                 <th>Image</th>
                                 <th>Product</th>
                                 <th>Amount</th>
                                 <th>Quantity</th>
                                 <th>Date Added</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>

                              <?php $totalprice=0; ?>
                              
                              @foreach($cart as $basket)
                                 <tr> 
                                       <td> <img class="cart_image" src="product/{{$basket->image}}" > </td>
                                       <td> {{$basket->product_name}} </td>
                                       <td> {{$basket->price}} </td>
                                       <td> {{$basket->order_quantity}} </td>
                                       <td> {{$basket->created_at}} </td>
                                       <td> adfas </td> 
                                       <td> 
                                             <div class="col  p-0">
                                             <a href="{{url('delete_cartitem',$basket->id)}}" type="submit" class="btn btn-danger text-light" id="delete" > 
                                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill " viewBox="0 0 16 16">
                                             <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/> </svg> </a>  </div>

                                       </td> 
                                 </tr>

                                 <?php $totalprice=$totalprice + $basket->price ?>

                              @endforeach

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>



               </div>
               <br>

                        <div class="card-body text-right ">
                              <p class="pe-5 me-5 fw-bold">
                                 TOTAL AMOUNT: 
                              </p>
                              <h4 class="mb-0 pe-5 me-5"> P {{ number_format($totalprice, 2, '.', ',') }}</h4>
                              
                              <hr>
                        
                        </div>
                       </div>
                      </div>



         </div>
        
        
         
      </section>


      <!-- end product section -->


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

<!-- DELETE alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Item?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Item has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });
</script>
<!-- end delete alert -->
    
   </body>
</html>