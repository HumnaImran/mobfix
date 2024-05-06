<?php

namespace App\Http\Controllers;
use App\Models\store;

use Illuminate\Http\Request;
use App\Models\RepairOrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\RepairOrderDetailsImages;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookRepairController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            // 'phone' => 'required|string',
            'post_code' => 'nullable|string',
            'phone_no' => 'required|string',
            'device_code' => 'required|string',
            'info' => 'nullable|string',
            'store_id' => 'required|exists:stores,id',
            'images'=>'array',
            'images.*' => 'image',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'location' => 'nullable|string',
            // 'repair_type' => $request->input('repair_type_id'),

        ]);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        $userId = Auth::id();


        $repairOrderDetail = RepairOrderDetails::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            // 'phone' => $request->input('phone'),
            'post_code' => $request->input('post_code'),
            'phone_no' => $request->input('phone_no'),
            'device_code' => $request->input('device_code'),
            'info' => $request->input('info'),
            'store_id' => $request->input('store_id'),
            'user_id' => $userId,
            'repair_type_id' => $request->input('repair_type_id'),
            'city' => $request->input('city'),
        'state' => $request->input('State'),
        'location' => $request->input('Location'),



        ]);


        // foreach ($request->file('images') as $image) {
        //     try {
        //         $path = $image->store('BookRepair_images', 'public');
        //         $repairOrderDetail->images()->create(['image' => $path]);
        //     } catch (\Exception $e) {
        //         dd($e->getMessage());
        //     }

            foreach ($request->images as $image) {
                try {
                    $path = $image->store('BookRepair_images', 'public');
                   // Check the path being returned
                    $repairOrderDetail->images()->create(['image' => $path]);
                } catch (\Exception $e) {
                    dd($e->getMessage());  // Print the exception message for debugging
                }
            }

            // if ($request->hasFile('image')) {
            //     foreach ($request->file('image') as $image) {
            //         $imagePath = $image->store('product_images', 'public');

            //         $product->images()->create(['image' => $imagePath]);
            //     }
            // }


        return redirect()->back()->with('success', 'Details submitted successfully!');
    }


public function storeSelectionsInSession(Request $request)
{

    Session::put('selectedBrand', $request->brand);
    Session::put('selectedModel', $request->model);
    Session::put('selectedRepairType', $request->repairType);

    return response()->json(['success' => true,'session'=>Session::get('selectedRepairType')]);
}

public function ViewRepairRequest()
{
    $user=Auth()->user();

    $repairDetails= RepairOrderDetails::where('store_id', $user->store->id)->get();
    // $repairDetailsIma= RepairOrderDetailsImages::all();
    return view('Backend.RepairRequest.ViewRepairRequest', compact('repairDetails'));

}

public function ViewDetails($id)
{
    $repairDetail = RepairOrderDetails::with('images')->find($id);
    return view('Backend.RepairRequest.ViewRepairRequestDetail', compact('repairDetail'));

}



public function submitOfferPrice(Request $request, $id)
{

    $request->validate([
        'price' => 'required|numeric',
    ]);

    $repairOrderDetail = RepairOrderDetails::find($id);

    if (!$repairOrderDetail) {
        return redirect()->back()->with('error', 'Repair order not found');
    }

    $repairOrderDetail->price = $request->price;
    $repairOrderDetail->status = "Price Offered";

    $repairOrderDetail->save();

    return redirect()->back()->with('success', 'Offer price submitted successfully');
}


public function RepairRequestStatus()
{

     $user = Auth::user();
 $repairDetails = RepairOrderDetails::where('user_id', $user->id)->with('store', 'repairType')->get();
    //  $repairDetailsData=$epairDetails->shipmentdata;

    // $shipmentDataArray = json_decode($repairDetailsData, true);
    //  dd($shipmentDataArray);
    //  dd( $repairDetails);
    return view('profile.repair-request-status', compact('repairDetails'));
}

public function delRequest($id)
{    $repairDetail = RepairOrderDetails::find($id);
    if (!$repairDetail) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $repairDetail->delete();
    return redirect()->back()->with('success', 'Request rejected and deleted successfully.');
}

    public function acceptRequest($id)
{
    $repairDetail = RepairOrderDetails::with('store')->find($id);
    $repairDetailId=$repairDetail->id;
    $store = $repairDetail->store;
    // return Redirect::route('savePlanRepair', ['Repair_id' => $repairDetailId]);

    // return redirect()->route('savePlanRepair', ['Repair_id' => $repairDetailId])->with('success', 'Address saved successfully!');
   return view('profile.shipmentForm',compact('store', 'repairDetail'));
}

public function MobileReceived($id)
{
    $repairDetailStatus=RepairOrderDetails::find($id);

    $repairDetailStatus->status='vendor Received';

    $repairDetailStatus->save();
    return redirect()->back()->with('success', 'successfully status updated');


}


public function returnPhoneForm($id)
{
    $repairDetail = RepairOrderDetails::with('store')->findOrFail($id);
    $store = $repairDetail->store;

   return view('Backend.RepairRequest.shipmentForm',compact('store', 'repairDetail'));
}
// public function viewOrders()
// {
//     $repairDetail=RepairOrderDetails::all();
//     return view('')
// }


public function retureasyPostVendornPhoneForm($id)
{
    $repairDetailStatus=RepairOrderDetails::find($id);
    $repairDetailStatus->status='vendor Returned';
    $repairDetailStatus->save();
     return redirect()->back()->with('success', 'updated successfully');

}

public function mobileReceivedCustomer($id)
{

$repairOrderDetail = RepairOrderDetails::find($id);
$repairOrderDetail->status= 'completed';
$repairOrderDetail->save();
return redirect()->back()->with('success', 'updated successfully');

}

}

