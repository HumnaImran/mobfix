{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}





@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/login.css')}}">


<div class="container-fluid  py-md-5 bg-image">
    <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-5 bgOrange d-flex flex-column justify-content-center  text-center">
            <h3 class="text-white uper-margin">Hey You!</h3>
            <h4 class="text-white mt-3">Welcome to MobFix</h4>
            <h5 class="text-white mt-3">You Break, We Collect, We Phix</h5>
        </div>

        <div class=" col-md-5 py-md-5 px-md-5 bg-white">
            <div class="text-center mob-log">
                <img src="./assets/images/MobFix.jpg" class="img-fluid" alt="" />
                <h5>Login to Account</h5>
            </div>
            <div class="text-center google-logo mt-4">
               {{-- <a href="{{route('facebook-auth')}}"> <img src="./assets/images/logos_facebook.png" class="img-fluid" /></a> --}}
                <a href="{{route('google-auth')}}"><img src="./assets/images/devicon_google.png" class="img-fluid ms-2" /></a>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">


            {{-- <div class="d-flex justify-content-center flex-wrap mt-4 mb-4">
                <div class="customer position-relative mx-2 mb-3">
                    <h4>Customer</h4>
                    <div class="form-check radio-box">
                        <input class="form-check-input" type="radio" name="userType" id="customerRadio"
                            value="customer" checked />
                        <label class="form-check-label" for="customerRadio"></label>
                    </div>
                </div>

                <div class="customer position-relative mx-2">
                    <h4>Vendor</h4>
                    <div class="form-check radio-box">
                        <input class="form-check-input" type="radio" name="userType" id="vendorRadio"
                            value="vendor" />
                        <label class="form-check-label" for="vendorRadio"></label>
                    </div>
                </div>
            </div> --}}


            <div>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label label-color">Email Address</label>
                            <input type="email" class="form-control" placeholder="abc@gmail.com"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email"/>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="exampleInputPassword1" class="form-label label-color">Password</label>

                            <input type="password" class="form-control" placeholder="........."
                            name="password"
                                id="Password" />
                                <div class="eye-icon" id="password-toggle">
                                    <i class="fa-regular fa-eye-slash" id="show-password"></i>
                                    <!-- <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="Toggle Password" /> -->
                                </div>
                            {{-- <div class="eye-icon">
                                <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="" />
                            </div> --}}
                        </div>
                    </form>
                    <div class="d-grid gap-2 col-6 mx-auto password mt-5" style="display:flex; justify-content:center; align-items:center; flex-direction:column ">
                        <button class="btn login" type="submit">
                            <img src="./assets/images/fa_key.png" class="img-fluid" alt="" />
                            Login
                        </button>
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<script>
 const passwordInput = document.getElementById('Password');
const passwordToggle = document.getElementById('password-toggle');



passwordToggle.addEventListener('click', function () {
if (passwordInput.type === 'password') {
passwordInput.type = 'text';
passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
} else {
passwordInput.type = 'password';
passwordToggle.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
}
});

    </script>

@endsection



