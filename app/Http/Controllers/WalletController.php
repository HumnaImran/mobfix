<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Payout;
use Stripe\Stripe;
use Stripe\Webhook;
use Omnipay\Omnipay;
use Stripe\Customer;
use Stripe\Transfer;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Http\Client\Exception\HttpException;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Payments\Payouts\PayoutsPostRequest;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use HPWebdeveloper\LaravelPayPocket\Exceptions\InvalidDepositException;
use HPWebdeveloper\LaravelPayPocket\Exceptions\InsufficientBalanceException;

class WalletController extends Controller
{
    //

    public function MyWallet()
    {  $transactions = auth()->user()->walletLogs()->get();
        $totalDeposits = $transactions->where('type', 'inc')->sum('value');
        $totalCredits = $transactions->where('type', 'dec')->sum('value');
        $totalBalance = $totalDeposits - $totalCredits;
        return view('profile.wallet.manageWalet',compact(
            'transactions','totalDeposits','totalCredits','totalBalance'));
    }

    public function deposit(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $request->depositAmount; // Amount to deposit
        $user = auth()->user();

        // Create a charge using Stripe
        $charge = Charge::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Deposit to wallet',
        ]);

        // Update user's wallet balance
        $user->wallet->increment('balance', $amount);

        return redirect()->back()->with('success', 'Deposit successful.');
    }

    public function VendorWallet()
    {  $transactions = auth()->user()->walletLogs()->get();
        $totalDeposits = $transactions->where('type', 'inc')->sum('value');
        $totalCredits = $transactions->where('type', 'dec')->sum('value');
        $totalBalance = $totalDeposits - $totalCredits;
        return view('Backend.stores.wallet.manageWalet',compact('transactions','totalDeposits','totalCredits','totalBalance'));
    }

    public function connectstripe(){
        Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
        // Create a Stripe account
        $account = \Stripe\Account::create([
            'type' => 'express', // Or 'standard' or 'custom'
            'country' => 'US', // Set the country code
            // Add more parameters as needed
        ]);

        // Output the account ID
        // Create an account link
$accountLink = \Stripe\AccountLink::create([
    'account' => $account->id,
    'refresh_url' => url('/VendorWallet'), // URL to redirect if the user refreshes
    'return_url' => url('/VendorWallet'), // URL to redirect after user finishes
    'type' => 'account_onboarding',
]);
$user=Auth::user();
// dd($account->id);
$user->stripe_customer_id=$account->id;
$user->save();
// Redirect the user to complete their profile using the URL from the account link
header('Location: ' . $accountLink->url);
exit;
    } catch (Exception $e) {
        // Handle any errors
        echo 'Error: ' . $e->getMessage();
    }
die;
    }



public function withdraw(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));
// $this->connectstripe();
// die;
    $user = auth()->user();

    // Create a customer on Stripe
    $customer = Customer::create([
        'email' => $user->email,
        // Add other customer details as needed
        'name' => $user->name,

    ]);


    // $user->stripe_customer_id = $customer->id;
    // $user->save();

$stripeCustomerId = $user->stripe_customer_id;
if (empty($user->stripe_customer_id)) {
    // Return an error message if the user is not connected to Stripe
    return redirect()->back()->withErrors('Please connect to Stripe before making a withdrawal.');
}
$withdrawalAmount = intval($request->withdrawalAmount);
if ($withdrawalAmount <= 0) {

    return redirect()->back()->withErrors('Invalid withdrawal amount.');
}

try {
    // Create a transfer to the user's Stripe customer ID
    $transfer = Transfer::create([
        'amount' => $withdrawalAmount,
        'currency' => 'usd',
        'destination' => $user->stripe_customer_id,
    ]);

    // LaravelPayPocket::pay(auth()->user() ,(integer)  $withdrawalAmount, 'withdrawal');
    try {
        // Perform the withdrawal using LaravelPayPocket
        LaravelPayPocket::pay(auth()->user(), $withdrawalAmount, 'withdrawal');

        // If the withdrawal is successful, show a success message
        return redirect()->back()->with('success', 'Amount withdrawn successfully.');
    } catch (InsufficientBalanceException $e) {
        // If an InsufficientBalanceException is thrown, show an error message to the user
        return redirect()->back()->withErrors('Insufficient balance to cover the order.');
    }


} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle Stripe API error and return an error message
    return redirect()->back()->withErrors('Please connect to Stripe before making a withdrawal.  ' . $e->getMessage());
}
//     $gateway = Omnipay::create('PayPal_Rest');
//     $gateway->initialize([
//         'clientId' => env('PAYPAL_CLIENT_ID'),
//     s    'secret'   => env('PAYPAL_CLIENT_SECRET'),
//         'testMode' => true, // Set to false for production
//     ]);

//     // Withdrawal amount from virtual wallet
//     $amount = $request->withdrawalAmount;
//     $user = auth()->user();

//     // Perform withdrawal from wallet
//     try {
//         // Create a payout to the user's PayPal account
//         $response = $gateway->payout([
//             'receiverEmail' => $user->paypal_email, // Recipient's PayPal email address
//             'amount'        => $amount,
//             'currency'      => 'USD', // Specify the currency
//             // Additional parameters can be added as needed
//         ])->send();

//         // Check if the payout was successful
//         if ($response->isSuccessful()) {
//             // Payout was successful
//             // Update user's wallet balance if necessary
//             return redirect()->back()->with('success', 'Withdrawal to PayPal successful.');
//         } else {
//             // Payout failed
//             $errorMessage = $response->getMessage();
//             return redirect()->back()->withErrors(['error' => $errorMessage]);
//         }
//     } catch (\Exception $e) {
//         // Handle exceptions
//         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//     }
// }
    //  Authenticate with PayPal
//      $environment = new SandboxEnvironment(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'));
//      $client = new PayPalHttpClient($environment);

//      // Withdrawal amount from virtual walletp
//      $withdrawalAmount = $request->withdrawalAmount;
//      $user = auth()->user();
//      $amount = $request->withdrawalAmount;
//      // $user = auth()->user();
//      // Perform withdrawal from wallet
//      try {
//          // Initiate payout to user's PayPal account
//          $request = new PayoutsPostRequest();
//          $request->body = [
//              "sender_batch_header" => [
//                  "recipient_type" => "EMAIL",
//                  "email_message" => "You have received a payout!",
//                  "note" => "Thank you for using our service!",
//                  "sender_batch_id" => uniqid(),
//                  "email_subject" => "You have a payout!"
//              ],
//              "items" => [
//                  [
//                      "recipient_type" => "EMAIL",
//                      "amount" => [
//                          "value" => $amount,
//                          "currency" => "USD"
//                      ],
//                      "note" => "Thank you for using our service!",
//                      "sender_item_id" => "item_1",
//                      "receiver" => $user->email // Assuming user's PayPal email is stored in the database
//                  ]
//              ]
//          ];

//          // Execute the request
//          $response = $client->execute($request);

//          // Update user's wallet balance if payout is successful
//          // Code to update wallet balance...

//          return redirect()->back()->with('success', 'Withdrawal to PayPal successful.');
//      } catch (HttpException $e) {
//          // Handle API errors
//          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//      }
//  }
    // Stripe::setApiKey(env('STRIPE_SECRET'));

    // $amount = $request->withdrawalAmount;
    // $user = auth()->user();


    // if (!$user->stripe_account_id) {
    //     return redirect()->back()->withErrors(['error' => 'You need to connect a bank account before you can withdraw funds.'])->withInput();
    // }

    // try {

    //     $payout = Payout::create([
    //         'amount' => $amount * 100,
    //         'currency' => 'usd',
    //         'source_type' => 'bank_account',
    //         'destination' => $user->stripe_account_id,
    //     ]);

    //     $user->wallet->decrement('balance', $amount);

    //     return redirect()->back()->with('success', 'Withdrawal successful.');
    // } catch (\Exception $e) {

    //     return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
    // }



    }




    public function createCheckoutSession(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51NnfRsB1WzwNKaAfO1ngBOOZWeBDgxSrWOtqmqT3fRfG2zE5gFy1bvplU8MCmoKsgpJ4SEKTlDwLnJrd01hF8zNt00YBkr5tEE');

        // Process form data and create a Stripe Checkout Session
        $amount = $request->input('amount') * 100; // Convert amount to cents

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => 'Deposit'],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => url('/depositSuccess'),
            'cancel_url' => url('stripe/cancel'),
        ]);

        try{
            LaravelPayPocket::deposit(auth()->user(),$request->input('wallet'), $request->input('amount'));

        }
        catch(InvalidDepositException $e)
        {
            return redirect()->back()->with('status', $e->getMessage());

        }

        return redirect($checkoutSession->url);
    }


    public function handle(Request $request)
    {
        // Retrieve the Stripe signature
        $stripeSignature = $request->header('Stripe-Signature');

        // Verify the event with your Stripe endpoint secret (you can obtain it from your Stripe dashboard)
        $event = Webhook::constructEvent(
            $request->getContent(),
            $stripeSignature,
            env('STRIPE_WEBHOOK_SECRET')
        );

        // Handle the event
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            // Retrieve the amount and user information from the session
            $amount = $session->amount_total / 100; // Convert cents to dollars
            $userId = $session->metadata->user_id;

            // Find the user's wallet and update the balance
            $wallet = Wallet::where('user_id', $userId)->first();
            if ($wallet) {
                $wallet->balance += $amount;
                $wallet->save();
            }
        }

        // Respond with a 200 status code to acknowledge receipt of the event
        return response()->json(['status' => 'success'], 200);
    }


    public function depositSuccess()
    {
        return view('userPages.depositSuccess');
    }
}
