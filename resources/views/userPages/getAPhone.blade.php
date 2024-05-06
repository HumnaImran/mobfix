@extends('userPages.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>





    .card {
    position: relative;
    overflow: hidden; /* Hide the button overflow */
}

.add-to-cart-container {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s ease; /* Transition effect */
}

.card:hover .add-to-cart-container {
    opacity: 1; /* Show on hover */
    transition: opacity 0.3s ease;
}


.add-to-cart-button:hover {
    background-color: none; /* Change background color to transparent on hover */
    border-color: #007bff; /* Add border color to maintain button visibility */
    color: #007bff; /* Change text color */
}
        .wishlist {
            color: #fff;
            display: none;
            margin-bottom: 3px;
            height: 36px;
            width: 38px;
            line-height: 30px;
            text-align: center;
            padding: 0;
            border: none;
            -webkit-transition: .3s;
            transition: .3s
        }


        .wishlist a {
            display: block;
            color: #fff;
            font-size: 14px
        }

        .wishlist {
            /* position: absolute;
            top: 15px;
            left: 15px; */
            background: #F86F03;
        }

        .wishlist:hover {
            background: #F86F03;
        }

        p .compare {
            position: absolute;
            top: 3pc;
            left: 15px;
            background: #f80b03
        }


        .wishlist {
            display: block
        }



        .card-foot-1 {
            background: transparent !important;
            border: none !important;

        }

        .footer-lst {

            border-radius: 2px;
            background: rgba(82, 95, 225, 0.21);

        }

        .button-2 {
            white-space: nowrap;
        }

        .spm2 {
            color: #F97813;
            font-family: Segoe UI;
            font-size: 10px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .checkout {
            color: #FFF !important;

            font-family: Segoe UI;
            font-size: 14px !important;
            background-color: ;
            font-weight: 600 !important;
            border-radius: 4px;
            background: var(--main-color, #525FE1) !important;
            box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.25) !important;
        }

        .quantity {
            padding: 4px 12px;
            border-radius: 2px;
            background: #F6F4F4;
            box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.20);

        }

        .button-e {
            color: rgba(0, 0, 0, 0.79);

            font-family: Segoe UI;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
        }

        .price-span {
            color: #F97813;
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;

        }

        .silver {
            color: #000 !important;

            font-family: Segoe UI !important;
            font-size: 18px !important;
            font-weight: 600 !important;
        }

        .oppo-mobile {
            color: rgba(0, 0, 0, 0.80);
            font-family: Segoe UI;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .silver span {
            color: rgba(0, 0, 0, 0.34);

            font-family: Segoe UI;
            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .silver {
            color: rgba(0, 0, 0, 0.79);
            font-family: Segoe UI;
            font-size: 11px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .total {

            color: #000;
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;

        }

        .total span {
            color: #F97813;
            font-family: Segoe UI;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .h1-delievery {
            color: rgba(0, 0, 0, 0.47);
            font-family: Segoe UI;
            font-size: 10px;
            font-weight: 400;

        }

        .h1-delievery span {
            color: #F97813;
            font-family: Segoe UI;
            font-size: 10px;
            font-weight: 400;

        }

        .cart {
            color: #000;
            font-family: Segoe UI;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .cart span {
            color: rgba(0, 0, 0, 0.38);
            font-family: Segoe UI;
            font-size: 15px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .in-1 {
            color: #000;

            font-family: Segoe UI;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .shopingcartmain {
            width: 400px
        }

        @media(max-width:400px) {
            .shopingcartmain {
                width: 310px
            }
        }



        .mobDiv::-webkit-scrollbar {

            height: 4px !important;
            display: none
        }

        .mobDiv::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .mobDiv::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid slategrey;
        }

        .slick-arrow {
            display: none !important
        }
    </style>


    <link rel="stylesheet" href="{{ asset('./assets/css/getphone.css') }}">

    <div class=" mobBanner d-flex justify-content-center align-items-center">
        <div class="">
            <h2 class="text-white ">Get a New Phone</h2>
        </div>
    </div>
    <div class="container-fluid px-md-5">
        <!-- search bar portion start  -->
        <div class="row justify-content-evenly mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {{-- <form action="{{ route('product.search') }}" method="GET" class="input-group"> --}}
                <div class="input-group">
                    <input type="text" name="keywords" id="searchInput" class="form-control inputOne"
                        aria-label="Dollar amount (with dot and two decimal places)"
                        placeholder="What Are You Looking For?">
                    <button class="btn input-group-text searchIcon p-3" onclick="applyFilter()"><i
                            class="fa-solid fa-magnifying-glass searchIconone"></i></button>
                    <!-- <span class="input-group-text">0.00</span> -->
                    <!-- <svg class="searchIconone" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 83 55" fill="none">
                                                <path d="M46.8154 32.4517C48.4493 30.2221 49.1812 27.4577 48.8645 24.7117C48.5478 21.9657 47.2059 19.4405 45.1073 17.6413C43.0087 15.8421 40.3082 14.9017 37.546 15.0081C34.7838 15.1146 32.1637 16.26 30.2098 18.2153C28.2559 20.1706 27.1123 22.7916 27.0078 25.5539C26.9034 28.3161 27.8458 31.016 29.6464 33.1133C31.4471 35.2106 33.9732 36.5506 36.7195 36.8654C39.4658 37.1801 42.2296 36.4463 44.458 34.8108H44.4564C44.507 34.8782 44.561 34.9424 44.6217 35.0048L51.1184 41.5014C51.4348 41.8181 51.864 41.996 52.3116 41.9962C52.7592 41.9964 53.1886 41.8187 53.5052 41.5023C53.8219 41.1859 53.9998 40.7566 54 40.309C54.0002 39.8614 53.8225 39.432 53.5061 39.1154L47.0095 32.6188C46.9491 32.5577 46.8842 32.503 46.8154 32.4517ZM47.2508 25.9652C47.2508 27.184 47.0107 28.3908 46.5443 29.5169C46.0779 30.6429 45.3943 31.666 44.5324 32.5278C43.6706 33.3896 42.6475 34.0732 41.5215 34.5396C40.3955 35.0061 39.1886 35.2461 37.9699 35.2461C36.7511 35.2461 35.5442 35.0061 34.4182 34.5396C33.2922 34.0732 32.2691 33.3896 31.4073 32.5278C30.5455 31.666 29.8618 30.6429 29.3954 29.5169C28.929 28.3908 28.689 27.184 28.689 25.9652C28.689 23.5038 29.6668 21.1431 31.4073 19.4026C33.1478 17.6621 35.5084 16.6843 37.9699 16.6843C40.4313 16.6843 42.7919 17.6621 44.5324 19.4026C46.2729 21.1431 47.2508 23.5038 47.2508 25.9652Z" fill="black" fill-opacity="0.55"/>
                                              </svg> -->
                </div>
                {{-- </form> --}}
            </div>
            <div class="col-md-3 "></div>
        </div>
        <!-- search bar portion end -->


        <!-- circle cards start  -->
        <style>
            .mobDiv {
                max-width: 1200px;
                margin: 0 auto;
                overflow-x: auto;
                /* Add horizontal scroll if needed */
                white-space: nowrap;
                /* Prevent text wrapping */
                padding: 10px;
                /* Optional padding for better aesthetics */
                /* scrollbar-width: thin; */
                /* Firefox */
                /* scrollbar-color: transparent transparent; Firefox */
            }



            .mobCard {
                display: inline-block;
                /* Display cards in a row */
                text-align: center;
                width: 200px;
                margin-right: 10px;
                /* Optional margin between cards */
            }

            /* .card-img-top {
                                        max-width: 100%;
                                        height: auto;
                                    } */
        </style>

        <div class=" my-4 text-center   mobDiv sliderimg">

            @foreach ($categories as $categorie)
                <div class="mobCard mx-sm-2 mx-2  d-flex justify-content-center"
                    onclick="loadProducts({{ $categorie->id }})">
                    <div class="">
                        <img src="{{ asset('Category_images/' . $categorie->image) }}" class="card-img-top imgBorder"
                            alt="...">
                        <p class="appleTxt text-center mt-1">{{ $categorie->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- circle cards END  -->

        <div class="row px-md-4 ">
            <div class="col-md-3 sideClr ">
                <div class="d-flex justify-content-between mt-2" style="margin-bottom: 1rem">
                   <div style="display: flex; justify-content:space-between; align-items:center; width:5rem"> <h5>Filters</h5><i class="fa-solid fa-filter"></i></div>
                    <button type="button" class="btn clearBtn">Clear</button>
                </div>
                <div class="accordion " id="accordionExampleone">
                    <div class="accordion-item accMargin ">
                        {{-- <h2 class="accordion-header cardsMain head">
                            <button class="btn catBtn  accSet w-100 d-flex justify-content-between" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                CATEGORIES <span class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5" viewBox="0 0 6 5"
                                        fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2> --}}
                        <div id="accordionExample" class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body bodyClr">
                                        <select id="categoryDropdown" class="form-select"
                                            onchange="applyFilter()">
                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>

                {{-- <div class="accordion " id="accordionExampletwo">
                    <div class="accordion-item accMargin ">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold smart" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5" viewBox="0 0 6 5"
                                        fill="none">
                                        <path
                                            d="M5.69982 4.74607H0.299665C0.244992 4.7459 0.1914 4.73082 0.144659 4.70245C0.0979176 4.67409 0.0597963 4.63352 0.0343995 4.5851C0.00900269 4.53668 -0.00270844 4.48225 0.000526905 4.42768C0.00376177 4.3731 0.0218201 4.32043 0.0527587 4.27536L2.75284 0.375246C2.86474 0.213541 3.13415 0.213541 3.24635 0.375246L5.94643 4.27536C5.97768 4.32034 5.99601 4.37303 5.99942 4.4277C6.00283 4.48237 5.99119 4.53693 5.96577 4.58545C5.94035 4.63397 5.90212 4.67459 5.85523 4.70291C5.80835 4.73123 5.75459 4.74616 5.69982 4.74607Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                                Smartphones
                            </button>
                        </h2>
                        <div id="collapsetwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body bodyClr">
                                <p>your smartphone portion</p>
                            </div>
                        </div>
                    </div>

                </div>
                <hr> --}}

                <div class="accordion " id="accordionExamplethree">
                    <div class="accordion-item accMargin ">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold w-100 d-flex justify-content-between smart" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true"
                                aria-controls="collapsethree">
                                Price <span class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5" viewBox="0 0 6 5"
                                        fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapsethree" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body bodyClr">
                                <div class="d-flex ">
                                    <input type="email" class="form-control" placeholder="17,000" id="min_price">
                                    <input type="email" class="form-control mx-2" placeholder="18,000" id="max_price">
                                    <button type="button" class="btn " onclick="applyFilter()">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="38" height="26"
                                                viewBox="0 0 38 26" fill="none">
                                                <rect width="38" height="26" fill="#F86F03" />
                                                <path
                                                    d="M24 12.8654C24.0004 13.0186 23.9608 13.1692 23.8851 13.3028C23.8095 13.4363 23.7003 13.5481 23.5682 13.6273L15.3818 18.598C15.2438 18.6819 15.0857 18.7276 14.9239 18.7306C14.7621 18.7336 14.6024 18.6936 14.4614 18.6149C14.3217 18.5374 14.2053 18.4243 14.1242 18.2873C14.0431 18.1503 14.0002 17.9944 14 17.8355V7.89527C14.0002 7.7364 14.0431 7.58046 14.1242 7.44348C14.2053 7.3065 14.3217 7.19343 14.4614 7.11589C14.6024 7.03713 14.7621 6.99718 14.9239 7.00015C15.0857 7.00313 15.2438 7.04892 15.3818 7.13281L23.5682 12.1035C23.7003 12.1827 23.8095 12.2945 23.8851 12.428C23.9608 12.5615 24.0004 12.7122 24 12.8654Z"
                                                    fill="white" />
                                            </svg></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>




                <div class="accordion" id="accordionExamplefour">
                    <div class="accordion-item accMargin">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold w-100 d-flex justify-content-between smart" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true"
                                aria-controls="collapsefour">
                                Battery Capacity
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body bodyClr">
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="batteryCapacity" id="radio4000" value="4000">
                                    <label class="btn btn-outline-primary" for="radio4000" style="width:100% !important">
                                        4000mAh & above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="batteryCapacity" id="radio5000" value="5000">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        5000mAh & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="batteryCapacity" id="radio6000" value="6000">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        6000mAh & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="batteryCapacity" id="radio7000" value="7000">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        7000mAh & above
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                <div class="accordion" id="accordionExamplefour">
                    <div class="accordion-item accMargin">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold w-100 d-flex justify-content-between smart" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true"
                                aria-controls="collapsefive">
                                Memory
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapsefive" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body bodyClr">
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="Memory" id="radio4" value="4">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        4GB & above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="Memory" id="radio8" value="8">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        8GB & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="Memory" id="32" value="32">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        32GB & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="Memory" id="radio128" value="128">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        128GB & above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="Memory" id="radio256" value="256">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        256GB & above
                                    </label>
                                </div>
                                {{-- <div class="d-flex">
                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio1" >
                                    <label class="btn btn-outline-primary" for="radio1">10,000 - 15,000 mAh</label>

                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio2" value="15001-20000">
                                    <label class="btn btn-outline-primary" for="radio2">15,001 - 20,000 mAh</label>

                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio3" value="20001-25000">
                                    <label class="btn btn-outline-primary" for="radio3">20,001 - 25,000 mAh</label>

                                    <button type="button" class="btn" onclick="loadProductsByPrice()">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="26" viewBox="0 0 38 26" fill="none">
                                                <rect width="38" height="26" fill="#F86F03" />
                                                <path d="M24 12.8654C24.0004 13.0186 23.9608 13.1692 23.8851 13.3028C23.8095 13.4363 23.7003 13.5481 23.5682 13.6273L15.3818 18.598C15.2438 18.6819 15.0857 18.7276 14.9239 18.7306C14.7621 18.7336 14.6024 18.6936 14.4614 18.6149C14.3217 18.5374 14.2053 18.4243 14.1242 18.2873C14.0431 18.1503 14.0002 17.9944 14 17.8355V7.89527C14.0002 7.7364 14.0431 7.58046 14.1242 7.44348C14.2053 7.3065 14.3217 7.19343 14.4614 7.11589C14.6024 7.03713 14.7621 6.99718 14.9239 7.00015C15.0857 7.00313 15.2438 7.04892 15.3818 7.13281L23.5682 12.1035C23.7003 12.1827 23.8095 12.2945 23.8851 12.428C23.9608 12.5615 24.0004 12.7122 24 12.8654Z" fill="white" />
                                            </svg>
                                        </span>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>



                <div class="accordion" id="accordionExamplefour">
                    <div class="accordion-item accMargin">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold w-100 d-flex justify-content-between smart" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="true"
                                aria-controls="collapsesix">
                                RAM
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body bodyClr">
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="RAM" id="radio4" value="4">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        4GB & above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="RAM" id="radio6" value="6">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        6GB & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="RAM" id="radio8" value="8">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        8GB & above
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" onchange="applyFilter()" type="radio"
                                        name="RAM" id="radio12" value="12">
                                    <label class="btn btn-outline-primary" for="radio1" style="width:100% !important">
                                        12GB & above
                                    </label>
                                </div>
                                {{-- <div class="d-flex">
                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio1" >
                                    <label class="btn btn-outline-primary" for="radio1">10,000 - 15,000 mAh</label>

                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio2" value="15001-20000">
                                    <label class="btn btn-outline-primary" for="radio2">15,001 - 20,000 mAh</label>

                                    <input type="radio" class="btn-check" name="batteryCapacity" id="radio3" value="20001-25000">
                                    <label class="btn btn-outline-primary" for="radio3">20,001 - 25,000 mAh</label>

                                    <button type="button" class="btn" onclick="loadProductsByPrice()">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="26" viewBox="0 0 38 26" fill="none">
                                                <rect width="38" height="26" fill="#F86F03" />
                                                <path d="M24 12.8654C24.0004 13.0186 23.9608 13.1692 23.8851 13.3028C23.8095 13.4363 23.7003 13.5481 23.5682 13.6273L15.3818 18.598C15.2438 18.6819 15.0857 18.7276 14.9239 18.7306C14.7621 18.7336 14.6024 18.6936 14.4614 18.6149C14.3217 18.5374 14.2053 18.4243 14.1242 18.2873C14.0431 18.1503 14.0002 17.9944 14 17.8355V7.89527C14.0002 7.7364 14.0431 7.58046 14.1242 7.44348C14.2053 7.3065 14.3217 7.19343 14.4614 7.11589C14.6024 7.03713 14.7621 6.99718 14.9239 7.00015C15.0857 7.00313 15.2438 7.04892 15.3818 7.13281L23.5682 12.1035C23.7003 12.1827 23.8095 12.2945 23.8851 12.428C23.9608 12.5615 24.0004 12.7122 24 12.8654Z" fill="white" />
                                            </svg>
                                        </span>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                {{-- <div class="accordion " id="accordionExamplefour">
                    <div class="accordion-item accMargin ">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold w-100 d-flex justify-content-between smart" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true"
                                aria-controls="collapsefour">
                                Smartwatches<span class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 0.253931H0.299665C0.244992 0.254102 0.1914 0.269182 0.144659 0.297545C0.0979176 0.32591 0.0597963 0.366483 0.0343995 0.414901C0.00900269 0.463319 -0.00270844 0.517746 0.000526905 0.572325C0.00376177 0.626903 0.0218201 0.679566 0.0527587 0.724644L2.75284 4.62475C2.86474 4.78646 3.13415 4.78646 3.24635 4.62475L5.94643 0.724644C5.97768 0.67966 5.99601 0.626971 5.99942 0.572301C6.00283 0.517632 5.99119 0.463073 5.96577 0.414553C5.94035 0.366033 5.90212 0.325407 5.85523 0.297089C5.80835 0.268771 5.75459 0.253844 5.69982 0.253931Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bodyClr">
                                <div class="d-flex ">
                                    <button type="button" class="btn btn-light bg-white active"> Apple Watch</button>
                                    <button type="button" class="btn btn-light bg-white active  mx-2">Samsung
                                        Watch</button>

                                    <!-- <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="17,000">
                                    <input type="email" class="form-control mx-2" id="exampleFormControlInput1" placeholder="18,000"> -->
                                    <button type="button" class="btn ">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="38" height="26"
                                                viewBox="0 0 38 26" fill="none">
                                                <rect width="38" height="26" fill="#F86F03" />
                                                <path
                                                    d="M24 12.8654C24.0004 13.0186 23.9608 13.1692 23.8851 13.3028C23.8095 13.4363 23.7003 13.5481 23.5682 13.6273L15.3818 18.598C15.2438 18.6819 15.0857 18.7276 14.9239 18.7306C14.7621 18.7336 14.6024 18.6936 14.4614 18.6149C14.3217 18.5374 14.2053 18.4243 14.1242 18.2873C14.0431 18.1503 14.0002 17.9944 14 17.8355V7.89527C14.0002 7.7364 14.0431 7.58046 14.1242 7.44348C14.2053 7.3065 14.3217 7.19343 14.4614 7.11589C14.6024 7.03713 14.7621 6.99718 14.9239 7.00015C15.0857 7.00313 15.2438 7.04892 15.3818 7.13281L23.5682 12.1035C23.7003 12.1827 23.8095 12.2945 23.8851 12.428C23.9608 12.5615 24.0004 12.7122 24 12.8654Z"
                                                    fill="white" />
                                            </svg></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr> --}}

                {{-- <div class="accordion " id="accordionExamplefive">
                    <div class="accordion-item accMargin ">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold smart" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 4.74607H0.299665C0.244992 4.7459 0.1914 4.73082 0.144659 4.70245C0.0979176 4.67409 0.0597963 4.63352 0.0343995 4.5851C0.00900269 4.53668 -0.00270844 4.48225 0.000526905 4.42768C0.00376177 4.3731 0.0218201 4.32043 0.0527587 4.27536L2.75284 0.375246C2.86474 0.213541 3.13415 0.213541 3.24635 0.375246L5.94643 4.27536C5.97768 4.32034 5.99601 4.37303 5.99942 4.4277C6.00283 4.48237 5.99119 4.53693 5.96577 4.58545C5.94035 4.63397 5.90212 4.67459 5.85523 4.70291C5.80835 4.73123 5.75459 4.74616 5.69982 4.74607Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span> Shop
                            </button>
                        </h2>
                        <div id="collapsefive" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bodyClr">
                                <div class="">
                                    <p>your shop content</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr> --}}

                {{-- <div class="accordion " id="accordionExamplesix">
                    <div class="accordion-item accMargin ">
                        <h2 class="accordion-header cardsMain head">
                            <button class="btn fw-bold smart" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="5"
                                        viewBox="0 0 6 5" fill="none">
                                        <path
                                            d="M5.69982 4.74607H0.299665C0.244992 4.7459 0.1914 4.73082 0.144659 4.70245C0.0979176 4.67409 0.0597963 4.63352 0.0343995 4.5851C0.00900269 4.53668 -0.00270844 4.48225 0.000526905 4.42768C0.00376177 4.3731 0.0218201 4.32043 0.0527587 4.27536L2.75284 0.375246C2.86474 0.213541 3.13415 0.213541 3.24635 0.375246L5.94643 4.27536C5.97768 4.32034 5.99601 4.37303 5.99942 4.4277C6.00283 4.48237 5.99119 4.53693 5.96577 4.58545C5.94035 4.63397 5.90212 4.67459 5.85523 4.70291C5.80835 4.73123 5.75459 4.74616 5.69982 4.74607Z"
                                            fill="#0C0B0B" fill-opacity="0.42" />
                                    </svg>
                                </span> Location
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bodyClr">
                                <div class="">
                                    <p>your location</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr> --}}
            </div>
            <div class="col-md-9 cardsMain ">
                <h4 class="ms-5">Smartphones</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex  linksCol justify-content-between">
                            <div class=" sale-1">
                                <p class="sort">Sort By</p>
                                <a href="javascript:void(0)" class="popular pt-1 mx-md-4"
                                    onclick="sortBy('popularity')">Popularity</a>
                                <a href="javascript:void(0)" class="popular pt-1 mx-md-4"
                                    onclick="sortBy('lowToHigh')">Price -- Low to High</a>
                                <a href="javascript:void(0)" class="popular pt-1 mx-md-4"
                                    onclick="sortBy('highToLow')">Price -- High to Low</a>
                            </div>
                            <div class="">
                                <button class="btn border-0 " type="button" id="filterDropdownButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('./assets/img/filter1 (1).png')}}" alt="">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdownButton">
                                    <!-- Dropdown header -->
                                    <li class="dropdown-header">
                                        <div class="d-flex justify-content-between">
                                            <h1 class="cart">Your cart <span><span>({{ count($cartItems ?? []) }})</span></span></h1>
                                            <button class="btn-close" data-bs-dismiss="dropdown"></button>
                                        </div>
                                    </li>
                                    <!-- Cards go here -->
                                    <li>
                                        <div class="card  p-2 shopingcartmain">
                                            <div class="card-body">
                                                <div class=" main d-flex align-items-center gap-2"
                                                    style="flex-direction:column">
                                                    {{-- <div>
                                                        <input class="" type="radio" name="selectedProducts"
                                                            id="product1">
                                                    </div> --}}
                                                    <!-- for image and details -->
                                                    @if ($cartItems !== null)
                                                    @foreach ($cartItems as $cartItem)
                                                        <div class=" d-flex py-3"
                                                            style="border-bottom:2px solid rgba(0, 0, 0, 0.16) ;width:100%">
                                                            {{-- <img src="{{asset('/Productimages/.' )}}" class="img-fluid me-4 "
                                                                alt="Card Image" style="width: 25%;"> --}}
                                                            @if ($cartItem->product->images->isNotEmpty())
                                                                <img src="{{ url('storage/' . $cartItem->product->images->first()->image) }}"
                                                                    class="img-fluid me-4" alt="Card Image"
                                                                    style="width:50px;height:70px">
                                                            @else
                                                                <img src="{{ asset('path/to/default/image.jpg') }}"
                                                                    class="img-fluid me-4" alt="Default Image"
                                                                    style="width:50px;height:70px">
                                                            @endif
                                                            <div class="div-1">
                                                                <!-- for details items -->
                                                                <h5 class="card-title oopo-mobile">
                                                                    {{ $cartItem->product->name }}</h5>
                                                                <p class="card-text silver m-0">Color:
                                                                    <span>
                                                                        @php
                                                                            $colorSpec = $cartItem->product->productSpecs
                                                                                ->where('pspecs.name', 'colors')
                                                                                ->first();
                                                                        @endphp

                                                                        @if ($colorSpec)
                                                                            {{ $colorSpec->value }}
                                                                        @else
                                                                            N/A (or any default value/message)
                                                                        @endif
                                                                    </span>
                                                                </p>
                                                                <div
                                                                    class="button mt-2 d-flex align-items-center justify-content-between w-100 ">
                                                                    <h4 class="button-e">
                                                                        Rs: <span id="totalPrice" class="price-span"
                                                                            data-price="{{ $cartItem->price }}">{{ $cartItem->price }}</span>
                                                                    </h4>
                                                                    {{-- <div class="bi-1">
                                                                        <button class="btn button1"
                                                                            onclick="decrementQuantity(event)">-</button>
                                                                        <span class="quantity">1</span>
                                                                        <button class="btn"
                                                                            onclick="incrementQuantity(event)">+</button>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Additional cards go here -->
                                    <li class="dropdown-footer footer-lst px-3 mt-5">
                                        <div class="d-flex justify-content-center py-4 align-items-center">
                                            {{-- <div>
                                                <input class=" me-2" type="radio" name="selectedProducts"
                                                    id="product1">
                                                <span class="in-1">ALL</span>
                                            </div> --}}
                                            {{-- <div>
                                                <h1 class="h1-delievery">
                                                    Delivery: <span class="span2">Rs.0</span>
                                                </h1>
                                                <h1 class="total">Total <span class="Totalprice"> Rs.0</span></h1>
                                                <p></p>
                                            </div> --}}
                                            <a href="{{ route('checkout') }}" class="btn checkout">Process Checkout</a>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4"> </div>
                </div>
                {{-- <div class="row mt-4 mb-5">
                    <div class="col-md-6 col-lg-4 mt-2">
                        <div id="productsContainer"></div>
                    </div>
                </div> --}}
                <div class="row mt-4 mb-5" id="productsContainer">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4 mt-2">
                            <div class="card mobCardShahdow " data-price="{{ $product->price }}">
                                <a href="{{ route('viewMobileDetails', ['product_id' => $product->id]) }}">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                            class="card-img-top imgHeight" alt="...">
                                    @else
                                        <img src="{{ asset('./assets/images/mobcardimg.png') }}"
                                            class="card-img-top imgHeight" alt="Default Image">
                                    @endif



                                </a>
                                <div class="card-body">

                                    <p class="card-text">{{ $product->name }}</p>
                                    <div class="d-flex" style="justify-content:space-between; align-items:center; width:50%;">
                                        <button type="button" class="btn priceBtn text-white">
                                            {{ $averageRatings[$product->id] }}.00<span class="pb-5"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 8 9" fill="none">
                                                    <path
                                                        d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z"
                                                        fill="white" />
                                                </svg></span></button> <form action="{{ route('AddTofavourtes', ['product' => $product->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn priceBtn btn-default wishlist" data-toggle="tooltip"
                                                        data-placement="right" title="Favorite" >
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                    {{-- <button type="submit" class="btn btn-primary add-to-cart-button">Add To Favorite</button> --}}
                                                </form>

                                        {{-- <form action="{{ route('AddTofavourtes', ['product' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-default wishlist" data-toggle="tooltip"
                                                data-placement="right" title="Favorite">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </form> --}}
                                        {{-- <form action="{{ route('addToCart', ['product' => $product->id]) }}" method="post" class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-primary add-to-cart-button">Add to Cart</button>
                                        </form> --}}

                                        <div class="add-to-cart-container" style="display: flex; flex-direction:column; justify-content:center; align-items:center">
                                            <form method="POST" action="{{ route('addToCart', ['product' => $product->id]) }}">
                                                @csrf
                                            <button type="submit" class=" add-to-cart-button" style="background-color:#f86f03 ;
                                            border: 1px solid #f86f03;
                                            color: #ffffff;
                                            padding: 8px 15px;
                                            border-radius: 30px;
                                            width: 165px;
                                            text-align: center;
                                            -webkit-transition: all .3s;
                                            transition: all .3s;
                                            margin: 5px 0;">Add to Cart</button>
                                            </form>
                                            <br>

                                                <a href="{{ route('viewMobileDetails', ['product_id' => $product->id]) }}"> <button type="submit" class=" add-to-cart-button" style="background-color: #4e4b4b;
                                                    border: 1px solid #000000;
                                                    color: #ffffff; padding: 8px 15px;
    border-radius: 30px;
    width: 165px;
    text-align: center;
    -webkit-transition: all .3s;
    transition: all .3s;
    margin: 5px 0;">View Details</button></a>

                                        </div>
                                    </div>
                                    <p class="mobPrice mt-2">Rs {{ $product->price }}</p>
                                    <div class="card-backdrop"></div>
                                </div>
                            </div>


                        </div>
                    @endforeach


                </div>

                <hr>
                <!-- <div class="p-0 m-0"> -->
                <span class="page ms-3 fw-bold pageMargin">Page 1 of 2</span>
                <div class="d-flex justify-content-center align-items-center pageMarg">
                    <nav aria-label="...">
                        <ul class="pagination pageCircle">
                            <li class=" active mx-1 pageOne" aria-current="page">
                                <span class="page-link pageCircle text-white">1</span>
                            </li>
                            <li class=""><a class="page-link pageCircle twoClr text-white" href="#">2</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <!-- </div> -->


            </div>
        </div>



    </div>

    {{-- <script>
        function searchProducts() {
            var keywords = document.getElementById('searchInput').value;

            $.ajax({
                url: "{{ route('product.search') }}",
                type: "GET",
                data: { keywords: keywords },
                success: function(response) {
                    // Update the product list based on the response
                    // For example, you can iterate over the response and update the HTML
                    // Assume there's a div with id="productsContainer" to display products
                    var productsContainer = $('#productsContainer');
                    productsContainer.empty(); // Clear previous results

                    response.forEach(function(product) {
                        var productHtml = `
                            <div class="col-md-6 col-lg-4 mt-2">
                                <div class="card mobCardShahdow" data-price="${product.price}">

                                <a href="/viewMobileDetails/${product.id}">
                                <img src="{{ asset('storage/' . $product->images->first()->image) }}" class="card-img-top imgHeight" alt="${product.name}">
                            </a>
                                    <div class="card-body">
                                        <p class="card-text">${product.name}</p>
                                        <button type="button" class="btn priceBtn text-white">${product.price}</button>
                                        <small class="pt-2 ms-2">(0)</small>
                                        <p class="mobPrice mt-2">Rs ${product.price}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        productsContainer.append(productHtml);
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error(error);
                }
            });
        }
        </script> --}}


    <!-- Add the following JavaScript code at the end of your HTML body or in a script tag -->
    <script>
        function updateQuantity(event, increment) {
            // Find the parent container of the clicked button
            var container = $(event.target).closest('.d-flex');

            // Find the quantity element and update its value
            var quantityElement = container.find('.quantity');
            var quantity = parseInt(quantityElement.text()) + increment;
            quantity = Math.max(1, quantity); // Ensure quantity is at least 1
            quantityElement.text(quantity);

            // Find the price element and update the total price
            var priceElement = container.find('.price-span');
            var pricePerUnit = parseFloat(priceElement.data('price'));
            var totalPrice = quantity * pricePerUnit;
            priceElement.text(totalPrice.toFixed(2));

            // Recalculate the total price for all items
            calculateTotalPrice();
        }

        function calculateTotalPrice() {
            // Find all price elements and calculate the total price
            var totalPrice = 0;
            $('.price-span').each(function() {
                totalPrice += parseFloat($(this).text());
            });

            // Update the total price element
            $('.Totalprice').text(totalPrice.toFixed(2));
        }
    </script>





    <script>
        function loadProducts(categoryId) {
            const container = document.getElementById('productsContainer');
            container.innerHTML = 'Loading...';

            fetch(`/get-products-by-category/${categoryId}`)
                .then(response => response.text())
                .then(products => {
                    container.innerHTML = products;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
    <script>
        function loadProductsByPrice() {
            const minPrice = document.getElementById('min_price').value;
            const maxPrice = document.getElementById('max_price').value;
            const container = document.getElementById('productsContainer');
            container.innerHTML = 'Loading...';

            fetch(`/products/filter?min_price=${minPrice}&max_price=${maxPrice}`)
                .then(response => response.text())
                .then(products => {
                    container.innerHTML = products;
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function applyFilter() {

            const minPrice = document.getElementById('min_price').value;
            const maxPrice = document.getElementById('max_price').value;
            const keywords = document.getElementById('searchInput').value;
            const categoryDropdown = document.getElementById('categoryDropdown').value;
            let batteryCapacity = document.querySelector('input[name="batteryCapacity"]:checked');
            let RAM = document.querySelector('input[name="RAM"]:checked');
            let Memory = document.querySelector('input[name="Memory"]:checked');

            if (batteryCapacity) {
                batteryCapacity = batteryCapacity.value;
            } else {
                batteryCapacity = null
            }
            if (RAM) {
                RAM = RAM.value;
            } else {
                RAM = null;
            }
            if (Memory) {
                Memory = Memory.value;
            } else {
                Memory = null;
            }

            const container = document.getElementById('productsContainer');
            container.innerHTML = 'Loading...';

            fetch(
                    `/products/filter?min_price=${minPrice}&max_price=${maxPrice}&keywords=${keywords}&batteryCapacity=${batteryCapacity}&RAM=${RAM}&Memory=${Memory}&category=${categoryDropdown}`
                    )
                .then(response => response.json())
                .then(products => {
                    container.innerHTML = '';
                    products.forEach(product => {
                        let contetn = ` <div class="col-md-6 col-lg-4 mt-2">
    <div class="card mobCardShahdow" data-price="${product.price}" id="productsContainer">
        <a href="{{ route('viewMobileDetails', ['product_id' => $product->id]) }}">

            <img src="/storage/${product.images[0]['image']}" class="card-img-top imgHeight"
                    alt="...">

        </a>
        <div class="card-body">

            <p class="card-text">${product.name} </p>
            <div class="d-flex">
                <button type="button" class="btn priceBtn text-white">${product.avg_rating[0]} <span class="pb-5"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 8 9"
                            fill="none">
                            <path
                                d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z"
                                fill="white" />
                        </svg></span></button>

                <small class="pt-2 ms-2">(${product.avg_rating[1]})</small>
            </div>
            <p class="mobPrice mt-2">Rs ${product.price} </p>

        </div>
    </div>
</div>`;
                        container.insertAdjacentHTML('beforeend', contetn)
                    });
                })
                .catch(error => {
                    console.error(error);
                });

        }
    </script>


    <script>
        function searchProducts() {
            const container = document.getElementById('productsContainer');
            container.innerHTML = 'Loading...';

            const keywords = document.getElementById('searchInput').value;

            fetch(`/search-products?keywords=${keywords}`)
                .then(response => response.text())
                .then(products => {
                    container.innerHTML = products;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>

    <script>
        function loadProducts(batteryRange) {
            const container = document.getElementById('productsContainer');
            container.innerHTML = 'Loading...';

            fetch(`/get-products-by-battery-range/${batteryRange}`)
                .then(response => response.text())
                .then(products => {
                    container.innerHTML = products;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>



    <script>
        function incrementQuantity(event) {
            event.stopPropagation(); // Prevent the event from propagating and closing the dropdown
            const quantityElement = event.currentTarget.parentElement.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        }

        function decrementQuantity(event) {
            event.stopPropagation(); // Prevent the event from propagating and closing the dropdown
            const quantityElement = event.currentTarget.parentElement.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
            }
        }
    </script>


    <script>
        // Get all navigation links
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Add click event listeners to each link
        navLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                // Prevent the default behavior of the anchor tag
                // event.preventDefault();

                // Remove the 'active' class from all links
                navLinks.forEach((navLink) => {
                    navLink.classList.remove('active');
                });

                // Add the 'active' class to the clicked link
                link.classList.add('active');
            });
        });
    </script>


    <script>
        function sortBy(sortOption) {
            fetch(`/getallproducts/${sortOption}`)
                .then(response => response.text())
                .then(products => {
                    console.log(products)
                    const container = document.getElementById('productsContainer');
                    container.innerHTML = '';
                    container.innerHTML = products;
                    // if (sortOption === 'lowToHigh') {
                    //     products.sort((a, b) => a.price - b.price);
                    // }

                    // const container = document.getElementById('productsContainer');
                    // container.innerHTML = '';

                    // products.forEach(product => {

                    //     const productCardHtml = `

                //             <div class="card mobCardShahdow" data-price="${product.price}">
                //                 <a href="/viewMobileDetails/${product.id}">

                //                     <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                //                                 class="card-img-top imgHeight" alt="...">

                //                 </a>
                //                 <div class="card-body">
                //                     <p class="card-text">${product.name}</p>
                //                     <div class="d-flex">
                //                         <button type="button" class="btn priceBtn text-white">4.00 <span class="pb-5"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 8 9" fill="none"><path d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z" fill="white" /></svg></span></button>
                //                         <small class="pt-2 ms-2">(0)</small>
                //                     </div>
                //                     <p class="mobPrice mt-2">Rs ${product.price}</p>
                //                 </div>
                //             </div>


                //     `;
                    //     container.insertAdjacentHTML('beforeend', productCardHtml);
                    // });
                });
        }
    </script>

    {{-- <script>
    function sortBy(sortOption) {
        const container = document.querySelector('.row');
        const products = Array.from(container.querySelectorAll('.mobCardShahdow'));

        if (sortOption === 'lowToHigh') {
            products.sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                return priceA - priceB;
            });
        } else if (sortOption === 'highToLow') {
            products.sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                return priceB - priceA;
            });
        }

        container.innerHTML = '';
        products.forEach(product => {
            container.appendChild(product);
        });
    }
</script> --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script>
        $('.sliderimg').slick({



            autoplay: true,
            autoplaySpeed: 2000,

            infinite: true,
            speed: 500,
            slidesToShow: 7,

            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 992, // Adjust as needed
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768, // Adjust as needed
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576, // Adjust as needed
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.sliderimghjhjh').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,

                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 768, // Adjust as needed
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576, // Adjust as needed
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection
