<style type="text/css">
   
   .center-textarea {
      text-align: center;
      width: 500px;
    
}

</style>

      <section class="client_section layout_padding pt-5">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  What our customer's are saying...
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">

                  
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/user1.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Venusa Rosa
                           </h5>
                           <h6>
                              
                           </h6>
                           <p>
                              This is where you can find the best cake in town! Suki na for all kinds of occasions! You'll never go wrong with any of the cakes in their menu! But my all time faves will be their carrot and chocolate cake! Awan suya factor na. 😁🥰🍰♥️
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/user2.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Garry Aldu
                           </h5>
                           <h6>
                              
                           </h6>
                           <p>
                              The best cake in town! The taste and texture stands out among other cake makers.😍 Custom cakes
                              <br><br><br>
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/user3.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Cyc Burgonio
                           </h5>
                           <h6>
                              
                           </h6>
                           <p>
                              Naimas, naraman, sakto lang sugar level na ken worth it presyo na. Quality❣️
                              <br><br><br>
                           </p>
                        </div>
                     </div>
                  </div>

               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
                  

            </div>
            
               <div class=" mt-3 ">
               <hr>
                     <form action="{{url('/add_review')}}" method="POST" class="was-validated  ">
                        @csrf
                             
                          <div class="row justify-content-md-center">
                            <div class="col col-lg-2">
                              
                            </div>
                            <div class="col-md-8">
                                 <input type="submit" class="btn  " value="Post a Review" >
                                 <br>
                                 <textarea name="review" class="form-control border-dark" id="validationTextarea" placeholder="Your comment here..."  required></textarea>
                                  <div class="invalid-feedback ">
                                    
                                  </div>

                            </div>
                            <div class="col col-lg-2">
                              
                            </div>
                          </div>

                     </form>
               </div>
               <!-- ALL COMMENTS -->


               <div class="row justify-content-md-center">
                   <div class="col col-lg-2">
                     
                   </div>
                   <div class="col-md-8">
                        
                        <div style="" class="mt-3"  >
                           <h5 class=""><u> All Reviews  </u></h5> <br>

                           @foreach($reviews as $review)
                           <div class="py-0">
                                 <h6 class="p-0 m-0 " style="text-decoration:underline; "> <b>{{$review->name}}</b> <span><small> Posted: {{$review->created_at->diffForHumans()}} </small></span></h6> 
                                
                                  {{$review->review}}
                                  <br>
                                 <a href="javaScript::void(0);" class="btn btn-sm btn-outline-info px-1 py-0" onclick="reply(this)" data-ReviewID="{{$review->id}}"> Reply </a>

                                 <!-- REPLIES to Reviews -->
                                 @foreach($reviewComment as $comment)
                                 @if($comment->review_id==$review->id)
                                 <div style="padding-left:50px;" class="mt-3">
                                       <b> {{$comment->name}} </b> <span><small> Posted: {{$comment->created_at->diffForHumans()}} </small></span>
                                       <br>
                                        {{$comment->comment}}
                                        <br>
                                       <a href="javaScript::void(0);" class="btn btn-sm  p-0" onclick="reply(this)" data-ReviewID="{{$review->id}}" style="text-decoration:underline;"> Reply </a>
                                 </div> 
                                  @endif
                                  @endforeach
                           </div>
                           <br>

                           @endforeach

                            <!-- REPLY text area -->
                           <div style="display: none;" class="replyBox p-0 m-0"> 

                              <form action="{{url('add_reply')}}" method="POST">
                              @csrf 
                                 <input type="text" id="reviewID" name="reviewID" hidden>
                                 <textarea placeholder="Add a comment..." style="height:100px; width: 500px;" class="p-3 m-0" name="reviewComment"></textarea>
                                 <div class=""></div>
                                 <button type="submit" class="btn btn-sm btn-info " > Reply </button> 
                                 <a href="javaScript::void(0);" class="btn btn-sm btn-secondary" onclick="reply_close(this)"> Close </a>

                              </form>
                           </div>


                        </div>

                   </div>
                   <div class="col col-lg-2">
                     
                   </div>
                 </div>

         </div>
      </section>


      
<script type="text/javascript">
      function reply(caller){
            document.getElementById('reviewID').value=$(caller).attr('data-ReviewID');
            $('.replyBox').insertAfter($(caller));
            $('.replyBox').show();
      }

      function reply_close(caller){
            $('.replyBox').hide();
      }
</script>


