<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
   
    public function stripe(Request $request)
    {

    return view('stripe', [
        'bill' => $request->bill,
        'full_name' => $request->full_name,
        'address' => $request->address,
        'phone' => $request->phone,
    ]);    }

  public function stripePost(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        //  Charge the user's card
        $charge = Charge::create([
            "amount" => $request->bill * 100, // Stripe needs amount in cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment by " . $request->full_name,
        ]);

        // Create new order
        $order = new Order();
        $order->customer_id = Auth::guard('frontend')->id();
        $order->status = 'Paid';
        $order->bill = $request->bill;
        $order->fullname = $request->full_name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->save();

        $cartItems = Cart::where('user_id', Auth::guard('frontend')->id())->get();

        foreach ($cartItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->save();
        }

        // Clear  user's cart
        Cart::where('user_id', Auth::guard('frontend')->id())->delete();

      
        Session::flash('success', 'Payment successful! Your order has been placed.');
        return redirect()->route('thankyou');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
    }
}
}