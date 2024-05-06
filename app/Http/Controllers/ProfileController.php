<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\favourteProducts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use App\Models\Order;

use Illuminate\View\View;
// use Umpirsky\Country\Country;
// use Umpirsky\Country\Helper\Country;





class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
    */

    public function YourProfile()
    {
        $user = auth()->user();
        $userProfile=$user->Userprofile;
        // dd($userProfile);
        $userHasProfile = $user->Userprofile()->exists();
        return view('profile.YourProfile',compact('userHasProfile','userProfile'));
    }

    public function updateProfile(Request $request)
{
    $user = auth()->user();


    $profile = $user->profile ?? new Profile();

    $profile->vat_number = $request->input('vat_number');
    $user->update(['date_of_birth' => Carbon::parse($request->input('date_of_birth'))]);
    $profile->phone_code = $request->input('phone_code');
    $profile->phone_number = $request->input('phone_number');
    $profile->country = $request->input('country');
    $profile->city = $request->input('city');

    $user->profile()->save($profile);

    return redirect()->back()->with('success', 'Profile updated successfully');
}
    public function ViewProfile(Request $request): View
    {
        // $countries = Country::getList('en', 'alpha2');



// return view('profile.ViewProfile', ['countries' => $countries]);
        return view('profile.ViewProfile');
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function MyOrders()
    {
        $user=auth()->user();
     $allOrders=Order::where('user_id', $user->id)->get();
     return view('profile.MyOrders',compact('allOrders'));


    }
    // public function MyWallet()
    // {

    //  return view('profile.MyWallet',compact('mywallet'));
    // }


    public function MyFavorites()
    {
        $user =auth()->user();
        if($user)
        {
        $MyFavorites= $user->favorites()->get();
        return view('profile.MyFavorites.All',compact('MyFavorites'));
        }
        else
        {
            return redirect()->route('login');
        }
        // dd($MyFavorites);

    //  $MyFavorites=favourteProducts::all();

    }


    public function OrderComplete( $orderId)
    {
        $order = Order::find($orderId);
        $order->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Order marked as completed.');
    }


    public function updateUserProfile(Request $request)
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
}
