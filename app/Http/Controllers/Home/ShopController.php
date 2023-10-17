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
use App\Models\Admin\Order;
use App\Models\Admin\OrderedProduct;
use App\Models\User;
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

    public function checkout(){
        return view('checkout');
    }

    public function deliveryInfo(Request $request){
        $request->validate([
            'phone' => 'required',
            'address' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $user->update([
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->back()->with('success', "Delivery Info Added.");
    }

    public function order(Request $request){
        if(Auth::user()->phone && Auth::user()->address){
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            // return $request->payment_method;

            $request->validate([
                'payment_method' => 'required'
            ]);

            if($request->file('payment_photo')){
                // image
                $image = $request->file('payment_photo');
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid('payment') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/payments/'), $filename); // Save the file
            }else{
                $filename = NULL;
            }

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'payment_method' => $request->payment_method,
                'payment_photo' => $filename,
            ]);

            foreach($carts as $cart){
                if($cart->product_id){
                    OrderedProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $cart->product_id ?? "",
                        'color_id' => $cart->color_id,
                        'product_prices_id' => $cart->product_prices_id ?? "",
                        'qty' => $cart->qty,
                        'unit_price' => $cart->unit_price,
                        'total_price' => $cart->qty * $cart->unit_price,
                    ]);

                    $reducedQty = ProductPrice::find($cart->product_prices_id);
                    $reducedQty->update([ 'qty' => $reducedQty->qty - $cart->qty ]);

                }else{
                    OrderedProduct::create([
                        'order_id' => $order->id,
                        'accessory_id' => $cart->accessory_id ?? "",
                        'color_id' => $cart->color_id,
                        'qty' => $cart->qty,
                        'unit_price' => $cart->unit_price,
                        'total_price' => $cart->qty * $cart->unit_price,
                    ]);
                    
                }
            }
            // Fetch the sub_total directly from the database query
            $subTotal = OrderedProduct::where('order_id', $order->id)->sum('total_price');
            // return $subTotal;

            // Update the sub_total in the orders table
            Order::where('id', $order->id)->update(['sub_total' => $subTotal]);


            $carts->each->delete();
            return redirect()->back()->with('success', "Ordered Successfully.");
        }else{
            return redirect()->back()->with('error', "Please Fill Delivery Information First.");
        }
    }

    public function orderHistory(){
        $orders = OrderedProduct::all();
        return view('/order_history', compact('orders'));
    }

    public function orderDetail($id){
        $details = OrderedProduct::find($id);
        // return $details;
        return view('/order_detail', compact('details'));
    }


}