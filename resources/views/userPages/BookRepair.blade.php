@extends('userPages.master')
@section('content')
    {{-- <style>
    *{
        color: #f86f03 !important;
    }
    </style> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/BookStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <div class="container">
        <div class="row pt-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="svg_wrap"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    {{--
<section class="secClass">

 <h3 class="text-center fixHead">How do you want us to fix your device?</h3>
    <div class="row p-0 m-0">
        <div class="col-md-4"></div>
        <div class="col-md-2">
          <div class="visitDiv">
            <a>

                <i class="fa-solid fa-person-walking postimg d-flex justify-content-center"></i>
                 <p class="text-center mail">Visit Us</p>
            </a>

          </div>
          <p class="pt-5">Choose from one of our 38 nationwide locations.</p>
        </div>
        <div class="col-md-2">
           <div class="visitDiv">
            <a>
                <i class="fa-solid fa-envelope  postimg d-flex justify-content-center"></i>
                <p class="text-center mail">Mail-in</p>
            </a>
           </div>
           <p class="pt-5">No stores close to you? Send your device to us!</p>
        </div>
        <div class="col-md-4"></div>
    </div>

</section> --}}



    <section class="secClass">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="mailService text-center pt-5">Please confirm your details!</h3>
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="col-md-1"></div>
                <div class="col-md-5 ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="processDiv p-4  pb-5">
                        <h3 class="text-center">Your details</h3>
                        <form action="{{ route('submit-repair-order') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="first_name" placeholder="First Name*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="last_name"
                                            id="exampleFormControlInput1" placeholder="Last Name*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input type="text" class="form-control" name="phone_no"
                                            id="exampleFormControlInput1" placeholder="Phone No*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="post_code" placeholder="Post Code">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <input type="text" name="device_code" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Device Passcode*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <input type="text" name="city" class="form-control"
                                            id="exampleFormControlInput1" placeholder="city*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <input type="text" name="Location" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <input type="text" name="State" class="form-control"
                                            id="exampleFormControlInput1" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <select class="form-select" id="repairTypeSelect" name="repair_type_id">
                                        <option selected>Repair Type</option>
                                        @foreach ($repairTypes as $repairType)
                                            <option value="{{ $repairType->id }}">{{ $repairType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="store_id" value="{{ $store->id }}">


                                <div class="input-group mb-5 mt-5" style="flex-wrap: unset;">
                                    <button class="input-group-icon me-3 border-0" id="cameraIcon" type="button">
                                        <!-- Camera icon at the start -->
                                        <img src="{{ asset('./assets/images/camera.png') }}" alt="">
                                    </button>
                                    <input type="text" class=" form-12" placeholder="Add Pictures of Damaged Phone"
                                        id="file" readonly>

                                    <span class="input-group-icon">
                                        <!-- File input -->
                                        <input type="file" name="images[]" accept="image/*" multiple id="imageInput"
                                            style="display: none;">
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Any additional
                                            information? (Optional)</label>
                                        <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark">Submit</button>

                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-5 mt-3 mt-md-0">
                    <div class="processDiv p-4">
                        <h3 class="text-center">Repair Order details</h3>
                        <div class="repairDiv">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="within"  style="font-weight: 700">Repair Type:</p>
                                    <p>Google Pixel 7a Screen Replacement - Warehouse</p>

                                    @php

                                        $selectedBrand = session()->get('selectedBrand');
                                        $selectedModel = session('selectedModel');
                                        $selectedRepairType = session('selectedRepairType');
                                    @endphp

                                    <div>
                                        <p>Selected Brand: {{ $selectedBrand }}</p>
                                        <p>Selected Model: {{ $selectedModel }}</p>
                                        <p>Selected Repair Type: {{ $selectedRepairType }}</p>
                                    </div> {{-- <p class="within">Repair Price: <span class="text-dark">£149</span></p> --}}
                                </div>
                                <div>
                                    <img class="fontimgHeight" src="{{ asset('./assets/images/frontscren.png') }}" alt="">

                                </div>
                            </div>
                        </div>
                        <div class="repairDiv mt-3">
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <p class="within" style="font-weight: 700">Mail-in Address</p>
                                    <p>{{ $store->location }}</p>
                                    {{-- <p class="within">Cost: <span class="text-dark "> £10.00</span> --}}

                                    </p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="d-flex" style="justify-content: space-between;">
                                    <p class="within"  style="font-weight: 700">Store details</p>
                                    <img class="notifyimg" src="{{ asset('./assets/images/postin.png') }}" alt="">

                                    </div>
                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">Store Name:</p>
                                    <p style="display: inline;">{{ $store->name }}</p><br>
                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">Store Owner </p>
                                    <p style="display: inline;">{{ $store->user->name }}</p><br>
                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">Owner Email </p>
                                    <p style="display: inline;">{{ $store->user->email }}</p>
<br>
                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">Whatsapp Number:
                                    </p>
                                    <p style="display: inline;">{{ $store->wa_number }}</p><br>


                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">Time On MobFix</p>
                                    <p style="display: inline;">{{ $store->joining_date }}</p><br>
                                    <p style="display: inline-block; margin-right: 5px; font-weight:600">City</p>
                                    <p style="display: inline;">{{ $store->city }}</p>
                                    {{-- Whatsapp Number <p>{{$store->wa_number}}</p> --}}
                                    {{-- Description <p>{{$store->description}}</p> --}}
                                    {{-- <p class="within">Cost: <span class="text-dark "> £10.00</span> --}}

                                    </p>
                                </div>

                            </div>
                        </div>
                        {{-- <p class=" py-4 fs-4 ps-5">Total cost: <span class="within">£159</span></p> --}}
                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin-top: 5rem">
                    <div class="form-check pt-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            To provide further peace of mind, from time to time we like to send our loyal customers special
                            offers, promotions & useful advice.
                        </label>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree to the <span class="fw-bold">Terms and Conditions</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-1"></div>

            </div>
        </div>

    </section>

    <section class="secClass">
        <h3 class="mailService text-center pt-5">Mail-in service</h3>
        <p class="text-center p-0 m-0">Thank you for selecting our mail-in repair service.
        </p>
        <p class="text-center p-0 m-0">
            This is our most widely accessible service and ideal for customers who do not live near one of our service
            centres.
        </p>
        <div class="container">
            <div class="row pt-4">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="processDiv p-4">
                        <h5 class="ps-5 ms-3">What's the process?</h5>
                        <div class="d-flex px-2">
                            <img class="imgMail" src="{{ asset('./assets/images/mail.png') }}" alt="">
                            <p class="sendPara pt-2">We will send you a mail-in pack, within 1-2 business days of receiving
                                your order.</p>
                        </div>
                        <div class="d-flex px-2">
                            <img class="imgMail" src="{{ asset('./assets/images/mail2.png') }}" alt="">
                            <p class="sendPara pt-2">Place the device inside the pack and drop into your local post office.
                            </p>
                        </div>
                        <div class="d-flex px-2">
                            <img class="imgMail" src="{{ asset('./assets/images/mail3.png') }}" alt="">
                            <p class="sendPara pt-2">Once we receive your device, we will diagnose the issue, complete the
                                repair, and mail your device back to you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3 mt-md-0">
                    <div class="processDiv p-4">
                        <h5 class="text-center">How long will it take?</h5>
                        <p class="certainPara">
                            Usually, your device will be returned to you <span class="within">within 2-3 business days from
                                the point we receive your device</span> at our central service centre.
                        </p>
                        <p class="certainPara">
                            In certain circumstances, depending on the nature of the issue and parts availability, your
                            repair may take longer than this. In these circumstances we will contact you so that you remain
                            up to date on how your repair is progressing.
                        </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>

    <section class="secClass">
        <div class="container">
            <div class="submit-p d-flex justify-content-center align-items-center mt-4">
                <p style="color:grey;">
                    Please screenshot the reservation info and save it as a receipt to
                    access the priority service.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center submit-img">
                        <img src="{{ asset('assets/img/submit.png') }}" alt="" class="w-100" />
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="d-flex justify-content-sm-center submit-head">
                <h2>Submitted successfully!</h2>
            </div>
            <div class="d-flex justify-content-center submit-p1">
                <p>Your order has been confirmed. We look forward to your arrival.</p>
            </div>
        </div>

        <div class="container submit-detail mt-3 mb-3 px-sm-5 py-5">
            <div class="line">
                <hr />
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row submit-text">
                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Tracker Number:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">BD123080517077</p>
                        </div>

                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Service Store:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">{{ $store->name }}</p>
                        </div>

                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Reservation Time:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">{{ $store->created_at }}</p>
                        </div>

                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Device Model:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">{{ $selectedModel }}</p>
                        </div>

                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Device Brand</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">{{ $selectedBrand }}</p>
                        </div>


                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Details:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">{{ $selectedRepairType }}</p>
                        </div>

                        <div class="col-md-4 mt-2">
                            <h5 class="mb-0">Delivery:</h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-md-0">glass change</p>
                        </div>

                        {{-- <div class="col-md-4 mt-2">
                <h5 class="mb-0">Offered Price</h5>
              </div>
              <div class="col-md-6 mt-2">
                <p class="mb-md-0"></p>
              </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="container submit-detail1 mb-3 px-sm-5 py-4">
            <div class="submit-head2">
                <h4>Before going to servcie store,please:</h4>
            </div>
            <div class="line">
                <hr />
            </div>
            <div class="num-list">
                <ol>
                    <li>
                        <a href="">Please back up important private data on your phone in
                            advance.</a>
                    </li>
                    <li><a href=""> Disable the power-on password</a></li>
                </ol>
            </div>
        </div>
    </section>
    {{--
<section class="secClass">
  <p>General condtitions</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section> --}}

    <div class="d-flex justify-content-center align-items-center mt-3">
        <div class="buttonOne" id="prev">&larr; Previous</div>
        <div class="buttonOne " id="next">Next &rarr;</div>
        {{-- <div class="buttonOne" id="submit">Agree and send application</div> --}}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle click on the camera icon
            $('#cameraIcon').click(function() {
                // Trigger click on the file input
                $('#imageInput').click();
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
@endsection
