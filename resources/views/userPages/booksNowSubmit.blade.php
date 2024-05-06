
@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/booknowsubmit.css')}}" />

<!-------------------- book now submit start-------------------->
  <div class="container">
    <div
      class="submit-p d-flex justify-content-center align-items-center mt-4"
    >
      <p>
        Please screenshot the reservation info and save it as a receipt to
        access the priority service.
      </p>
    </div>
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <div class="d-flex justify-content-center submit-img">
          <img src="{{asset('assets/img/submit.png')}}" alt="" class="w-100" />
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
            <p class="mb-md-0">Carlcare Humayra Enterprise</p>
          </div>

          <div class="col-md-4 mt-2">
            <h5 class="mb-0">Reservation Time:</h5>
          </div>
          <div class="col-md-6 mt-2">
            <p class="mb-md-0">2023-08-05 15:30-16:30</p>
          </div>

          <div class="col-md-4 mt-2">
            <h5 class="mb-0">Device Model:</h5>
          </div>
          <div class="col-md-6 mt-2">
            <p class="mb-md-0">TECNO T630</p>
          </div>

          <div class="col-md-4 mt-2">
            <h5 class="mb-0">Details:</h5>
          </div>
          <div class="col-md-6 mt-2">
            <p class="mb-md-0">glass change</p>
          </div>

          <div class="col-md-4 mt-2">
            <h5 class="mb-0">Delivery:</h5>
          </div>
          <div class="col-md-6 mt-2">
            <p class="mb-md-0">glass change</p>
          </div>

          <div class="col-md-4 mt-2">
            <h5 class="mb-0">Price</h5>
          </div>
          <div class="col-md-6 mt-2">
            <p class="mb-md-0">glass change</p>
          </div>
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
          <a href=""
            >Please back up important private data on your phone in
            advance.</a
          >
        </li>
        <li><a href=""> Disable the power-on password</a></li>
      </ol>
    </div>
  </div>
  <!---------------------book now submit end---------------------->

  @endsection
