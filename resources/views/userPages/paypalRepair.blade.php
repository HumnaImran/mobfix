{{--
@extends('userPages.master')
@section('content') --}}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />


<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #0C4160;

    padding: 30px 10px;
}

.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px;
}

p {
    margin: 0px;
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto;

}


.btn.btn.btn-primary:hover {
    background-position: right center;
    color: #fff;
    text-decoration: none;
}



.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in;
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle;
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none;
}

.text {
    font-size: 14px;
    font-weight: 600;
}

::placeholder {
    font-size: 14px;
    font-weight: 600;
}
    </style>
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Pay Through Paypal</p>
        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Your Name</p>
                    <input class="form-control mb-3" type="text" placeholder="Name" value="{{ $repairOrder->user->name }}">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Repair Details</p>
                    {{-- <input class="form-control mb-3" type="text" placeholder="1234 5678 435678"> --}}

                    <input class="form-control mb-3" type="text" placeholder="{{ $repairOrder->repairType->name }}" value="{{ $repairOrder->repairType->name }}">


                </div>
            </div>
            @php
             $amount=$repairOrder->price;

        @endphp
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Total Amount</p>
                    <input class="form-control mb-3" type="text" placeholder="{{$amount}}">
                </div>
            </div>
            {{-- <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p>
                    <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                </div>
            </div> --}}
            {{-- <form id="paymentForm" action="{{ route('payment') }}" method="POST">
            @csrf
            <!-- Hidden input field to hold the selected payment method -->
            <input type="hidden" name="payment_method" id="paymentMethod" value="">

            <!-- Radio button converted to a form button -->
            <button type="submit" class="btn btn-primary" onclick="selectPaymentMethod('paypal')">Pay Through Paypal</button>
        </form> --}}
            <div class="col-12">
                <div class="mb-3" style="display: flex; justify-content:center; align-item:center;">
                    <form id="paymentForm" action="{{ route('paymentRepair', ['id' => $repairOrder->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" onclick="selectPaymentMethod('paypal')">Pay Through Paypal</button>
                    {{-- <span class="fas fa-arrow-right"></span> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
{{--
@endsection --}}

