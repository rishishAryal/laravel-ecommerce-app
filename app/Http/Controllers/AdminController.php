<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use PDF;
class AdminController extends Controller
{
    public function  view_category(){

        $categories = Category::all();

        return view('admin.category',compact('categories'));
    }

    public function  add_category(Request $request){




        $attributes= new Category();

        $attributes->category_name=$request->category;
        $attributes->save();

        return redirect()->back()->with('message','category added ');

    }

    public function delete_category($id){

        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully!!');
    }

    public function  view_product(){
        $categories= Category::all();
        return view('admin.product',compact('categories'));
    }

    public function add_product(Request $request){
        $product = new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image= $imagename;

        $product->save();
        return redirect()->back()->with('message','product added successfully');
    }
    public function show_product(){
        $products=Product::all();
        return view('admin.show_product',compact('products'));
    }
    public function delete_product($id){

        $category = Product::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully!!');
    }
    public function update_product($id){

        $categories= Category::all();
        $product=Product::find($id);
       return view('admin.update_product',compact('product','categories'));
    }
    public function update_product_confirm($id , Request $request){

        $product=Product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        if ($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image= $imagename;
        }

        $product->save();

        return redirect()->back()->with('message','Product Updated');
    }


    public function order(){
$orders = Order::all();

        return view('admin.order',compact('orders'));
    }

    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status = "Delivered";
        $order->payment_status= 'Paid';
        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id){
        $order=Order::find($id);
$pdf=PDF::loadView('admin.pdf',compact('order'));
return $pdf->download('order_details.pdf');

    }
    public function send_email($id){

    }
}
