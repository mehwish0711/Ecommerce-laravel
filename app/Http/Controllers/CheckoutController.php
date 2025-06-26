<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        if (Auth::guard('frontend')->check()) {

            $order = new Order;
            $order->customer_id = Auth::guard('frontend')->id();
            $order->status = "Pending";
            $order->bill = $request->bill;
            $order->fullname = $request->full_name;
            $order->address = $request->address;
            $order->phone = $request->phone;

            if ($order->save()) {
               
                $carts = Cart::where('user_id', Auth::guard('frontend')->id())->get();

               
                foreach ($carts as $cart) {
                    $orderItem = new OrderItem;
                    $orderItem->product_id = $cart->product_id;
                    $orderItem->quantity = $cart->quantity;
                    $orderItem->price = $cart->price;
                    $orderItem->order_id = $order->id;
                    $orderItem->save();
                }

               
                Cart::where('user_id', Auth::guard('frontend')->id())->delete();

               
                return redirect()->route('thankyou')->with('status', 'Order placed successfully!');
            }
        }
    }
}
