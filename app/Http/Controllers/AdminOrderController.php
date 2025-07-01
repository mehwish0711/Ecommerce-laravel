<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Order;

class AdminOrderController extends Controller
{
    //
    public function index()
{
  
    $orders = Order::with('orderItems.product')->get();
    return view('admin-dashboard.adminorderindex', compact('orders'));
}
    public function show(Request $request ,string $id)
{
    // 
  
    $orderview = Order::with('frontenduser')->with('orderItems.product')->findOrFail($id);
    return view('admin-dashboard.orderview', compact('orderview'));
}
public function destroy($id)
{
    $order = Order::findOrFail($id);

    //  Delete related order items
    $order->orderItems()->delete();

    
    $order->delete();

    return redirect()->back()->with('success', 'Order deleted successfully.');
}

}
