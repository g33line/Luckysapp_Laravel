<section class="product_section ">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>

      <!-- SEARCH product -->

      <div>
        <form action="{{url('product_search')}}" method="GET" class="text-center">
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


            <div class="row">

              @forelse($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('/menu')}}" class="option1">
                           {{$products->category_name}}
                           </a>
                           <a href="{{url('/orderonline')}}" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="" style="">
                     </div>
                     <!-- <div class="detail-box">
                        <h5>
                           Cake
                        </h5>
                        <h6>
                           P500
                        </h6>
                     </div> -->
                  </div>
               </div>
               @empty 

                  <div class="mx-auto">
                     <h4 class="text-secondary"> Not available.</h4>
                     <br><br>
                  </div>

               @endforelse
               
               

            </div>
            <span class="text-dark">
                  {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>

            <div class="btn-box">
               <a href="{{url('/menu')}}">
               View All products
               </a>
            </div>
         </div>
      </section>


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