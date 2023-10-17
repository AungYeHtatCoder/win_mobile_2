<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin\Cart;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Accessory;
use App\Models\Admin\ProductPrice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function shop(){
        $products = Product::all();
        $accessories = Accessory::all();
        $mergedProducts = $accessories->concat($products)->sortBy('name');
        $filterName = 'ALL PRODUCT';
        
        // return $mergedProducts;
        return view('shop', compact('mergedProducts', 'filterName'));
    }

    public function brandfilter(Request $request,$id) {
        $products = Product::all();
        $accessories = Accessory::all();
        $mergedProducts = $accessories->concat($products)->filter(function ($product) use ($id) {
            return $product->brand_id == $id;
        })->sortBy('name');
        $filter = Brand::find($id);
        $filterName = $filter->name;
    return view('shop', compact('mergedProducts', 'filterName'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $products = Product::where('name', 'like', "%$searchQuery%")->get();
        $accessories = Accessory::where('name', 'like', "%$searchQuery%")->get();
        $mergedProducts = $accessories->concat($products)->sortBy('name');
        $filterName = "";
        return view('shop', compact('mergedProducts', 'filterName'));
    }

    public function accessorycategory($id) {
        $mergedProducts = Accessory::where('category_id', $id)->get();
        // return $mergedProducts;
        return view('shop', compact('mergedProducts'));
    }

    public function accessorybrand($id) {
        $mergedProducts = Accessory::where('brand_id', $id)->get();
        // return $mergedProducts;
        return view('shop', compact('mergedProducts'));
    }

    public function product_detail($id){
        // $accessory = Accessory::find($id);
        $product = Product::find($id);
        $prices = ProductPrice::where('product_id', $id)->get();

        //  return $prices;
        return view('product_detail', compact('product', 'prices'));
    }

    public function accessory_detail($id){
        $accessory = Accessory::find($id);
        return view('accessory_detail', compact('accessory'));
    }

    public function addToCart(Request $request){
        if($request->product_prices_id){
            $price = ProductPrice::find($request->product_prices_id);
            $cart = Cart::where('product_prices_id', $request->product_prices_id)->first();
            if($cart){
                return redirect()->back()->with('error', "Already in cart.");
            }
            Cart::create([
                'product_id' => $price->product_id,
                'color_id' => $price->color_id,
                'product_prices_id' => $price->id,
                'qty' => $request->qty,
                'unit_price' => $price->discount_price ? $price->discount_price : $price->normal_price,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->back()->with('success', "Cart Added.");
        }elseif($request->accessory_id){
            // return $request->all();
            $accessory = Accessory::with(['colors' => function($query) use ($request) {
                $query->where('color_id', $request->color_id);
            }])->find($request->accessory_id);

            $price = $accessory->colors->first()->pivot->price;

            $cart = Cart::where('accessory_id', $request->accessory_id)->where('color_id', $request->color_id)->first();
            if($cart){
                return redirect()->back()->with('error', "Already in cart.");
            }

            // return $accessory;

            $cart = Cart::create([
                'accessory_id' => $request->accessory_id,
                'color_id' => $request->color_id,
                'qty' => $request->qty,
                'unit_price' => $accessory->colors[0]->pivot->discount_price ? $accessory->colors[0]->pivot->discount_price : $accessory->colors[0]->pivot->normal_price,
                'user_id' => Auth::user()->id,
            ]);
            // return $cart;
            return redirect()->back()->with('success', "Cart Added.");
        }
    }

    public function cart(){
            return view('my_cart');
    }

    public function cartDelete($id){
        $cart = Cart::find($id);
        if(!$cart){
            return redirect()->back()->with('error', 'Cart Not Found!');
        }
        $cart->delete();
        return redirect()->back()->with('success', "Cart Removed");
    }

    public function cartUpdate(Request $request, $id){
        $request->validate([
            'qty' => 'required'
        ]);
        $cart = Cart::find($id);
        if(!$cart){
            return redirect()->back()->with('error', 'Cart Not Found!');
        }
        $cart->update([
            'qty' => $request->qty
        ]);
        return redirect()->back()->with('success', "Cart Updated");
    }

    public function checkoutlist(){
        
    }


}