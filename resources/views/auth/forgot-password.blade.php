@extends('userPages.master')
@section('content')


    {{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

    <div class="container-fluid  py-md-5 bg-image ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 bgOrange d-flex flex-column justify-content-center  text-center">
                <h3 class="text-white uper-margin">Hey You!</h3>
                <h4 class="text-white mt-3">Welcome to MobFix</h4>
                <h5 class="text-white mt-3">You Break, We Collect, We Phix</h5>
            </div>

            <div class=" col-md-5 py-md-5 px-md-5 bg-white">
                <div class="text-center mob-log">
                    <x-auth-session-status class="mb-4" :status="session('status')"  style="color:green"/>
                    <img src="./assets/images/MobFix.jpg" class="img-fluid " alt="">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            {{-- <x-primary-button >
                                {{ __('Email Password Reset Link') }}
                            </x-primary-button> --}}

                            <button type="submit" style="color:white; background-color: #F86F03;" class="btn">Email Password Reset Link</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

        @endsection
