<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $request->validate([
            'userType' => ['required', 'in:customer,vendor'],
        ]);

        $userType = $request->input('userType');

        if ($userType == 'customer') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,

                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('user');

            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('index');
            // Save customer registration data to the database
        } elseif ($userType == 'vendor') {
            session()->flash('type', 'vendor');

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', Rules\Password::defaults()],
                'userType' => 'required|in:customer,vendor',
                'shop_name' => 'required_if:userType,vendor|string|max:255',
                'description' => 'required_if:userType,vendor|string',
                'phone_no' => 'required_if:userType,vendor|string|max:20',
                'WA_no' => 'required_if:userType,vendor|string|max:20',
                'code' => 'required_if:userType,vendor|string|max:20',
                'joining_date' => 'required_if:userType,vendor|date',
                'city' => 'required_if:userType,vendor|string|max:255',
                'state' => 'required_if:userType,vendor|string|max:255',
                'zip' => 'required_if:userType,vendor|string|max:255',
                'address' => 'required_if:userType,vendor|string|max:255',
                'images.*' => 'image',
                'images'=>'required|array',
                'business_license' => 'required|file|mimes:pdf,doc,docx',
                'proof_identity' => 'required|file|mimes:jpg,jpeg,png',


            ]);

            $userData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ];
            // dd($request->all());
            $businessLicensePath = $request->file('business_license')->store('public/business_license');
            $proofIdentityPath = $request->file('proof_identity')->store('public/proof_identity');
            $businessLicensePath=substr($businessLicensePath, strlen('public/'));
            $proofIdentityPath=substr($proofIdentityPath, strlen('public/'));
            $storeData = [
                'name' => $request->input('shop_name'),
                'description' => $request->input('description'),
                'phone_no' => $request->input('phone_no'),
                'wa_number' => $request->input('WA_no'),
                'taxPayer_number' => $request->input('code'),
                'joining_date' => $request->input('joining_date'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zip' => $request->input('zip'),
                'location' => $request->input('address'),
                'status' => 'pending',
                'businessLicense' => $businessLicensePath,
    'proofOfIdentity' => $proofIdentityPath,
            ];

            // dd($storeData);

            $user = User::create($userData);
            $user->assignRole('vendor');

            // Associate the store with the user
            $store = $user->store()->create($storeData);

            // if ($request->hasFile('images')) {
            //     foreach ($request->file('images') as $image) {
            //         $path = $image->store('store_images');
            //         $store->images()->create(['image' => $path]);
            //     }
            // }


            foreach ($request->file('images') as $image) {
                try {
                    $path = $image->store('store_images','public');
                    $store->images()->create(['image' => $path]);
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }
            // $store->create(array_merge($storeData, ['business_license' => $businessLicensePath]));


            // $store->create(['business_license' => $businessLicensePath]);

            // Store the proof of identity

            // $store->create(['proof_identity' => $proofIdentityPath]);
// dd($userType);

            event(new Registered($user));

            // Auth::login($user);

            return redirect()->route('waiting', ['userId' => $user->id]);

        } else


            return redirect()->back()->withInput()->withErrors(['userType' => 'Invalid user type']);
        }    }


