<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //

    public function cancelOrder(Order $order)
    {
        // $order=Order::find($order);
        // $order->delete();
        $order->status="order_canceled";
        $order->save();
        Session::flash('success', 'Order canceled successfully.');

        return redirect()->back();
    }
}
