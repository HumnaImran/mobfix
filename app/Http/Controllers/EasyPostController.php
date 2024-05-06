<?php

namespace App\Http\Controllers;
use EasyPost\EasyPostError;
use Illuminate\Http\Request;
// use EasyPost\EasyPost;
use App\Mail\ShipmentTrackingLink;
use App\Models\RepairOrderDetails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EasyPostController extends Controller
{
 public function easyPost( Request $request, $id)
 {

    $to_address = array(
        'name' => $request->input('to_address_name'),
        'street1' => $request->input('to_address_street1'),
        'city' => $request->input('to_address_city'),
        // 'state' => $request->input('to_address_state'),
                "state"   => "CA",

        'zip' => $request->input('to_address_zip'),
        'phone' => $request->input('to_address_phone'),
        // 'email' => $request->input('to_address_email')
    );


    $from_address = array(
        'company' => $request->input('from_address_name'),
        'street1' => $request->input('from_address_location'),
        'city' => $request->input('from_address_city'),
        'state' => $request->input('from_address_state'),
        'zip' => $request->input('from_address_zip'),
        'phone' => $request->input('from_address_phone_no'),
        // 'email' => $request->input('to_address_email')
    );
    // $to_address = array(
    //     "name"    => "Dr. Steve Brule",
    //     "street1" => "2 Floor Maryam hall",
    //     "city"    => "Rawalpindi",
    //     "state"   => "CA",
    //     "zip"     => "00666",
    //     "phone"   => "310-808-5243",
    //   );
//   $from_address = array(
//     "company" => "EasyPost",
//     "street1" => "118 2nd Street",
//     // "street2" => "4th Floor",
//     "city"    => "San Francisco",
//     "state"   => "CA",
//     "zip"     => "94105",
//     "phone"   => "415-456-7890",
//       );
//   $parcel = array(
//         "length" => $request->input('length'),
//         "width" => $request->input('width'),
//         "height" => $request->input('height'),
//         "weight" => $request->input('weight'),
//       );
// $to_address['state']="CA";

// dd($from_address,$to_address);
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
        'street1' => $request->input('from_address_location'),
        'city' => $request->input('from_address_city'),
        // 'state' => $request->input('from_address_state'),
        'zip' => $request->input('from_address_zip'),
        'phone' => $request->input('from_address_phone_no'),
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
    $repairDetail=RepairOrderDetails::find($id);
    $repairDetailId=$repairDetail->id;
    $repairDetail->first_name= $request->input('to_address_name');

    $repairDetail->location= $request->input('from_address_location');
    $repairDetail->city= $request->input('from_address_city');

    $repairDetail->state= $request->input('from_address_state');

    $repairDetail->post_code= $request->input('from_address_zip');
    $repairDetail->phone_no= $request->input('from_address_phone_no');


    $repairDetail->status= 'customer accepted';
    $repairDetail->shipmentdata= $shipmentdata;
    $repairDetail->save();
    $trackerId = $boughtShipment->tracker->id;
    Mail::to(auth()->user())->send(new ShipmentTrackingLink($boughtShipment['tracker']['public_url']));

    $payment_method = $request->input('payment_method');

    if ($payment_method == 'stripe' ) {

        return Redirect::route('savePlanRepair', ['Repair_id' => $repairDetailId]);
    } elseif ($payment_method == 'paypal') {

    return redirect()->route('ShowPaypalRepair', ['Repair_id' => $repairDetailId])
        ->with('success', 'Address saved successfully!');
}
    else {

        return redirect()->back()->with('error', 'Invalid payment method selected!');
    }


    // dd($repairDetail);
    // return redirect()->route('RepairRequestStatus')->with('success', $successMessage);
    // return view('profile.shipmentForm', compact('shipment'))->with('success', $successMessage);

} catch (\Exception $e) {
    // dd($e);
    // Log or handle the exception
    $errorMessage = "Please Fill The Form in correct Format";

    // Flash the error message to the session
    Session::flash('error', $errorMessage);

    return Redirect::back()->with('error', $errorMessage)->withErrors(['error' => $errorMessage]);

}}


public function easyPostVendor(Request $request, $id)
{


    $to_address = array(
        'name' => $request->input('to_address_name'),
        'street1' => $request->input('to_address_street1'),
        'city' => $request->input('to_address_city'),
        // 'state' => $request->input('to_address_state'),
                // "state"   => "CA",

                'state' => $request->input('to_address_state'),

        'zip' => $request->input('to_address_zip'),
        'phone' => $request->input('to_address_phone'),
        // 'email' => $request->input('to_address_email')
    );


    $from_address = array(
        'company' => $request->input('from_address_name'),
        'street1' => $request->input('from_address_location'),
        'city' => $request->input('from_address_city'),
        'state' => $request->input('from_address_state'),
        'zip' => $request->input('from_address_zip'),
        'phone' => $request->input('from_address_phone_no'),
        // 'email' => $request->input('to_address_email')
    );
    // $to_address = array(
    //     "name"    => "Dr. Steve Brule",
    //     "street1" => "2 Floor Maryam hall",
    //     "city"    => "Rawalpindi",
    //     "state"   => "CA",
    //     "zip"     => "00666",
    //     "phone"   => "310-808-5243",
    //   );
//   $from_address = array(
//     "company" => "EasyPost",
//     "street1" => "118 2nd Street",
//     // "street2" => "4th Floor",
//     "city"    => "San Francisco",
//     "state"   => "CA",
//     "zip"     => "94105",
//     "phone"   => "415-456-7890",
//       );
//   $parcel = array(
//         "length" => $request->input('length'),
//         "width" => $request->input('width'),
//         "height" => $request->input('height'),
//         "weight" => $request->input('weight'),
//       );
// $to_address['state']="CA";

// dd($from_address,$to_address);
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
        'street1' => $request->input('from_address_location'),
        'city' => $request->input('from_address_city'),
        // 'state' => $request->input('from_address_state'),
        'zip' => $request->input('from_address_zip'),
        'phone' => $request->input('from_address_phone_no'),
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
        'id'=>$boughtShipment['id'],    ];
    $successMessage = 'Shipment successfully created and bought.';
// dd($boughtShipment);
    Session::flash('success', $successMessage);
    $repairDetail=RepairOrderDetails::find($id);
    $repairDetail->status= 'inProcess';
    $repairDetail->shipmentdata= $shipmentdata;
    $repairDetail->save();
    $trackerId = $boughtShipment->tracker->id;
    // dd($repairDetail);
    return redirect()->route('ViewDetails', ['id' => $repairDetail])->with('success', $successMessage);
    // return view('profile.shipmentForm', compact('shipment'))->with('success', $successMessage);

} catch (\Exception $e) {

    // dd($e);
    // Log or handle the exception
    $errorMessage = "Please Fill The Form in correct Format";
    // Flash the error message to the session
    Session::flash('error', $errorMessage);

    // return Redirect::back()->with('error', $errorMessage)->withErrors(['error' => $errorMessage]);


}

}
}
