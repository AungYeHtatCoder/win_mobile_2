<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\OrderedProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending(){
        $orders = Order::where('status', 'pending')->latest()->get();
        $status = "Pending Orders";
        return view('admin.orders.orders', compact('orders', 'status'));
    }

    public function delivering(){
        $orders = Order::where('status', 'delivering')->latest()->get();
        $status = "Delivering Orders";
        return view('admin.orders.orders', compact('orders', 'status'));
    }

    public function completed(){
        $orders = Order::where('status', 'completed')->latest()->get();
        $status = "Completed Orders";
        return view('admin.orders.orders', compact('orders', 'status'));
    }

    public function detail($id){
        $orderProducts = OrderedProduct::where('order_id', $id)->latest()->get();
        $order = Order::find($id);
        return view('admin.orders.orderDetail', compact('orderProducts', 'order'));
    }

    public function status(Request $request, $id){
        $order = Order::find($id);
        $order->update([
            'status' => $request->status
        ]);
        // return $request->status;
        return redirect()->back()->with('success', "Order Status Changed.");
    }
}
