<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Accessory;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $banners = Banner::latest()->get();
        $accessories = Accessory::latest()->take(6)->get();
        $products = Product::with('product_prices')->latest()->get();
        $available_accessories = Accessory::all();
        // return $products;
        return view('index', compact('categories', 'banners', 'accessories', 'products', 'available_accessories'));
    }

    public function contact(){
        return view('contact');
    }


}
