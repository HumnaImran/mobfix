<?php

namespace App\Http\Controllers;
use Exception;
use Stripe\Stripe;

use App\Models\cart;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //


    public function addToCart(Product $product, Request $request)
{

    $user = auth()->user();
    $quantity = request('quantity', 1);

    $cartItem = Cart::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();

    if ($cartItem) {

        $cartItem->increment('quantity');
    } else {
        // If the product is not in the cart, add a new entry
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
    }

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}


public function updateQuantity(Request $request)
{



    $cartItemId = $request->input('cart_item_id');

    $newQuantity = $request->input('quantity');


    $cartItem = Cart::find($cartItemId);

    if ($cartItem) {
        $cartItem->quantity = $newQuantity;


        $product = Product::find($cartItem->product_id);

        $cartItem->price = $product->price * $newQuantity;

        $cartItem->save();

        return response()->json(['success' => true, 'message' => 'Quantity and total price updated successfully']);
    } else {

        return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
    }
}

    public function handleSuccess(Request $request, $sessionId)
    {


        Stripe::setApiKey(env('STRIPE_SECRET'));
          $session = \Stripe\Checkout\Session::retrieve($sessionId);
// return $session['payment_intent'];
// return $session['status'];
// if($session['status']=='')
        try {

            $lineItems = Cart::where('user_id', auth()->user()->id)->get();
            $addressId = Auth::user()->address->id;

            foreach ($lineItems as $item) {



                Order::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->product->id,
                    'store_id' => 1,
                    'user_address_id' => $request->address_id,
                    'quantity' => $item->quantity,
                    'status' => 'order_placed',
                    'price' => $item->product->price * $item->quantity,
                ]);


                $item->delete();
            }
            return Redirect::route('orderBooked');

        } catch (Exception $e) {
dd($e);
            return back()->with('error', $e->getMessage());
        }
    }



}
