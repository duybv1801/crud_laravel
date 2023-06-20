<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $data=product::all();
        return view('home',compact('data'));
    }

    public function redirects() {
        $data=product::all();
        $usertype= Auth::user()->usertype;

        if($usertype==1) {
            return view('admin.adminhome');
        }
        else {
            return view('home',compact('data'));
        }
    }
}
