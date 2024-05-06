<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Complaint;
use App\Models\store;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\WarrantyClaim;
use App\Models\RepairOrderDetails;
use Illuminate\Support\Facades\Session;

class AdminPagesController extends Controller
{

    public function StoreProfile()
    {
        return view('AdminPages.ProfileSettings');
    }
    public function dashboard()
    {
        $totalStoresCount = Store::where('status', 'approved')->count();
        $totalStores = Store::where('status', 'approved')->get();
        $totalRepairOrderDetails = RepairOrderDetails::where('status', 'completed')->get();
        $totalUsersCount = Order::distinct('user_id')->count();
        $totalUsers= User::role('user')->get();
        $totalVendorsCount = User::role('vendor')->count();
        $totalRepairOrderDetailsCount = RepairOrderDetails::where('status', 'completed')->count();
        $numStores = Store::where('status', 'approved')->count();
        $numOrders = Order::where('status', 'completed')->count();
        $numComplaints = Complaint::all()->count();
$numCustomers=User::count();
        $numRepairOrders = RepairOrderDetails::count();

        $currentMonth = Carbon::now()->format('m');
        $lastMonth = Carbon::now()->subMonth()->format('m');

        $positiveReviewsThisMonth = ProductReview::whereMonth('created_at', $currentMonth)->where('rating', '>', 3)->count();
        $positiveReviewsLastMonth = ProductReview::whereMonth('created_at', $lastMonth)->where('rating', '>', 3)->count();

        // Prepare the data for the chart
        $labels = ['Last Month', 'This Month'];
        $data = [$positiveReviewsLastMonth, $positiveReviewsThisMonth];



        $thisMonthStartDate = Carbon::now()->startOfMonth();
        $thisMonthEndDate = Carbon::now()->endOfMonth();

        $lastMonthStartDate = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEndDate = Carbon::now()->subMonth()->endOfMonth();

        $warrantyClaimsThisMonth = WarrantyClaim::whereBetween('created_at', [$thisMonthStartDate, $thisMonthEndDate])->count();


        $warrantyClaimsLastMonth = WarrantyClaim::whereBetween('created_at', [$lastMonthStartDate, $lastMonthEndDate])->count();

        return view('AdminPages.AdminDashboard', compact('totalStoresCount','numComplaints', 'totalUsersCount', 'totalVendorsCount', 'totalRepairOrderDetailsCount','totalStores','totalRepairOrderDetails','totalUsers','numRepairOrders','numStores','numOrders','numCustomers','positiveReviewsLastMonth', 'positiveReviewsThisMonth' ,'warrantyClaimsThisMonth','warrantyClaimsLastMonth'));
    }



    public function Allsales()
    {
        $orders=Order::where('status','completed')->get();
        return view('Backend.sales.allSales',compact('orders'));
    }


    public function requestedProducts()
    {
        $orders = Order::all();

        return view('Backend.RequestedProducts.All', compact('orders'));
    }


    public function DeliverOrder($orderId)
    {
        $order = Order::find($orderId);





        return view('Backend.RequestedProducts.ViewShippmentForm',compact('order'));
    }

    public function Allclaims()
    {
        $allclaims=WarrantyClaim::all();
        return view('Backend.warranty.allClaims', compact('allclaims'));

    }
    public function Approveclaim(Request $request)
    {
        $claim_id=$request->claim_id;
        $claim=WarrantyClaim::find($claim_id);
        $claim->status ='Approved';
        $claim->save();

return redirect()->back()->with('success','status updated successfully');

    }
    public function ReceivedAdminProduct(Request $request)
    {
        $claim_id=$request->claim_id;
        $claim=WarrantyClaim::find($claim_id);
        $claim->status ='Received';
        $claim->save();

return redirect()->back()->with('success','status updated successfully');

    }

    public function deliverBackAdminProduct(Request $request)
    {
        $claim_id=$request->claim_id;
        $claim=WarrantyClaim::find($claim_id);
        try {
            $product = $claim->product;
            $order = $product->order()->where('user_id', $claim->user_id)->latest()->first();

            $adminAddress = $order->adminAddress;

            $useraddress = $order->userAddress;

            $to_address = array(
                'name' => $useraddress->name,
                'street1' => $useraddress->street1,
                'city' => $useraddress->city,
                "state" => $useraddress->state,
                'zip' => $useraddress->zip,
                'phone' => $useraddress->phone,
            );

            $from_address = array(
                'company' =>  $adminAddress->name,
                'street1' => $adminAddress->street1,
                'city' =>  $adminAddress->city,
                'state' =>  $adminAddress->state,
                'zip' =>  $adminAddress->zip,
                'phone' =>  $adminAddress->phone,
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


    public function VendorProfile()
    {
        $user = auth()->user();
        $userProfile=$user->Userprofile;

        $userHasProfile = $user->Userprofile()->exists();
        return view('AdminPages.VendorProfile',compact('userHasProfile','userProfile'));
    }




    public function updateVendorProfile(Request $request)
    {
        $validatedData = $request->validate([
        'last_name' => 'required|string',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|string|in:male,female,other',
        'phone_number' => 'nullable|string',
        'country' => 'nullable|string',
        'city' => 'nullable|string',
        'photo' => 'nullable',
        'address' => 'nullable|string',

    ]);


    $user = auth()->user();

    $profileData = [
        'last_name' => $validatedData['last_name'],
        'date_of_birth' => $validatedData['date_of_birth'],
        'gender' => $validatedData['gender'],
        'phone_number' => $validatedData['phone_number'],
        'country' => $validatedData['country'],
        'city' => $validatedData['city'],
        'address' => $validatedData['address'],
    ];


    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('profile_photos', 'public');
        $profileData['profile_image'] = $photoPath;
    }
    // if ($request->hasFile('image')) {
    //     $imagePath = $request->file('image')->store('testimonials', 'public');
    //     $validatedData['image'] = $imagePath;
    // }

    $profile = $user->Userprofile()->updateOrCreate([], $profileData);

    return redirect()->back()->with('success', 'Profile updated successfully!');

    }


    public function viewProductCustomers()
    {
        $completedOrders = Order::where('status', 'completed')->get();


        $userIds = $completedOrders->pluck('user_id')->unique();

        $completedCustomers = User::whereIn('id', $userIds)->get();

        return view('Backend.stores.productCustomers',compact('completedCustomers'));
    }
}



