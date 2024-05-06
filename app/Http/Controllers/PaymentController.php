<?php
namespace App\Http\Controllers;
use Exception;
use Stripe\OAuth;
use Stripe\Charge;
use Stripe\Payout;
use Stripe\Stripe;
use Stripe\Account;
use App\Models\cart;
use Stripe\Customer;
use Illuminate\Http\Request;
use App\Models\RepairOrderDetails;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use HPWebdeveloper\LaravelPayPocket\Exceptions\InvalidDepositException;

class PaymentController extends Controller
{
    public function savePlan($id,$address_id)
    {
        $caftproducts = Cart::with('product')->where('user_id',auth()->user()->id)->get();

    $products=[];
        foreach($caftproducts as $cartItem){
            $products[]=[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $cartItem->product->price * 100, // Amount in cents
                    'product_data' => [
                        'name' => $cartItem->product->name,
                    ],
                ],
                'quantity' =>  $cartItem->quantity,
            ];
        }



    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Create a Stripe Checkout Session
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $products,
            'mode' => 'payment',
            'success_url' => url('stripe/success') . '/{CHECKOUT_SESSION_ID}?address_id='.$address_id,
            'cancel_url' => url('stripe/cancel'),

        ]);


        return redirect()->away($session->url);
    } catch (Exception $e) {
        // Handle any errors that occur during the creation of the Checkout Session
        return back()->with('error', $e->getMessage());
    }

}
public function savePlanRepair($id)
{

    $repairOrder =RepairOrderDetails::find($id);
    // dd($repairOrder);

$products=[];
    // foreach($caftproducts as $cartItem){
        $products[]=[
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => $repairOrder->price * 100,
                'product_data' => [
                    'name' => $repairOrder->device_code,
                ],
            ],
            'quantity' =>  1,
        ];
    // }
$store=$repairOrder->store->user;
    try{
        LaravelPayPocket::deposit($store, "Business", $repairOrder->price);

    }
    catch(InvalidDepositException $e)
    {
        return redirect()->back()->with('status', $e->getMessage());

    }





// dd(env('STRIPE_SECRET'));
// Stripe::setApiKey(env('STRIPE_SECRET'));
\Stripe\Stripe::setApiKey('sk_test_51NnfRsB1WzwNKaAfO1ngBOOZWeBDgxSrWOtqmqT3fRfG2zE5gFy1bvplU8MCmoKsgpJ4SEKTlDwLnJrd01hF8zNt00YBkr5tEE');

// try {
    // Create a Stripe Checkout Session
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $products,
        'mode' => 'payment',
        'success_url' => url('stripe/success') . '/{CHECKOUT_SESSION_ID}',
        'cancel_url' => url('stripe/cancel'),

    ]);


    return redirect()->away($session->url);
// } catch (Exception $e) {
//     // Handle any errors that occur during the creation of the Checkout Session
//     return back()->with('error', $e->getMessage());
// }
return "success";
}



public function connectToStripe()
{



    // try {
    //     $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    //     $account = $stripe->accounts->create([
    //         'type' => 'express', // Specify custom account type
    //         'country' => 'US', // Replace with user's country
    //         'email' => 'mhasnainjafri0099@gmail.com', // Replace with user's email
    //         'capabilities' => [
    //             'transfers' =>true, // Enable receiving transfers
    //             // Add other capabilities as needed (e.g., card_payments)
    //         ],
    //     ]);
    //  dd( $account);

    //     return response()->json(['message' => 'Stripe account created successfully!']);
    // } catch (\Stripe\Exception\StripeException $e) {
    //     return response()->json(['error' => $e->getMessage()], 500);
    // }


    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Retrieve the connected account ID (customer ID)
        $connectedAccountId = 'acct_1Ot2uQBHA0VYANiA'; // Replace this with your connected account ID

        // Create a payout to the connected account
       return $payout = Payout::create([
            'amount' => 10000, // Amount in cents (e.g., $100.00 is 10000)
            'currency' => 'usd',
            'destination' => $connectedAccountId, // Customer ID (connected account ID)
        ]);

        // Handle successful payout
        echo 'Payout successful! Payout ID: ' . $payout->id;
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Handle error
        echo 'Error: ' . $e->getMessage();
    }








die;









    $authorizeUrl = OAuth::authorizeUrl([
        'client_id' => 'acct_1Ot2uQBHA0VYANiA',
        'scope' => 'read_write',
    ]);
    return redirect()->away($authorizeUrl);
}



public function handleStripeCallback(Request $request)
{

    $response = OAuth::token([
        'grant_type' => 'authorization_code',
        'code' => $request->code,
    ]);
    $accessToken = $response->access_token;


    $user = auth()->user();
    $stripeCustomer = Customer::create([
        'email' => $user->email,
        'description' => 'Customer for ' . $user->email,
        'source' => $request->stripeToken,
    ]);


    $user->stripe_customer_id = $stripeCustomer->id;
    $user->save();

    return redirect()->route('home')->with('success', 'Stripe connected successfully!');
}
}



