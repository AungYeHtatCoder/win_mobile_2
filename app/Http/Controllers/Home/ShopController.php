<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Accessory;
use App\Models\Admin\ProductPrice;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cart;
use Illuminate\Support\Facades\Auth;

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
        }elseif($request->color_id){
            $accessory = Accessory::where('color_id', $request->color_id)->first();
            Cart::create([
                'accessory_id' => $accessory->accessory_id,
                'color_id' => $request->color_id,
                'qty' => $request->qty,
                'unit_price' => $accessory->discount_price ? $accessory->discount_price : $accessory->normal_price,
                'user_id' => Auth::user()->id,
            ]);
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


}
