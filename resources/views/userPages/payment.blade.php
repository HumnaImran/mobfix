

@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/payment.css')}}" />

<!-------------------- payment-form start-------------------->
 <div class="pay-form">
    <div class="container">
      <div class="row my-5">
        <div class="col-lg-6">
          <div class="pay-head">
            <h1>Let’s Make Payment</h1>
            <p class="mt-3">
              To start your subscription, input your card details to make
              payment. You will be redirected to your banks authorization page
              .
            </p>
          </div>
          <form class="mt-5 pay-label">
            <div class="my-2">
              <label for="">Cardholder’s Name</label>
              <input
                type="text"
                class="form-control mt-1"
                placeholder="PAULINA CHIMAROKE"
                aria-label="First name"
              />
            </div>
            <div class="my-3">
              <label for="">Card Number</label>
              <div class="input-group mt-1">
                <div class="input-group-text pay-group bg-transparent">
                  <img src="{{asset('./assets/img/mastercard 1.png')}}" alt="" />
                </div>
                <input
                  type="number"
                  class="form-control card-field"
                  id="card_number"
                  placeholder="9870 3456 7890 6473"
                  aria-label="First name"
                />
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-md-6 my-3">
                <label for="">Expiry</label>
                <input
                  type="text"
                  class="form-control mt-1"
                  id="expiry_date"
                  name="expiry_date"
                  placeholder="03 / 25"
                  aria-label="Expiry"
                />
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5 my-3">
                <div class="">
                  <label for="">cvv</label>
                  <input
                    type=""
                    class="form-control mt-1"
                    placeholder="654"
                    aria-label="cvv"
                  />
                </div>
              </div>
            </div>
            <button type="submit" class="btn mt-5 payform-button py-2">
              Pay
            </button>
          </form>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5 mt-lg-0 mt-5 mb-5">
          <div class="sec2-color p-3 p-md-5">
            <div class="form-para">
              <p class="p1">You’re paying,</p>
              <h1 class="mt-3 ps-5">$450.00</h1>
            </div>
            <div class="d-flex justify-content-between mt-5 para1">
              <p class="mb-0">Mobile Repair</p>
              <p class="total1">$ 40.00</p>
            </div>
            <p class="para0 pt-2">Total:01</p>
            <div class="d-flex justify-content-between para1 mt-5">
              <p>Delievery Charges</p>
              <p class="total1">$ 5.00</p>
            </div>
            <div class="d-flex justify-content-between pt-5 mt-5 para1">
              <p>Total</p>
              <p class="total1">$ 45.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!--------------- -----payment-form end----------------------->
  @endsection
