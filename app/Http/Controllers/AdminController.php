<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class AdminController extends Controller
{
    public function  view_category(){

       return view('admin.category');
    }
    public function  add_category(Request $request){




        $attributes= new Category();

        $attributes->category_name=$request->category;
        $attributes->save();

        return redirect()->back()->with('message','category added ');

    }
}
