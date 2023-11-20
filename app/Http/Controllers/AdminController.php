<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use Auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerReview;
use App\Models\ReviewComment;
use App\Models\Message;


class AdminController extends Controller
{
    public function view_category(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }
        $data=ProductCategory::latest()->get();
        return view('admin.view_category',compact('data'));
    }

    public function add_category(Request $request){

        $data = new ProductCategory;
        $data->category_name = $request->category;
        $data->save();

        $notification = array(
            'message' => 'Category Added',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function delete_category($id){
        $data=ProductCategory::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function edit_category($id){
        $data=ProductCategory::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function modify_category(Request $request,$id){
       $data=ProductCategory::find($id);
       $data->category_name=$request->category;
       $data->save();
        return redirect()->route('view_category')->with('message','Category Updated');
    }

    public function new_product(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $ProductCategory=ProductCategory::all();

        $product=product::latest()->paginate(15);
        return view('admin.new_product',compact('ProductCategory','product'));
    }

    public function add_product(Request $request){
        $product=new product;

        $product->category_name=$request->product_category;
        $product->flavor=$request->flavor;
        $product->size=$request->size;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();;
        return redirect()->back()->with('message','New Product Added ');
    }

    public function show_product(){
        $product=product::latest()->paginate(15);
        return view('admin.show_product', compact('product'));
    }

    public function ProductSummary(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }
        $product=product::latest()->paginate(20);
        $total_products=product::all()->count();
        $unavailable = product::onlyTrashed()->latest()->paginate(15);
        return view('admin_dash.product_summary',compact('product','unavailable','total_products'));
   
    }

    public function update_product($id){
        $product=product::find($id);
        $ProductCategory=ProductCategory::all();
        return view('admin.update_product',compact('product','ProductCategory'));
    }

    public function update_product_confirm(Request $request, $id){
        $product=product::find($id);

        $product->category_name=$request->product_category;
        $product->flavor=$request->flavor;
        $product->size=$request->size;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        
        $image=$request->image;
        if($request->hasFile('image')){
            @unlink('product/'.$product->image);
            
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }

        $product->save();;
        return redirect()->route('product_summary')->with('message','Item Updated');
    }

    public function delete_item($id){
        $data=product::find($id);
        $data->forcedelete();

        @unlink('product/'.$data->image);
        return redirect()->back(); 
    }


     public function UnavailableProducts(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $unavailable = product::onlyTrashed()->latest()->paginate(15);
        return view('admin.unavailable_products', compact('unavailable'));
    }

    public function unavailable($id){

        $delete = product::find($id)->delete();
        return redirect()->back()->with('message','Product is Unavailable');

    }
    public function restore($id){
        $unavailable = product::withTrashed()->find($id)->restore();
        return redirect()->route('product_summary')->with('message','Product restored');

    }

    public function forcedelete($id){
        $forcedelete = product::onlyTrashed()->find($id)->forceDelete();
        @unlink('product/'.$forcedelete->image);
        return redirect()->back()->with('message','Product deleted');

    }


  
    public function OrderSummary(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $order=order::all();
        $totalOrders = order::sum('order_quantity');
        $delivered = order::where('order_status', 'Delivered')->sum('order_quantity');
        $pending = order::where('order_status', 'Processing')->sum('order_quantity');
        $total_cancelled=order::where('order_status','=','cancelled')->get()->count();

        return view('admin_dash.order_summary',compact('order','totalOrders','delivered','pending','total_cancelled'));
    }

    public function order_search(Request $request){

        $totalOrders = order::sum('order_quantity');
        $delivered = order::where('order_status', 'Delivered')->sum('order_quantity');
        $pending = order::where('order_status', 'Processing')->sum('order_quantity');
        $total_cancelled=order::where('order_status','=','cancelled')->get()->count();

        $ordersearch=$request->search;
        $order=order::where('name','LIKE',"%$ordersearch%")->orWhere('product_name','LIKE',"%$ordersearch%")->orWhere('payment_status','LIKE',"%$ordersearch%")->orWhere('order_status','LIKE',"%$ordersearch%")->orWhere('delivery_mode','LIKE',"%$ordersearch%")->orWhere('address','LIKE',"%$ordersearch%")->get();
        return view('admin_dash.order_summary',compact('order','totalOrders','delivered','pending','total_cancelled'));
    }



    public function order_ready($id){
        $order=order::find($id);
        $order->order_status="Order is Ready";
        $order->save();
        return redirect()->back();
    }


     public function qr_payments(){
        $pendingQRs = order::where('payment_status','Awaiting QR Confirmation')->sum('order_quantity');
        $qrpayments=order::latest()->get();
        return view('admin_dash.qr_payments', compact('qrpayments','pendingQRs'));
    }

    public function qr_details($id){
        $order=order::all();
        $qrdetails=order::find($id);
        return view('admin_dash.qr_details', compact('order','qrdetails'));
    }

    public function verify_QRref($id){
        $order=order::find($id);
        $order->payment_status="QR verified";
        $order->save();
        return redirect()->route('order_summary')->with('message','Payment has been verified');
    }

    public function ordercomplete($id){
        $order=order::find($id);
        $order->order_status="Delivered";
        $order->save();
        return redirect()->back();
    }


    public function order_pending(Request $request){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $orders=order::all();
        $pending = order::where('order_status','Processing')->sum('order_quantity');

        $ordersearch=$request->search;
        $order=order::where('name','LIKE',"%$ordersearch%")->orWhere('product_name','LIKE',"%$ordersearch%")->orWhere('payment_status','LIKE',"%$ordersearch%")->orWhere('order_status','LIKE',"%$ordersearch%")->orWhere('delivery_mode','LIKE',"%$ordersearch%")->orWhere('address','LIKE',"%$ordersearch%")->get();
        return view('admin_dash.order_pending',compact('orders','pending','order'));;
    }

     public function orderdelivered(Request $request){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $orders=order::all();
        $delivered = order::where('order_status', 'Delivered')->latest('updated_at')->sum('order_quantity');

        $ordersearch=$request->search;
        $order=order::where('name','LIKE',"%$ordersearch%")->orWhere('product_name','LIKE',"%$ordersearch%")->orWhere('payment_status','LIKE',"%$ordersearch%")->orWhere('order_status','LIKE',"%$ordersearch%")->orWhere('delivery_mode','LIKE',"%$ordersearch%")->orWhere('address','LIKE',"%$ordersearch%")->get();
        return view('admin_dash.orderdelivered',compact('orders','delivered','order'));
    }

     public function cancelled_orders(Request $request){
        // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login'); // Redirect to the login page
        }   
        $orders=order::all();
        $total_cancelled=order::where('order_status','=','cancelled')->get()->count();

        $ordersearch=$request->search;
        $order=order::where('name','LIKE',"%$ordersearch%")->orWhere('product_name','LIKE',"%$ordersearch%")->orWhere('payment_status','LIKE',"%$ordersearch%")->orWhere('order_status','LIKE',"%$ordersearch%")->orWhere('delivery_mode','LIKE',"%$ordersearch%")->orWhere('address','LIKE',"%$ordersearch%")->get();
        return view('admin_dash.orders_cancelled',compact('orders','total_cancelled','order'));
    }


     public function cancelOrder($id){
        $orders=order::find($id);
        $orders->order_status='Cancelled';
        $orders->payment_status='';
        @unlink('QR_reference/'.$orders->QR_reference);
        $orders->save();

        $notification = array(
        'message' => 'Order has been cancelled',
        'alert-type' => 'info'
    );
        return redirect()->back()->with($notification);

    }

       public function remove_cancelled($id){
        $order=order::find($id);
        $order->delete();
        return redirect()->back();
    }



    public function customers_list(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   

        $user = User::all();
        $userOrders=order::all();
        return view('admin_dash.customers_list',compact('user','userOrders'));
    }

    public function user_search(Request $request){

        $usersearch=$request->search;
        $user=user::where('name','LIKE',"%$usersearch%")->orWhere('email','LIKE',"%$usersearch%")->orWhere('phone','LIKE',"%$usersearch%")->orWhere('address','LIKE',"%$usersearch%")->get();
        return view('admin_dash.customers_list',compact('user'));
    }



    public function customer_reviews(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   

        $custreviews=customerreview::orderby('created_at','desc')->get();
        return view('admin_dash.customer_reviews',compact('custreviews'));
    }

   public function delete_review($id){

        $custreviews=customerreview::find($id);
        $custreviews->delete();
        return redirect()->back();
    }

    public function review_comments(){
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login'); // Redirect to the login page
    }   

    $comments=ReviewComment::orderby('created_at','desc')->get();
    return view('admin_dash.review_comments',compact('comments'));
    }


   public function delete_comment($id){

    $comments=ReviewComment::find($id);
    $comments->delete();
    return redirect()->back();
    }


    public function customer_messages(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $custmessages=message::orderby('created_at','desc')->get();
        return view('admin_dash.customer_messages',compact('custmessages'));
    }

   public function delete_message($id){

    $custmessages=message::find($id);
    $custmessages->delete();
    return redirect()->back();
    }



    public function google_maps(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        return view('admin_dash.maps');
    }





    public function AdminLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }


    public function UserProfile(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $adminData = User::find(1);
        return view('admin_dash.admin_profile',compact('adminData'));
    }

    public function UserProfileUpdate(Request $request){
        $data = User::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink('upload/'.$data->profile_photo_path);
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('upload',$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        return redirect()->route('userprofile');
    }


    public function ChangePassword(){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page
        }   
        $adminData = User::find(1);
        return view('admin_dash.change_pass',compact('adminData'));
    }

    public function ChangePasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);  
        $hashedPassword = User::find(1)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(1);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.logout');

        }
        else {
            return redirect()->back();
        }
    }


  


}
