<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Accessory;
use App\Models\Admin\ProductPrice;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(){
        $products = Product::all();
        $accessories = Accessory::all();
        $mergedProducts = $accessories->concat($products)->sortBy('name');

        // return $mergedProducts;
        return view('shop', compact('mergedProducts'));
    }

    public function brandfilter($id) {    
        $mergedProducts = Product::where('brand_id', $id)->get();
        // return $mergedProducts;
        return view('shop', compact('mergedProducts'));
    }


    public function product_detail($id){
        $accessory = Accessory::find($id);
        $product = Product::find($id);
        $prices = ProductPrice::where('product_id', $id)->get();

        //  return $prices;
        return view('product_detail', compact('product', 'accessory', 'prices'));
    }
}