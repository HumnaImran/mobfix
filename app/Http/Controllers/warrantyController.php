<?php

namespace App\Http\Controllers;

use App\Models\store;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\WarrantyClaim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class warrantyController extends Controller
{

    public function submit(Request $request){
    try {
        if (!Auth::check()) {

            return redirect()->back()->withErrors(['error' => 'User is not authenticated.'])->withInput();
        }
        $request->validate([
            'full_names' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'claimType' => 'required|string|in:repair_service,purchased_mobile',
            'store_id' => 'nullable',
            'product_id' => 'nullable',
            'claim_information' => 'required|string',
            'agreeCheckbox' => 'nullable|accepted',
        ]);
        $user = Auth::user();
        $warrantyClaim = new WarrantyClaim();

        $warrantyClaim->full_names = $request->input('full_names');
        $warrantyClaim->email = $request->input('email');
        $warrantyClaim->phone_number = $request->input('phone_number');
        $warrantyClaim->claim_type = $request->input('claimType');
        $warrantyClaim->store_id = $request->input('store_id');
        $warrantyClaim->product_id = $request->input('product_id');
        $warrantyClaim->claim_information = $request->input('claim_information');
        $warrantyClaim->agree_to_receive_newsletters = $request->has('agreeCheckbox');
        $warrantyClaim->user_id = $user->id;
        $warrantyClaim->save();


        return redirect()->back()->with('success', 'Warranty claim submitted successfully.');
    } catch (ValidationException $e) {

        return redirect()->back()->withErrors($e->validator->errors()->all())->withInput();
    } catch (\Exception $e) {
        dd($e);
        return redirect()->back()->withErrors(['error' => 'Failed to submit warranty claim. Please try again.'])->withInput();
    }
}

public function viewYourclaims()
{
    $user=Auth()->user();
    $user_id=$user->id;

    $claims=WarrantyClaim::where('user_id', $user_id)->get();
    return view('profile.WarrantyMgt.viewAll', compact('claims'));
}

public function DeliverwarrntyRepair($id)
{
    $claim = WarrantyClaim::find($id);
    try {
        $store = $claim->store;


        $Repairorder = $store->orders->where('user_id', $claim->user_id)->first();


        $to_address = array(
            'name' => $store->name,
            'street1' => $store->location,
            'city' => $store->city,
            "state" => $store->state,
            'zip' => $store->zip,
            'phone' => $store->phone,
        );

        $from_address = array(
            'company' =>  $Repairorder->first_name,
            'street1' => $Repairorder->location,
            'city' =>  $Repairorder->city,
            'state' =>  $Repairorder->state,
            'zip' =>  $Repairorder->post_code,
            'phone' =>  $Repairorder->phone_no,
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
// dd($shipment);
        $boughtShipment = $client->shipment->buy($shipment->id, $shipment->lowestRate());

        $shipmentdata = [
            'traking_code' => $boughtShipment['tracking_code'],
            'traking_link' => $boughtShipment['tracker']['public_url'],
            'id' => $boughtShipment['id'],
        ];
        $successMessage = 'Shipment successfully created and bought.';

        $claim->status = 'Deliver To';
        $claim->shipment_data = $shipmentdata;
        $claim->save();
        $trackerId = $boughtShipment->tracker->id;

        return redirect()->back()->with('success', $successMessage);
    } catch (\Exception $e) {

// dd($e);
        $errorMessage = "Please Fill The Form in correct Format";
// return $errorMessage;

        Session::flash('error', $errorMessage);
        return Redirect::back()->with('error', $errorMessage)->withErrors(['error' => $errorMessage]);

}}
public function DeliverWarrantyProduct($id)
{
    $claim = WarrantyClaim::find($id);
    try {
        $product = $claim->product;
        $order = $product->order()->where('user_id', $claim->user_id)->latest()->first();

        $adminAddress = $order->adminAddress;

        $useraddress = $order->userAddress;

        $to_address = array(
            'name' => $adminAddress->name,
            'street1' => $adminAddress->street1,
            'city' => $adminAddress->city,
            "state" => $adminAddress->state,
            'zip' => $adminAddress->zip,
            'phone' => $adminAddress->phone,
        );

        $from_address = array(
            'company' =>  $useraddress->name,
            'street1' => $useraddress->street1,
            'city' =>  $useraddress->city,
            'state' =>  $useraddress->state,
            'zip' =>  $useraddress->zip,
            'phone' =>  $useraddress->phone,
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

        $claim->status = 'Deliver To';
        $claim->shipment_data = $shipmentdata;
        $claim->save();
        $trackerId = $boughtShipment->tracker->id;

        return redirect()->back()->with('success', $successMessage);
    } catch (\Exception $e) {
        dd($e);
        // Log or handle the exception
        $errorMessage = "Please Fill The Form in correct Format";

        // Flash the error message to the session
        Session::flash('error', $errorMessage);

        // return Redirect::back()->with('error', $errorMessage)->withErrors(['error' => $errorMessage]);
    }
}

public function UserRecievedProduct(Request $request)
{
    $claim_id=$request->claim_id;
    $claim=WarrantyClaim::find($claim_id);
    $claim->status ='Completed';
    $claim->save();

return redirect()->back()->with('success','status updated successfully');
}

public function ComplainToAdminForm()
{  $stores=store::where('status','approved')->get();
    return view('userPages.complainToAdmin', compact('stores'));

}

public function submitComplaint(Request $request)
{
    $validatedData = $request->validate([
        'full_name' => 'required|string',
        'email' => 'required|email',
        'phone_number' => 'required|string',
        'store_id' => 'required|exists:stores,id',
        'subject' => 'required|string',
        'complaint_details' => 'required|string',
    ]);


    Complaint::create($validatedData);

    return redirect()->back()->with('success', 'Your complaint has been submitted successfully!');
}

public function ViewComplains()
{
 $complains=Complaint::all();
 return view('Backend.Complains.viewComplains',compact('complains'));
}

}
