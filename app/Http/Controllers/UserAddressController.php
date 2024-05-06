<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\UserAddresses;
use Illuminate\Support\Facades\Session;

class UserAddressController extends Controller
{
    //

    public function storeUserAddress(Request $request, $user_id)
    {
        $cart_item_id= $request->cart_item_id;
//         if($request->input('address_id',0)){
//             return redirect()->route('saveplan', ['cart_item_id' => $cart_item_id,'address_id'
// =>$request->address_id
//             ])->with('success', 'Address saved successfully!');

//         }

        $validatedData = $request->validate([
            'to_address_name' => 'required|string',
            'to_address_street1' => 'required|string',
            'to_address_city' => 'required|string',
            'to_address_state' => 'required|string',
            'to_address_zip' => 'required|string',
            'to_address_phone' => 'required|string',

        ]);


        $address = new UserAddresses();
        $address->user_id = $user_id;
        $address->name = $validatedData['to_address_name'];
        $address->street1 = $validatedData['to_address_street1'];
        $address->city = $validatedData['to_address_city'];
        $address->state = $validatedData['to_address_state'];
        $address->zip = $validatedData['to_address_zip'];
        $address->phone = $validatedData['to_address_phone'];

        $address->save();

        $payment_method = $request->input('payment_method');

        if ($payment_method == 'stripe' ) {

            return redirect()->route('saveplan', ['cart_item_id' => $cart_item_id
            ,'address_id'
    =>$address->id
            ])->with('success', 'Address saved successfully!');
        } elseif ($payment_method == 'wallet') {

            return redirect()->route('PayPocket.shop', ['cart_item_id' => $cart_item_id])
                ->with('success', 'Address saved successfully!');

    } elseif ($payment_method == 'paypal') {

        return redirect()->route('ShowPaypal', ['cart_item_id' => $cart_item_id])
            ->with('success', 'Address saved successfully!');
    }
        else {

            return redirect()->back()->with('error', 'Invalid payment method selected!');
        }


    }

    public function StoreAdminAddress(Request $request, $user_id)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'from_address_name' => 'required|string',
            'from_address_street1' => 'required|string',
            'from_address_city' => 'required|string',
            'from_address_state' => 'required|string',
            'from_address_zip' => 'required|string',
            'from_address_phone' => 'required|string',

        ]);


        $address = new UserAddresses();
        $address->user_id = $user_id;
        $address->name = $validatedData['from_address_name'];
        $address->street1 = $validatedData['from_address_street1'];
        $address->city = $validatedData['from_address_city'];
        $address->state = $validatedData['from_address_state'];
        $address->zip = $validatedData['from_address_zip'];
        $address->phone = $validatedData['from_address_phone'];

        $address->save();
$order_id=$request->order_id;
$order=Order::find($order_id);
$order->address_id= $address->id;
$order->save();
$address_id=$order->user_address_id;


$address=UserAddresses::find($address_id);
// dd($address);
$to_address = [
    'name' => $address->name,
    'street1' => $address->street1,
    'city' => $address->city,
    'state' => $address->state,
    'zip' => $address->zip,
    'phone' => $address->phone,
];
// dd($to_address);


        // $to_address = array(
        //     'name' => $request->input('to_address_name'),
        //     'street1' => $request->input('to_address_street1'),
        //     'city' => $request->input('to_address_city'),
        //     // 'state' => $request->input('to_address_state'),
        //             "state"   => "CA",

        //     'zip' => $request->input('to_address_zip'),
        //     'phone' => $request->input('to_address_phone'),
        //     // 'email' => $request->input('to_address_email')
        // );


        $from_address = array(
            'company' => $request->input('from_address_name'),
            'street1' => $request->input('from_address_street1'),
            'city' => $request->input('from_address_city'),
            'state' => $request->input('from_address_state'),
            'zip' => $request->input('from_address_zip'),
            'phone' => $request->input('from_address_phone'),
            // 'email' => $request->input('to_address_email')
        );

// dd($from_address);


        $client = new \EasyPost\EasyPostClient('EZTK7ddb6c967b1f49bb8151f50f716c82fce86JOwnn9vgAaFA84WSRSw');

        $shipment = $client->shipment->create([
            // "from_address" => $from_address,
            "to_address" => $to_address,
            "from_address" => [
                // "company" => "EasyPost",
                // "street1" => "118 2nd Street",
                // "street2" => "4th Floor",
                // "city"    => "San Francisco",
                "state"   => "CA",
                // "zip"     => "94105",
                // "phone"   => "+1 (162) 749-2924",

                'company' => $request->input('from_address_name'),
                'street1' => $request->input('from_address_street1'),
                'city' => $request->input('from_address_city'),
                // 'state' => $request->input('from_address_state'),
                'zip' => $request->input('from_address_zip'),
                'phone' => $request->input('from_address_phone'),
            ],
            // "to_address" => [
            //     "name"    => "Dr. Steve Brule",
            //     "street1" => "179 N Harbor Dr",
            //     "city"    => "Redondo Beach",
            //     "state"   => "CA",
            //     "zip"     => "90277",
            //     "phone"   => "310-808-5243",
            // ],
            "parcel" => [
                "length" => 20.2,
                "width"  => 10.9,
                "height" => 5,
                "weight" => 65.9,
            ],
        ]);

        try {
            $boughtShipment = $client->shipment->buy($shipment->id, $shipment->lowestRate());

            $shipmentdata=[
                'traking_code'=>$boughtShipment['tracking_code'],
                'traking_link'=>$boughtShipment['tracker']['public_url'],
                'id'=>$boughtShipment['id'],    ];
            $successMessage = 'Shipment successfully created and bought.';
        // dd($boughtShipment);
            Session::flash('success', $successMessage);
            $OrderDetail=Order::find($order_id);
            $OrderDetail->status= 'DeliveredFromAdmin';
            $OrderDetail->shipment_data= $shipmentdata;
            $OrderDetail->save();
            $trackerId = $boughtShipment->tracker->id;
            // dd($repairDetail);
            return redirect()->back()->with('success', $successMessage);
            // return view('profile.shipmentForm', compact('shipment'))->with('success', $successMessage);

        } catch (\Exception $e) {
            // dd($e);
            // Log or handle the exception
            $errorMessage = $e->getMessage();

            // Flash the error message to the session
            Session::flash('error', $errorMessage);
            return redirect()->back()->with('error', $errorMessage);
            // return Redirect::back()->with('error', $errorMessage)->withErrors(['error' => $errorMessage]);

        }

    }


}
