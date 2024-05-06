<?php

namespace App\Http\Controllers;

use HPWebdeveloper\LaravelPayPocket\Exceptions\InsufficientBalanceException;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\cart;

class ShopController extends Controller
{
    //

    public function store($cart_item_id):RedirectResponse
    {
        $cartproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        try{

            // $products=[];
        foreach($cartproducts as $cartItem){

            LaravelPayPocket::pay(auth()->user(),(integer) $cartItem->product->price, $cartItem->name);
            $cartItem->delete();

        }

    }
        catch(InsufficientBalanceException $e)
        {
            return redirect()->back()->with('status', $e->getMessage());
        }


    return redirect()->back()->with('status', 'order paid successfully');

    }

}
