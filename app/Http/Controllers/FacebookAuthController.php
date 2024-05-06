<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{

    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'facebook authentication failed.']);
        }

        // Do something with $user, like create or authenticate user
        $authUser = User::where('facebook_id', $facebook_user->getId())->first();

        if ($authUser) {
            Auth::login($authUser);
        } else {

            $newUser = User::create([
                'name' => $facebook_user->name,
                'email' => $facebook_user->email,
                'password' => bcrypt(Str::random(16)),
                'facebook_id' => $facebook_user->getId(),
            ]);
            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->to('/index'); // Redirect to desired page after login
    }
    //
}
