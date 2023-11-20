
<style type="text/css">
   .slider_bg_box {
      overflow: hidden;
       width: 100%; /* Adjust the width for smaller screens */
      height: 100vh;
   }
   @media (max-width: 768px){
      .slider_bg_box {
      overflow: hidden;
      width: 100%; /* Adjust the width for smaller screens */
      height: 100vh; /* Adjust the height for smaller screens */
    } video {
      top: 10%; /* Adjust the top position for smaller screens to keep it at the top middle */
        left: 70%;
      transform: translate( -35% );
    }
   }

</style>

<section class="slider_section ">
            <div class="slider_bg_box">
               
               <video autoplay muted loop playsinline poster="{{ asset('images/banner_vid.mp4') }}">
               <source src="{{ asset('images/banner_vid.mp4') }}" type="video/mp4">
               </video>
 

            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <br><br><br><br>
                                    <span class="">
                                    Life is...
                                    </span><br>
                                    <span>
                                    <mark class="">what you BAKE it. </mark>
                                    </span>
                                    <br>
                              
                                 </h1>
                                 <p>
                                  
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                <!--   <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol> -->
               </div>
            </div>
         </section>