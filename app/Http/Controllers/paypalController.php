<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Omnipay\Omnipay;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\paypalPayment;
use App\Models\RepairOrderDetails;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use HPWebdeveloper\LaravelPayPocket\Exceptions\InvalidDepositException;

class paypalController extends Controller
{
    //

    public function __construct(){
        $this->gateway =Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);


    }

    public function pay()
    {
        $cartproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        // $products=[];
        // foreach($cartproducts as $cartItem){
        //     $products[]=[
        //         'price_data' => [
        //             'currency' => 'usd',
        //             'unit_amount' => $cartItem->product->price * 100, // Amount in cents
        //             'product_data' => [
        //                 'name' => $cartItem->product->name,
        //             ],
        //         ],
        //         'quantity' =>  $cartItem->quantity,
        //     ];
        // }
    $amount=0;
        foreach($cartproducts as $product){
            $amount  =$amount + ( $product->price * $product->quantity);

    }
        try{
            $cartproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();

            $response = $this->gateway->purchase(array(
                'amount' =>   $amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl'=> url('success'),
                'cancelUrl' => url('error')
            ))->send();



            if($response->isRedirect())
            {
                $response->redirect();
            }
            else{

                return $response->getMessage();
            }
        }

        catch(\Throwable $th)
        {
            return $th->getMessage();
        }
    }


    public function payRepair($id)
    {
        $Repair_orderDetails =RepairOrderDetails::find($id);

        // $products=[];
        // foreach($cartproducts as $cartItem){
        //     $products[]=[
        //         'price_data' => [
        //             'currency' => 'usd',
        //             'unit_amount' => $cartItem->product->price * 100, // Amount in cents
        //             'product_data' => [
        //                 'name' => $cartItem->product->name,
        //             ],
        //         ],
        //         'quantity' =>  $cartItem->quantity,
        //     ];
        // }
    $amount=$Repair_orderDetails->price;
        try{
            // $cartproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();

            $response = $this->gateway->purchase(array(
                'amount' =>   $amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl'=> url('success'),
                'cancelUrl' => url('error')
            ))->send();

            $store=$Repair_orderDetails->store->user;
            try{
                LaravelPayPocket::deposit($store, "Business",  $amount);

            }
            catch(InvalidDepositException $e)
            {
                return redirect()->back()->with('status', $e->getMessage());

            }


            if($response->isRedirect())
            {
                $response->redirect();
            }
            else{

                return $response->getMessage();
            }
        }

        catch(\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction =$this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            $response =$transaction->send();

            if($response->isSuccessful()){
                $arr=$response->getData();
                $payment =new paypalPayment;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();
                $lineItems = Cart::where('user_id', auth()->user()->id)->get();
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
                return redirect()->route('paypalSucess', ['transactionId' => $arr['id']]);

                // return "payment is successfull, Your transaction is". $arr['id'];

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return "payment declined !";
        }
    }



public function error()
{
    return "user declined the payment";
}

public function showPaypal($cart_item_id)
{ $cartproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();
    // dd($cartproducts);
    $cart=Cart::find($cart_item_id);
    return view('userPages.paypal',compact('cart','cartproducts'));
}
public function showPaypalRepair($id)
{  $repairOrder =RepairOrderDetails::find($id);


    return view('userPages.paypalRepair',compact('repairOrder'));
}

public function paypalSucess($transactionId)
{
    return view('userPages.paypalSuccess', ['transactionId' => $transactionId]);
}

}


