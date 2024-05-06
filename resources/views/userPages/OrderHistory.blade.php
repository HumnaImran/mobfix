@extends('userPages.master')
@section('content')
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .Privacytext {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 600;
            line-height: 53px;
            text-align: left;
            color: black;
        }

        .ParagraphText {
            background-color: #f3f1f1;
        }

        .Text-privacy {
            color: black;
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;

        }

        .WalleT {
            font-family: Segoe UI;
            font-size: 30px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0px;
            text-align: left;

        }

        .Walletbalance {
            font-family: Segoe UI;
            font-size: 16px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
        }

        .Balanced {
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;
            line-height: 32px;
            letter-spacing: 0px;
            text-align: left;

        }

        .TableBody {
            background-color: #f3f1f1;
        }

        .Tableborder {
            border: 2px solid white !important;
        }

        .tABBLEHEADER {
            border: 1px solid #f3f1f1 !important;
            border-top: 10px;
        }

        .BTN {
            background-color: #F6A92C !important;
            color: white !important;
            border-radius: 10px;
        }

        /* faqs css*/
        .FAQSsection2 {
            background-color: #f3f1f1;
            border-radius: 12px;

        }

        .BAKSections {
            position: absolute;
            top: 80%;
            left: 15%;
            width: 70%;
        }

        @media(max-width:520px) {
            .BAKSections {
                top: 60%;
                width: 80%;
                left: 10%;
            }
        }

        @media(max-width:397px) {
            .BAKSections {
                top: 40%;
                width: 90%;
                left: 5%;
            }
        }

        @media(max-width:992px) {
            .SecTions4 {
                margin-top: 40% !important;
            }
        }

        @media(max-width:857px) {
            .SecTions4 {
                margin-top: 50% !important;
            }
        }

        @media(max-width:767px) {
            .SecTions4 {
                margin-top: 60% !important;
            }

            .PrivacyTEXT {
                font-size: 25px;
            }
        }

        @media(max-width:660px) {
            .SecTions4 {
                margin-top: 80% !important;
            }
        }

        @media(max-width:600px) {
            .SecTions4 {
                margin-top: 90% !important;
            }
        }

        @media(max-width:550px) {
            .SecTions4 {
                margin-top: 100% !important;
            }
        }

        @media(max-width:440px) {
            .SecTions4 {
                margin-top: 120% !important;
            }
        }

        @media(max-width:360px) {
            .SecTions4 {
                margin-top: 140% !important;
            }

            .PrivacyTEXT {
                font-size: 16px;
            }
        }

        .SecTions4 {
            margin-top: 20%;
            margin-bottom: 5%;
        }

        .PrivacyTEXT {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 600;
            /* line-height: 20px; */
            text-align: left;
            color: black;
        }

        .accordion-button {
            font-size: 20px;
            font-weight: 600;
            color: black;
        }

        /* news css */
        .mainSections {
            background-image: url('../img/Rectangle\ 1128.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100% !important;
            height: 60vh !important;
            background-position: 100% 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mainSections h2 {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 700;
            line-height: 64px;
            letter-spacing: 0em;
            color: white;

        }

        .REVIES {
            color: #F6A92C;
        }

        .Privacyhiden {
            font-family: Segoe UI;
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            letter-spacing: 0em;
            text-align: left;
            color: rgb(160, 154, 154);

        }

        /* warrenty pages css */
        .bACKground {
            background-image: url('{{ asset('assets/img/Rectangle1128.png') }}');
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 100% 100%;
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .MOB {
            font-family: Segoe UI;
            font-size: 40px;
            font-weight: 700;
            color: #525fe1;
        }

        .FIX {
            color: #f86f03;
        }

        .bACKground h2 {
            font-family: Segoe UI;
            font-size: 40px;
            font-weight: 700;

            color: rgb(180, 173, 173);

        }

        .bACKground p {
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            color: white;
        }

        .mainCONTent {
            background-color: #f3f1f1;
            margin-top: 20px;
        }

        .WARENTTEXT {
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            color: #7a7979;

        }

        .CLAIM {
            font-family: Segoe UI;
            font-size: 34px;
            font-weight: 600;
            color: black;

        }

        .FORMSLABELD {
            font-family: Segoe UI;
            font-size: 18px;
            font-weight: 600;
            color: black;
        }

        .WARENTTEXT::placeholder {
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            color: #7a7979;
        }

        .BORDERD {
            border: 1px solid #c5c4c4;
            border-radius: 10px;
        }

        .INPUTBOX {
            border: 1px solid black !important;
            border-radius: 5px;
            width: 20px !important;
            height: 20px !important;
        }

        .form-check-input[type="checkbox"]:checked {
            background-color: blue !important;
        }

        .BTNTEXTED {
            font-family: Segoe UI;
            font-size: 16px !important;
            font-weight: 600 !important;
            padding-inline: 5rem !important;
        }



        .fm-600 {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
        }

        .fm-400 {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
        }

        .fm-600 {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
        }

        .fn-700 {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
        }

        .fn-400 {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
        }

        .bg-colo {
            background-color: #3a3a3a;
        }

        /* @media(max-width:1399){

        } */


        /* orderRatingsandReviews */

        .fon-41 {
            font-size: 7rem;
            font-weight: 400;
        }
    </style>



    <!-- orderHistory.html -->
    <section class="py-5">

        <div class="container my-5 ">

            <div class="card rounded-4">

                <div class="card-header " style="background-color: #F9F8F8;">
                    <h4 class="container fm-600 pt-2">Order’s History</h4>
                </div>

                <div class="container" style="background-color: #F9F8F8;">

                    <div class="card-body">
                        @foreach ($orders as $order)
                            <div>

                                <div>
                                    <h6 class="text-secondary fm-700">Dispatched</h6>
                                </div>


                                <div class="row">

                                    <div class="col-lg-8 col-12">

                                        <div class="row flex-wrap">

                                            <div class="col-lg-4 ">
                                                {{-- <img class="w-100" src="./assests/img/product-cover-5 (1).png" alt=""> --}}
                                                <img src="{{ url('storage/' . $order->product->images->first()->image) }}"
                                                    class="img-fluid me-4 w-100" alt="Card Image">
                                            </div>

                                            <div class="col-lg-8 ps-5">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h4 class="fw-bold text-dark pt-3">{{ $order->product->name }} </h4>
                                                    <img class="pt-2" src="{{asset('./assets/img/Vector (8).png')}}" alt="">
                                                </div>
                                                @php
                            $averageRating = number_format($order->product->averageRating(), 1);
                            $filledStars = intval($averageRating);
                            $emptyStars = 5 - $filledStars;
                        @endphp
                                                <div class="d-flex align-items-center pb-3">

                                                    @for ($i = 0; $i < $averageRating; $i++)
                                                    <img src="{{ asset('assets/img/Vector (7).png') }}" alt="" />
                                                @endfor
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <img src="{{ asset('assets/img/Vector (6).png') }}" alt="" />
                                                @endfor

                                                    {{-- <img src="./assests/img/Vector (7).png" alt="">
                                                    <img class="ps-1" src="./assests/img/Vector (7).png" alt="">
                                                    <img class="ps-1" src="./assests/img/Vector (7).png" alt="">
                                                    <img class="ps-1" src="./assests/img/Vector (7).png" alt="">
                                                    <img class="ps-1" src="./assests/img/Vector (6).png" alt=""> --}}
                                                    <h6 class="text-secondary ps-2 pt-1 fm-700">{{$order->product->reviews->count()}} Reviews</h6>
                                                </div>
                                                <h4 class="fw-bold pb-3">{{ $order->product->price }} .PKR</h4>
                                                <p class="text-secondary fm-400">{{ $order->product->name }} (
                                                    {{ $order->product->ProductSpecs()->where('spec_id', 10)->first()?->value }}
                                                    ,
                                                    {{ $order->product->ProductSpecs()->where('spec_id', 11)->first()?->value }}
                                                    ) Dual Sim With Official
                                                    Warranty</p>
                                                <div class="d-flex align-items-center">
                                                    <p class="text-secondary fm-400 pt-2 pe-3">Color : </p>

                                                    @php
                                                        $colors=$order->product->ProductSpecs()->where('spec_id', 20)->first()
                                                            ?->value;
                                                           $colors= explode(',',$colors)??[];
                                                    @endphp
                                                    @foreach($colors as $c)
                                                        <span style="width: 30px;height:30px; margin-right:10px; border-radius:50%;background:{{$c}}"></span>
                                                    @endforeach



                                                    <img class="pe-2" src="{{asset('./assets/img/Group 136.png')}}" alt="">
                                                    <img class="pe-2" src="{{asset('./assets/img/Rectangle 27 (2).png')}}"
                                                        alt="">
                                                    <img src="{{asset('./assets/img/Rectangle 28 (1).png')}}" alt="">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 d-flex flex-column align-items-center ps-5">


                                        <div class="">
                                            <a href="{{ route('ProductReview', ['orderId' => $order->id]) }}"> <button
                                                    type="button"
                                                    class="btn btn-warning text-white fw-bold fn-700 px-5">Write a
                                                    Review</button></a>
                                        </div>

                                    </div>

                                </div>
                        @endforeach

                    </div>



                </div>

            </div>

        </div>

        </div>

    </section>
@endsection
