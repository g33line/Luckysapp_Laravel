<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\CustomerReview;
use App\Models\ReviewComment;
use App\Models\Message;

class HomeController extends Controller
{
 

    public function index(){
        $reviews=customerreview::orderby('created_at','desc')->get();
        $custreviews=customerreview::latest()->paginate(7);
        $reviewComment=ReviewComment::all();
        $product=product::paginate(6);
        return view('home.userpage',compact('product','custreviews','reviews','reviewComment'));
    }

    public function redirect(){
            
        $product=product::paginate(6);

          // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }

        $usertype=Auth::user()->usertype;
        
        if($usertype=='1'){
            $totalreviews=customerreview::all()->count();
            $totalmessages=message::all()->count();
            $reviews=customerreview::orderby('id','desc')->get();
            $custreviews=customerreview::latest()->paginate(7);
            $total_products=product::all()->count();
            $total_orders = order::sum('order_quantity');
            $total_users=user::where('usertype','=','0')->get()->count();
            $order=order::all();
            $total_sales=0;
            foreach($order as $order){
                if ($order->order_status !== 'Cancelled'){
                        $total_sales += $order->price;
                    }
                }

            $total_delivered = order::where('order_status', 'Delivered')->sum('order_quantity');
            $total_pending=order::where('order_status','=','processing')->get()->count();
            $total_cancelled=order::where('order_status','=','cancelled')->get()->count();
            $sum_delivered = order::where('order_status', 'Delivered')->sum('price');
            $sum_receivables = order::where('order_status', 'processing')->sum('price');

            $categories=ProductCategory::all();
            $categoryCake = order::where('category_name', 'cake')->sum('order_quantity');
            $categoryCheesecake = order::where('category_name', 'cheesecake')->sum('order_quantity');
            $categoryCupcake = order::where('category_name', 'cupcake')->sum('order_quantity');
            $categoryBread = order::where('category_name', 'bread')->sum('order_quantity');
            $categoryCookies = order::where('category_name', 'cookies')->sum('order_quantity');
            $sumcategoryCake = order::where('category_name', 'cake')->sum('price');
            $sumcategoryCheesecake = order::where('category_name', 'cheesecake')->sum('price');
            $sumcategoryCupcake = order::where('category_name', 'cupcake')->sum('price');
            $sumcategoryBread = order::where('category_name', 'bread')->sum('price');
            $sumcategoryCookies = order::where('category_name', 'cookies')->sum('price');

        

            return view('admin_dash.index',compact('total_products','total_orders','total_users','total_sales','total_delivered','total_pending','total_cancelled','sum_delivered','sum_receivables','categories','categoryCake','categoryCheesecake','categoryCupcake','categoryBread','categoryCookies','sumcategoryCake','sumcategoryCheesecake','sumcategoryCupcake','sumcategoryBread','sumcategoryCookies','custreviews','reviews','totalreviews','totalmessages'));

        }else{
            $reviewComment=ReviewComment::all();
            $reviews=customerreview::orderby('created_at','desc')->get();
            $custreviews=customerreview::latest()->paginate(7);

            return view('home.userpage',compact('product','custreviews','reviews','reviewComment'));
        }
    }

  


    public function menu(){
        $product=product::all();


        if(Auth::id()){
            $userID = Auth::id();
            $order_quantity = cart::where('user_id', $userID)->sum('order_quantity');
            $price = cart::where('user_id', $userID)->sum('price');
            return view('home.menu',compact('product','order_quantity','price'));
        } else {
            $order_quantity = 0;
            $price = 0;
            return view('home.menu',compact('product','order_quantity','price'));
        }
     
    }


    
    public function add_cart(Request $request,$id){
        $product=product::find($id);
       

        if(Auth::id()){

            $user=Auth::user();
            $userid=$user->id;
            $products=product::find($id);
            $sameproduct=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();


            if($sameproduct){

                $cart=cart::find($sameproduct)->first();
                $quantity=$cart->order_quantity;
                $cart->order_quantity=$quantity + $request->quantity;
                if($products->discount_price!=null){
                        $cart->price=$products->price * $cart->order_quantity - $products->discount_price * $cart->order_quantity;
                    } else {
                        $cart->price=$products->price;
                        $cart->product_size=$products->size;
                    }

                $cart->save();
                $notification = array(
                'message' => 'Item added to basket',
                'alert-type' => 'info'
            );
                return redirect()->back()->with($notification);

            } else {
            
                    $cart=new cart;
                    $cart->name=$user->name;
                    $cart->email=$user->email;
                    $cart->number=$user->phone;
                    $cart->address=$user->address;
                    $cart->user_id=$user->id;

                    $cart->product_name=$products->flavor . ' ' . $products->category_name;
                    $cart->category_name=$products->category_name;

                    if($products->discount_price!=null){
                        $cart->price=$products->price * $request->quantity - $products->discount_price * $request->quantity;
                    } else {
                        $cart->price=$products->price;
                    }
                    $cart->product_size=$products->size;
                    $cart->image=$products->image;
                    $cart->product_id=$products->id;
                    $cart->order_quantity=$request->quantity;
                    
                    $cart->save();
                    $notification = array(
                    'message' => 'Item added to basket',
                    'alert-type' => 'info'
                );
                    return redirect()->back()->with($notification);
                }

        } else {

            $notification = array(
            'message' => 'You must be logged in to place your order',
            'alert-type' => 'error'
        );
            return redirect()->back()->with($notification);
        }
    }




    public function orderonline(){

        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            $order=order::where('user_id','=',$id)->orderby('order_status', 'desc')->latest()->get();
            $activeorders = order::where('user_id', $id)->where('order_status', 'processing')->sum('order_quantity');
            $cancelledorders = order::where('user_id', $id)->where('order_status', 'cancelled')->sum('order_quantity');
            $order_quantity = cart::where('user_id', $id)->sum('order_quantity');
            return view('home.orderonline',compact('cart','order_quantity','order','activeorders','cancelledorders'));
        } else {
            
            return redirect()->route('login');
        }
        
    }   


      public function view_orders(){

            if(Auth::id()){
                $id=Auth::user()->id;
                $order=order::where('user_id','=',$id)->get();
                $totalorders = order::where('user_id', $id)->sum('order_quantity');
                return view('home.view_orders',compact('order','totalorders'));
            }else {
                 $notification = array(
                'message' => 'You must be logged in to place your order',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            }
        }


        public function cancel_order($id){
            $order=order::find($id);
            $order->order_status='Cancelled';
            $order->save();
            return redirect()->back();   
        }


        public function checkout(){

        if(Auth::id()){
            $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.orderonline',compact('cart'));
        } else {
            $notification = array(
            'message' => 'You must be logged in to place your order',
            'alert-type' => 'error'
            );
                return redirect()->back()->with($notification);
            }
        }  


    public function upload_QRPaymentRef(Request $request){
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $QR_order=new order;

            $QR_order->name=$data->name;
            $QR_order->email=$data->email;
            $QR_order->phone=$data->number;
            $QR_order->address=$data->address;
            $QR_order->user_id=$data->user_id;

            $QR_order->category_name=$data->category_name;
            $QR_order->product_name=$data->product_name;
            $QR_order->product_size=$data->product_size;
            $QR_order->price=$data->price;
            $QR_order->image=$data->image;
            $QR_order->order_quantity=$data->order_quantity;
            $QR_order->product_id=$data->product_id;

            $QRimage=$request->QRref_image;
            $QRimagename=time().'.'.$QRimage->getClientOriginalExtension();
            $request->QRref_image->move('QR_reference',$QRimagename);
            $QR_order->QR_reference=$QRimagename;

            $QR_order->payment_status='Awaiting QR Confirmation';
            $QR_order->order_status='Processing';
            $QR_order->delivery_mode=$request->delivery_mode;
            $QR_order->delivery_date=$request->delivery_date;
            $QR_order->delivery_time=$request->delivery_time;
            $QR_order->instructions=$request->instructions;

            $QR_order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
            }


            $notification = array(
            'message' => 'Your order has been submitted. You will receive a confirmation after 24hrs.',
            'alert-type' => 'success'
        );
            return redirect()->back()->with($notification);
    }
        



    public function delete_cartitem($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }



   public function cash_payment(Request $request){
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $cash_order=new order;

            $cash_order->name=$data->name;
            $cash_order->email=$data->email;
            $cash_order->phone=$data->number;
            $cash_order->address=$data->address;
            $cash_order->user_id=$data->user_id;

            $cash_order->category_name=$data->category_name;
            $cash_order->product_name=$data->product_name;
            $cash_order->product_size=$data->product_size;
            $cash_order->price=$data->price;
            $cash_order->order_quantity=$data->order_quantity;
            $cash_order->image=$data->image;
            $cash_order->product_id=$data->product_id;

            $cash_order->payment_status='COD';
            $cash_order->order_status='Processing';
            $cash_order->delivery_mode=$request->delivery_mode;
            $cash_order->delivery_date=$request->delivery_date;
            $cash_order->delivery_time=$request->delivery_time;
            $cash_order->instructions=$request->instructions;

            $cash_order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
            }


            $notification = array(
            'message' => 'Your order has been submitted. You will receive a confirmation after 24hrs.',
            'alert-type' => 'success'
        );
            return redirect()->back()->with($notification);
        }


        public function product_search(Request $request){
            $reviewComment=ReviewComment::all();
            $reviews=customerreview::all();
            $search_item=$request->search;
            $product=product::where('flavor','LIKE',"%$search_item%")->orWhere('category_name','LIKE',"%$search_item%")->paginate(6);
        
            return view('home.userpage',compact('product','reviews','reviewComment'));

        }

         public function menu_search(Request $request){
                $reviewComment=ReviewComment::all();
                $reviews=customerreview::all();
                $search_item=$request->search;
                $product=product::where('flavor','LIKE',"%$search_item%")->orWhere('category_name','LIKE',"%$search_item%")->paginate(6);
            
            if(Auth::id()){
                $userID = Auth::id();
                $order_quantity = cart::where('user_id', $userID)->sum('order_quantity');
                $price = cart::where('user_id', $userID)->sum('price');
                return view('home.menu',compact('product','reviews','reviewComment','order_quantity','price'));
            } else {
                $order_quantity = 0;
                $price = 0;

                return view('home.menu',compact('product','reviews','reviewComment','order_quantity','price'));
            }
        }



        public function add_review(Request $request){
            $reviews=customerreview::all();

            if(Auth::id()){

                $customerreview = new CustomerReview;

                $customerreview->name = Auth::user()->name;
                $customerreview->user_id = Auth::user()->id;
                $customerreview->review = $request->review;

                $customerreview->save();

                $notification = array(
                    'message' => 'You posted a review',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);

            } else {

                $customerreview = new CustomerReview;

                $customerreview->name = 'Guest';
                $customerreview->review = $request->review;

                $customerreview->save();

                $notification = array(
                    'message' => 'You posted a review',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);

            }
        
        }


        public function add_reply(Request $request){

            if(Auth::id()){
                $reviewComment=new reviewComment;
                $reviewComment->name=Auth::user()->name;
                $reviewComment->user_id=Auth::user()->id;
                $reviewComment->review_id=$request->reviewID;
                $reviewComment->comment=$request->reviewComment;

                $reviewComment->save();
                $notification = array(
                    'message' => 'You added a comment.',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);

            } else {
                $reviewComment=new reviewComment;
                $reviewComment->name='Guest';
                $reviewComment->review_id=$request->reviewID;
                $reviewComment->comment=$request->reviewComment;

                $reviewComment->save();
                $notification = array(
                    'message' => 'You added a comment.',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            }

        }


        public function contactus(Request $request){
            if(Auth::id()){

                $message=new message;
                $message->name=Auth::user()->name;
                $message->user_id=Auth::user()->id;
                $message->email=$request->contactus_email;
                $message->message=$request->contactus_message;

                $message->save();
                $notification = array(
                    'message' => 'Thank you for contacting us.',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            } else {
                $message=new message;
                $message->name='Guest';
                $message->email=$request->contactus_email;
                $message->message=$request->contactus_message;

                $message->save();
                $notification = array(
                    'message' => 'Thank you for contacting us.',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            }
        }

          public function about_us(){

        return view('home.about_us');
    }

}
