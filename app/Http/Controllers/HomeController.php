<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    //
    public function index(){
        $products=Product::paginate(10);
        $comments=Comment::orderby('id','desc')->get();
        $replys=Reply::all();

        return view('home.userpage',compact('products','comments','replys'));

    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype ==='1'){
            $total_products= Product::all()->count();
            $total_orders= Order::all()->count();
            $total_users=User::all()->count();
            $total_revenue = Order::sum('price');
            $total_delivered=Order::where('delivery_status','=','Delivered')->get()->count();
            $order_processing=Order::where('delivery_status','=','processing')->get()->count();
            $cancelled_order=Order::where('delivery_status','=','Order Cancelled')->get()->count();
            return view('admin.home',
                compact('total_products','total_orders','total_users','total_revenue','total_delivered','order_processing','cancelled_order'));
        } else
        {
            $products=Product::paginate(10);
            $comments=Comment::orderby('id','desc')->get();
            $replys=Reply::all();

            return view('home.userpage',compact('products','comments','replys'));        }
    }
    public function product_details ($id){
        $product = Product::find($id);
        return view('home.product_details',compact('product'));



    }

    public function add_cart(Request $request,$id){

        if(Auth::id()){


            $user= Auth::user();
            $product=Product::find($id);
            $cart=new Cart();

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            $cart->price=($product->price-$product->discount_price)*$request->quantity;
            $cart->product_id=$product->id;
            $cart->image=$product->image;

            $cart->quantity=$request->quantity;
            $cart->save();

            return  redirect()->back();
        }
        else {
            return redirect('login');
        }
    }
    public function show_cart(){

        if(Auth::id()){
            $id= Auth::User()->id;

            $carts =Cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('carts'));
        } else {
            return redirect('login');
        }



    }
    public function  delete_cart ($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', ' Cart product  Deleted Successfully!!');
    }
    public function cash_order(){
        $user= Auth::User();
        $userId =$user->id;
        $cartDatas=Cart:: where('user_id','=',$userId)->get();
        foreach ($cartDatas as $cartData )
        {
            $order = new Order();
            $order->name=$cartData->name;
            $order->phone=$cartData->phone;
            $order->email=$cartData->email;
            $order->address=$cartData->address;
            $order->user_id=$cartData->user_id;

            $order->product_title=$cartData->product_title;
            $order->price=$cartData->price;
            $order->quantity=$cartData->quantity;
            $order->image=$cartData->image;
            $order->product_id=$cartData->product_id;

            $order->payment_status='Cash On Delivery';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$cartData->id;
            $cart=Cart::find($cart_id);
            $cart->delete();


        }
        return redirect()->back()->with('message','Order Placed! Keep Shopping (:');

    }

    public function stripe($totalPrice){
        return view('home.stripe',compact('totalPrice'));
    }
    public function stripePost(Request $request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment"
        ]);

        $user= Auth::User();
        $userId =$user->id;
        $cartDatas=Cart::where('user_id','=',$userId)->get();
        foreach ($cartDatas as $cartData )
        {
            $order = new Order();
            $order->name=$cartData->name;
            $order->phone=$cartData->phone;
            $order->email=$cartData->email;
            $order->address=$cartData->address;
            $order->user_id=$cartData->user_id;

            $order->product_title=$cartData->product_title;
            $order->price=$cartData->price;
            $order->quantity=$cartData->quantity;
            $order->image=$cartData->image;
            $order->product_id=$cartData->product_id;

            $order->payment_status='Paid Using Card';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$cartData->id;
            $cart=Cart::find($cart_id);
            $cart->delete();


        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function show_order(){

         if(Auth::id()){
             $user=Auth::user();
             $id=$user->id;
             $orders = Order::where('user_id','=',$id)->get();

             return view('home.order',compact('orders'));
            }
        else {
                 return redirect('login');
        }


    }
    public function cancel_order($id)
    {
    $order=Order::find($id);
    $order->delivery_status="Order Cancelled";
    $order->save();
    return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if (Auth::id()) {

            $comment = new Comment();
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;

            $comment->save();
            return redirect()->back();


        } else {
            return redirect('login');
        }
    }

    public function add_reply(Request $request){
        if(Auth::id()){
        $reply = new Reply();

        $reply->name= Auth::user()->name;
        $reply->user_id= Auth::user()->id;
        $reply->name= Auth::user()->name;
        $reply->comment_id= $request->commentId;
        $reply->reply= $request->reply;
        $reply->save();
        return  redirect()->back();

        }
        else{
            return redirect('login');
        }
    }


}
