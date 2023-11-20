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
      <title>Luckys Baked Goods</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
   


   </head>
   <body>



      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      
      <!-- categories section -->
      @include('home.categories')
      <!-- end categories section -->
      
      
      <!-- product section -->
      @include('home.products')
      <!-- end product section -->

      <!-- reviews section -->
      @include('home.reviews')
      <!-- end reviews section -->

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


<!-- DELETE alert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script type="text/javascript">
   
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  <!-- alert with image -->

               Swal.fire({
                 title: 'Sweet!',
                 text: 'Modal with a custom image.',
                 imageUrl: 'https://unsplash.it/400/200',
                 imageWidth: 400,
                 imageHeight: 200,
                 imageAlt: 'Custom image',
               })

               <!-- end alert with image -->

    });

  });   
</script>

<!-- end delete alert -->


   </body>
</html>