

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
                <img src="{{asset('./assets/images/MobFix.jpg')}}" class="img-fluid" alt="" />
                <h5>Login to Account</h5>
            </div>
            <div class="text-center google-logo mt-4">
                <img src="{{asset('./assets/images/logos_facebook.png')}}" class="img-fluid" />
                <a href="{{route('google-auth')}}"><img src="{{asset('./assets/images/devicon_google.png')}}" class="img-fluid ms-2" /></a>
            </div>



            <div class="d-flex justify-content-center flex-wrap mt-4 mb-4">
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
            </div>


            <div>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label label-color">Email Address</label>
                            <input type="email" class="form-control" placeholder="abc@gmail.com"
                                id="exampleInputEmail1" aria-describedby="emailHelp" />
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="exampleInputPassword1" class="form-label label-color">Password</label>

                            <input type="password" class="form-control" placeholder="........."
                                id="exampleInputPassword1" />
                            <div class="eye-icon">
                                <img src="{{asset('./assets/images/ion_eye-off.png')}}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </form>
                    <div class="d-grid gap-2 col-6 mx-auto password mt-5">
                        <button class="btn login" type="button">
                            <img src="{{asset('./assets/images/fa_key.png')}}" class="img-fluid" alt="" />
                            Login
                        </button>
                        <a href="./bootstrap.html" class="text-center">Lost Your Password!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


@endsection



