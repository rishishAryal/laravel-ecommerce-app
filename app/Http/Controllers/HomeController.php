<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
class HomeController extends Controller
{
    //
    public function index(){
        $products=Product::paginate(10);
        return view('home.userpage',compact('products'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype ==='1'){
            return view('admin.home');
        } else
        {
            $products=Product::paginate(10);
            return view('home.userpage',compact('products'));        }
    }

}
