<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class MenuController extends Controller
{
    public function menu(){
        $product=product::latest()->paginate(9);
        return view('home.menu',compact('product'));
    }

    
    public function add_cart(Request $request,$id){
        $product=product::find($id);
       

        if(Auth::id()){

            $user=Auth::user();
            $products=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->number=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_name=$products->flavor . ' ' . $products->category_name;

            if($products->discount_price!=null){
                $cart->price=$products->price * $request->quantity - $products->discount_price * $request->quantity;
            } else {
                $cart->price=$products->price;
            }

            $cart->image=$products->image;
            $cart->product_id=$products->id;
            $cart->order_quantity=$request->quantity;
            
            $cart->save();
            return redirect()->back();

        } else {
            return redirect('login');
        }




    }

}
