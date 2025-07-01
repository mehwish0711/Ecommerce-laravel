<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\FrontendUser;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user_id = Auth::guard('frontend')->id();
        $cart_items = Cart::where('user_id', $user_id)->with('product')->get();

        return view('cart', compact('cart_items'));
    }

   
    // public function addcart(Request $request)
    // {
    //     if (!Auth::guard('frontend')->check()) {
    //         return redirect()->back()->with('status', 'Please login first.');
    //     }

    //     $cart = new Cart;
    //     $cart->user_id = Auth::guard('frontend')->id();
    //     $cart->product_id = $request->product_id;
    //     $cart->quantity = $request->quantity;
    //     $cart->price = $request->price;
    //     $cart->save();

    //     $user_id = Auth::guard('frontend')->id();
    //     $cart_items = Cart::where('user_id', $user_id)->with('product')->get();

    //     return view('cart', compact('cart_items'))->with('status', 'Item added successfully');
    // }
public function addcart(Request $request,string $id)
{
    if (!Auth::guard('frontend')->check()) {
        return redirect()->back()->with('status', 'Please login first.');
    }

    $user_id = Auth::guard('frontend')->id();

  
    $existingCart = Cart::where('user_id', $user_id)
                        ->where('product_id', $request->product_id)
                        ->first();

    if ($existingCart) {
      
        $existingCart->quantity += $request->quantity;
        $existingCart->save();
    } else {
        
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->price;
        $cart->save();
    }

    // items fetch 
    $cart_items = Cart::where('user_id', $user_id)->with('product')->get();

    return view('cart', compact('cart_items'))->with('status', 'Item added successfully');
}

   
    public function updateCart(Request $request, string $id)
    {
        $tcart = Cart::findOrFail($id);

        if ($request->action == 'plus') {
            $tcart->quantity += 1;
        } elseif ($request->action == 'minus' && $tcart->quantity > 1) {
            $tcart->quantity -= 1;
        }

        $tcart->save();

       
        $user_id = Auth::guard('frontend')->id();
        $cart_items = Cart::where('user_id', $user_id)->with('product')->get();

        return view('cart', compact('cart_items'))->with('success', 'Cart updated');
    }
     public function destroy(string $id){
        $cart = Cart::findOrFail($id);
    $cart->delete();
    return redirect()->route('cart');
    }
}

