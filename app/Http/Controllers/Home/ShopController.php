<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(){
        return view('shop');
    }

    public function productDetail(){
        return view('product_details');
    }
}
