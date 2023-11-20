

	<div class="modal-body">
        Modal content goes here
                       
                            
       <div class=row> 
        <div class="col"> <h5 class=""> P{{$products->flavor}} </h5> </div>
          <div class="col"> <h5 class=""> P{{$products->category_name}} </h5> </div>
          <div class="col"> <h6 class=""> <small>Discount: {{$products->discount_price}} </small></h6> </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-4">
             <input type="number" name="quantity" value="1" min="1" style="width:100px">
          </div>
          <div class="col-md-4">
             <input type="submit" value="Add to basket">
          </div>
       </div>


       <br><br>

