<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\CustomerReview;
use App\Models\ReviewComment;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

            $totalreviews=customerreview::all()->count();
            $totalmessages=message::all()->count();
            $reviewComment=ReviewComment::all();
            $custreviews=customerreview::latest()->paginate(7);
            $reviews=customerreview::orderby('created_at','desc')->get();
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
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/orderonline',[HomeController::class,'orderonline']);
route::get('/view_orders',[HomeController::class,'view_orders']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
route::post('/upload_QRPaymentRef',[HomeController::class,'upload_QRPaymentRef']);

route::get('/menu',[HomeController::class,'menu']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/delete_cartitem/{id}',[HomeController::class,'delete_cartitem']);
route::post('/cash_payment',[HomeController::class,'cash_payment']);
route::get('/checkout',[HomeController::class,'checkout']);
route::get('/product_search',[HomeController::class,'product_search']);
route::post('/add_review',[HomeController::class,'add_review']);
route::post('/add_reply',[HomeController::class,'add_reply']);
route::post('/contactus',[HomeController::class,'contactus']);
route::get('/about_us',[HomeController::class,'about_us']);
route::get('/menu_search',[HomeController::class,'menu_search']);



route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
route::get('/edit_category/{id}',[AdminController::class,'edit_category']);
route::post('/modify_category/{id}',[AdminController::class,'modify_category']);

route::get('/product_summary',[AdminController::class,'ProductSummary'])->name('product_summary');
route::get('/new_product',[AdminController::class,'new_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/show_product',[AdminController::class,'show_product'])->name('all.product');
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);
route::get('/delete_item/{id}',[AdminController::class,'delete_item']);
route::get('/product_unavailable',[AdminController::class,'UnavailableProducts']);
route::get('products/unavailable/{id}', [AdminController::class,'unavailable']);
route::get('products/restore/{id}', [AdminController::class,'restore']);
route::get('products/delete/{id}', [AdminController::class,'forcedelete']);
route::get('/order_summary', [AdminController::class,'OrderSummary'])->name('order_summary');
route::get('/order_search', [AdminController::class,'order_search']);
route::get('/order_ready/{id}', [AdminController::class,'order_ready']);
route::get('/order_pending', [AdminController::class,'order_pending']);
route::get('/orderdelivered', [AdminController::class,'orderdelivered']);
route::get('/cancelled_orders', [AdminController::class,'cancelled_orders']);
route::get('cancelOrder/{id}', [AdminController::class,'cancelOrder']);
route::get('remove_cancelled/{id}', [AdminController::class,'remove_cancelled']);
route::get('/qr_payments', [AdminController::class,'qr_payments']);
route::get('/qr_details/{id}', [AdminController::class,'qr_details']);
route::get('/verify_QRref/{id}', [AdminController::class,'verify_QRref']);
route::get('/ordercomplete/{id}', [AdminController::class,'ordercomplete']);


route::get('/customers_list', [AdminController::class,'customers_list']);
route::get('/user_search', [AdminController::class,'user_search']);
route::get('/customer_reviews', [AdminController::class,'customer_reviews']);
route::get('/review_comments', [AdminController::class,'review_comments']);
route::get('/customer_messages', [AdminController::class,'customer_messages']);
route::get('/delete_review/{id}',[AdminController::class,'delete_review']);
route::get('/delete_comment/{id}',[AdminController::class,'delete_comment']);
route::get('/delete_message/{id}',[AdminController::class,'delete_message']);

route::get('/google_maps', [AdminController::class,'google_maps']);


route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
route::get('/profile/user',[AdminController::class,'UserProfile'])->name('userprofile');
route::post('/profile/user/update',[AdminController::class,'UserProfileUpdate'])->name('user.profile.update');
route::get('/profile/change_password',[AdminController::class,'ChangePassword'])->name('changepassword');
route::post('/profile/change_password/update',[AdminController::class,'ChangePasswordUpdate'])->name('password.change.confirm');