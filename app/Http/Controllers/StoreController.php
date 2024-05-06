<?php

namespace App\Http\Controllers;
use App\Models\store;

use Illuminate\Http\Request;
use App\Models\WarrantyClaim;
use App\Models\RepairOrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function viewRequest()
    {
        $request=Store::where('status', 'pending')->get();
        return view('Backend.stores.viewRequest',compact('request'));

    }

    public function viewStoreRequestDetails($id)
    {

        try {
            $store = Store::findOrFail($id);
            return view('Backend.stores.StoreRequestDetails', compact('store'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->view('errors.404', [], 404);
        }

    }


    public function viewApprovedStores()
    {
        $request=Store::where('status', 'approved')->get();

        return view('Backend.stores.approvedStoresList',compact('request'));

    }
    public function ViewRepairPhones()
    {
        $ViewRepairPhones=RepairOrderDetails::where('status', 'completed')->get();

        return view('Backend.stores.ViewRepairPhones',compact('ViewRepairPhones'));

    }


    public function searchStores(Request $request)
    {
        $location = $request->input('location');
        $stores = store::where('location', 'like', "%$location%")
        ->where('status', 'approved')
        ->get();
        if ($stores->isEmpty()) {
            return response()->json(['message' => 'No stores found for the given location.']);
        }
        else
        {
        return $view=view('card',compact('stores'));
        }

    }
    public function statusUpdate($id)
    {
        $status=store::find($id);
        $status->status="approved";
        $status->save();

        return response()->json([
            'status' => 'success',
            'updated_status' => $status->status,
            'initial_status' => $status->getOriginal('status'),
        ]);


    }
    public function waiting($id)
{

    $store = Store::where('user_id', $id)->first();





    return view('Backend.stores.waiting', compact('store'));
}

public function checkStatus($id)
{
    $store = Store::find($id);
    if ($store) {
        $storeStatus = $store->status;
        if ($storeStatus == 'pending') {
            return redirect()->back()->with('success', 'The store is pending approval.');
        } elseif ($storeStatus == 'approved') {
            $user = $store->user;

        Auth::login($user);

            return redirect()->route('VendorProfile')->with('success', 'Store approved! Welcome to Your dashboard.');
        }
    }
    return redirect()->route('waiting')->with('error', 'Unknown store status.');

}

public function ViewYourCustomers()
{
    $user=auth()->user();
    if ($user) {
        $store = Store::where('user_id' ,$user->id)->first();
        if ($store)
        {
            $storeCustomers = $store->orders()->with('user')->get();

            // dd($storeCustomers);
            return view('Backend.stores.YourCustomer', compact('storeCustomers'));
        }

}
}

public function ViewStoreFeedbacks()
{
    $user=auth()->user();
    if ($user) {
        $store = Store::where('user_id' ,$user->id)->first();
        if ($store)
        {
            $storeCustomers = $store->feedbackForms;
            // dd( $storeCustomers);

            return view('Backend.stores.Feedbacks', compact('storeCustomers'));
        }

}

}

 public function VendorAllclaims()
{
    $user = Auth::user();


if ($user) {
    $storeId = $user->store->id;
    $allclaims = WarrantyClaim::where('store_id', $storeId)
                              ->where('claim_type', 'repair_service')
                              ->get();
    // $allclaims = $user->warrantyClaims()->where('claim_type', 'repair_service')->get();
    return view('Backend.stores.ViewWarrantyClaims', compact('allclaims'));

} else {

    return redirect()->route('login')->with('error', 'Please log in to view your warranty claims.');
}
    // $allclaims=WarrantyClaim::where('claim_type', 'repair_service')->get();


}
public function deliverBackVendorProduct(Request $request)
{
    $claim_id=$request->claim_id;
    $claim=WarrantyClaim::find($claim_id);
    try {
        $user= $claim->user;


        // $product = $claim->product;
        // // $order = $product->order()->where('user_id', $claim->user_id)->latest()->first();

        // $adminAddress = $order->adminAddress;

        // $useraddress = $order->userAddress;

        $to_address = array(
            'name' => $user->address->name,
            'street1' => $user->address->street1,
            'city' => $user->address->city,
            "state" => $user->address->state,
            'zip' => $user->address->zip,
            'phone' => $user->address->phone,
        );

        $from_address = array(
            'company' =>  auth()->user()->store->name,
            'street1' => auth()->user()->store->location,
            'city' =>   auth()->user()->store->city,
            'state' => auth()->user()->store->state,
            'zip' =>  auth()->user()->store->zip,
            'phone' =>  auth()->user()->store->phone_no,
        );

        $client = new \EasyPost\EasyPostClient('EZTK7ddb6c967b1f49bb8151f50f716c82fce86JOwnn9vgAaFA84WSRSw');

        $shipment = $client->shipment->create([
            "to_address" => $to_address,
            "from_address" => $from_address,
            "parcel" => [
                "length" => 20.2,
                "width"  => 10.9,
                "height" => 5,
                "weight" => 65.9,
            ],
        ]);

        $boughtShipment = $client->shipment->buy($shipment->id, $shipment->lowestRate());

        $shipmentdata = [
            'traking_code' => $boughtShipment['tracking_code'],
            'traking_link' => $boughtShipment['tracker']['public_url'],
            'id' => $boughtShipment['id'],
        ];
        $successMessage = 'Shipment successfully created and bought.';

        $claim->status = 'Deliver back';
        $claim->shipment_data = $shipmentdata;
        $claim->save();
        $trackerId = $boughtShipment->tracker->id;

        return redirect()->back()->with('success', $successMessage);
    } catch (\Exception $e) {
        dd($e);

        $errorMessage = $e->getMessage();

        Session::flash('error', $errorMessage);


    }
}

}
