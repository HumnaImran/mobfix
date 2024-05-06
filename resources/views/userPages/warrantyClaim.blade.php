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

            color: #fff;

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="bACKground">
        <h1 class="MOB">Mob<span class="FIX">Fix</span></h1>
        <h2>Warranty</h2>
        <p class="">Learn About What’s Covered <br> Under Your Warranty</p>
    </div>
    <div class="mainCONTent">
        <div class="container">
            <p class="WARENTTEXT pt-md-5 pt-3 ">We at MobFix provide different types of warranty depending on what type
                of Repair or Product it is. The use of our repair Service may void your manufacturer’s warranty. If you
                would like to avoid this, then please take your Device directly to the manufacturer. The Warranty is
                linked to a specific device as identified by its unique IMEI or serial number and to a specific Customer
                as identified by the records on our system. It will cover the Customer for any re-occurrence of the
                original fault and for the part replaced / repaired only, however if additional faults arise, they will
                not be covered under the terms of this Warranty. Furthermore, the Warranty will not cover accidental
                damage, nor will the cover extend should the device change ownership.</p>

            <div class="d-flex justify-content-center align-items-center flex-column py-2 ">
                  @csrf
                <h2 class="CLAIM">Warranty Claim Form</h2>
                <p class="WARENTTEXT">Fill in the form below if you wish to make a warranty claim.</p>
            </div>
            <form action="{{ route('submit.warranty.claim') }}" method="POST" class="d-flex flex-column py-5">
                @csrf
                <div class="d-flex flex-column " style="margin-bottom: 2rem">

                   <label class="FORMSLABELD py-1 " for="">Full Names</label>
                <input class="WARENTTEXT BORDERD py-3 px-2 bg-transparent " type="text" placeholder="Name Here " name="full_names">
                </div>

                <div class="d-flex flex-column " style="margin-bottom: 2rem">
                <label class="FORMSLABELD py-1 pt-2 " for="">Email</label>
                <input class="WARENTTEXT BORDERD py-3 px-2 bg-transparent " type="email" placeholder=" Email Here " name="email">
                </div>

                <div class="d-flex flex-column " style="margin-bottom: 2rem">
                <label class="FORMSLABELD py-1 pt-2" for="">Phone Number</label>
                <input class="WARENTTEXT BORDERD py-3 px-2 bg-transparent " type="tel" placeholder="Phone Number Here" name="phone_number">
                </div>

                <div class="d-flex flex-column " style="margin-bottom: 1rem">
                <div class="form-check py-2">
                    <input class="form-check-input  INPUTBOX" type="radio" name="claimType" id="repairServiceRadio" value="repair_service">
                    <label class="form-check-label FORMSLABELD px-2" for="repairServiceRadio">Warranty Claim for Repair Service</label>
                </div>
                <div class="form-check py-2">
                    <input class="form-check-input  INPUTBOX" type="radio" name="claimType" id="purchasedMobileRadio" value="purchased_mobile">
                    <label class="form-check-label FORMSLABELD px-2" for="purchasedMobileRadio" >Warranty Claim for Purchased Mobile</label>
                </div>
                </div>

                <div class="d-flex flex-column " >
                <div id="repairServiceDropdown" class="py-2" style="display: none;">
                    {{-- <label class="FORMSLABELD py-1 pt-2" for="">Select Store</label> --}}
                    <select class="WARENTTEXT BORDERD py-3 px-2 " name="store_id">
                        <option value="">Select Store</option>
                        @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                        <!-- Populate options dynamically using JavaScript -->
                    </select>
                </div>
                </div>


                <div class="d-flex flex-column " >
                <div id="purchasedMobileDropdown" class="py-2" style="display: none;">
                    {{-- <label class="FORMSLABELD py-1 pt-2" for="">Select Product</label> --}}
                    <select class="WARENTTEXT BORDERD py-3 px-2 " name="product_id">
                        <option value=''>Select Product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach

                    </select>
                </div>
                </div>



                {{-- <label class="FORMSLABELD py-1 pt-2" for="">Make/Model</label>
                <input class="WARENTTEXT BORDERD py-3 px-2 bg-transparent " type="text" placeholder="Make/Model "> --}}

                <label class="FORMSLABELD py-1 pt-2" for="">Claim Information</label>
                <input class="WARENTTEXT BORDERD py-3 pb-5 px-2 bg-transparent " type="text"
                    placeholder="Write’s Your Claim Information" name="claim_information">
                <div class="form-check py-2 ">
                    <input class="form-check-input bg-transparent  INPUTBOX" type="checkbox" id="agreeCheckbox" name="agreeCheckbox">
                    <p class="WARENTTEXT">PS. We will use your above information only to contact you about your inquiry
                        unless you opt into marketing.

                    </p>
                    <p class="WARENTTEXT">For further information about how we handle your data, you can view our privacy
                        policy

                    </p>
                </div>

                <div class="d-flex justify-content-center py-3  align-items-center ">

                    <button type="submit" class="btn BTNTEXTED  btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const repairServiceRadio = document.getElementById('repairServiceRadio');
        const purchasedMobileRadio = document.getElementById('purchasedMobileRadio');
        const repairServiceDropdown = document.getElementById('repairServiceDropdown');
        const purchasedMobileDropdown = document.getElementById('purchasedMobileDropdown');

        repairServiceRadio.addEventListener('change', () => {
            if (repairServiceRadio.checked) {
                repairServiceDropdown.style.display = 'block';
                purchasedMobileDropdown.style.display = 'none';
            }
        });

        purchasedMobileRadio.addEventListener('change', () => {
            if (purchasedMobileRadio.checked) {
                purchasedMobileDropdown.style.display = 'block';
                repairServiceDropdown.style.display = 'none';
            }
        });
    </script>
@endsection
