<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{

    public function user(){
        $data=user::all();
        return view('admin.user', compact('data'));
    }

    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function deleteproduct($id){
        $data=product::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function product(){
        $data = product::all();
        return view('admin.product', compact('data'));
    }

    public function uploadproduct(Request $request){
        $data = new product;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage',$imagename);
            $data->image=$imagename;

        $data->title=$request->title;
        $data->recipe=$request->recipe;
        $data->price=$request->price;
        $data->save();
        return redirect()->back();
    }
}
