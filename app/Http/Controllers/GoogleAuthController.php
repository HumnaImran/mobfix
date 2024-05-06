<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Google authentication failed.']);
        }

        // Do something with $user, like create or authenticate user
        $authUser = User::where('google_id', $google_user->getId())->first();

        if ($authUser) {
            Auth::login($authUser);
        } else {

            $newUser = User::create([
                'name' => $google_user->name,
                'email' => $google_user->email,
                'password' => bcrypt(Str::random(16)),
                'google_id' => $google_user->getId(),
            ]);
            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->to('/index'); // Redirect to desired page after login
    }
    }

