@extends('userPages.master')
@section('content')
<link rel="{{asset('stylesheet" href="assets/css/home.css')}}" />
<link rel="{{asset('stylesheet" href="assets/css/style.css')}}" />


 <!-- banner sectionm -->
 <div class="container-fluid bgMainContainer p-3 p-md-5">
    <h1 class="he1 mt-5">
      When Phones Break,<span> We Make Them Wake.</span>
    </h1>
    <p class="para1d">
      Are you looking for phone or any other device repair? We carry out large
      number of mobile <br />
      repairs every month and help you fix your device as well.
    </p>
    <div class="my-5 inputGroup">
      <div class="input-group">
        <input
          type="text"
          class="form-control sInp"
          aria-label="Dollar amount (with dot and two decimal places)"
          placeholder="Search City or Zip"
        />
        <span class="input-group-text searchIcn"
          ><img
            src="./assets/images/icons/search.png"
            width="60px"
            alt="search icon"
        /></span>
        <span class="input-group-text btnFilter">
          <button
            class="btn mx-2"
            data-bs-toggle="collapse"
            data-bs-target="#collapseExample"
            aria-expanded="false"
            aria-controls="collapseExample"
          >
            <img src="./assets/images/icons/Slider.png" width="20px" alt="" />
          </button>
        </span>
      </div>

      <div class="collapse filterCollapse p-3" id="collapseExample">
        <div class="row">
          <div class="col-md-4 my-2">
            <select
              class="form-select"
              id="floatingSelect"
              aria-label="Floating label select example"
            >
              <option selected>Select Brand</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-4 my-2">
            <select
              class="form-select"
              id="floatingSelect"
              aria-label="Floating label select example"
            >
              <option selected>Select a phone</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-4 my-2">
            <select
              class="form-select"
              id="floatingSelect"
              aria-label="Floating label select example"
            >
              <option selected>Regular a Type</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <div class="row my-3">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <button class="btn btnFilter w-100">
              go for it <i class="fa fa-arrow-righ mx-2t"></i>
            </button>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner section end -->
  <!-- bann -->
  <div class="container-fluid py-2 shadowCon">
    <div class="row p-0 px-md-5 py-2">
      <div class="col-md-4 borderCol my-2">
        <div class="d-flex justify-content-between">
          <div>
            <p class="para2d">30 DAYS WARRANTY</p>
            <p class="para3">Guaranteed Service</p>
          </div>
          <div>
            <img
              src="./assets/images/icons/time.png"
              class="img-fluid"
              alt=""
              width="50px"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4 borderCol my-2">
        <div class="d-flex justify-content-between">
          <div>
            <p class="para2d">EXPERT STAFF</p>
            <p class="para3">Available Anytime</p>
          </div>
          <div>
            <img
              src="./assets/images/icons/staff.png"
              class="img-fluid"
              alt=""
              width="50px"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div class="d-flex justify-content-between">
          <div>
            <p class="para2d">WE ARE FAST</p>
            <p class="para3">Qualified Workers</p>
          </div>
          <div>
            <img
              src="./assets/images/icons/Stopwatch.png"
              class="img-fluid"
              alt=""
              width="50px"
            />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row my-5">
      <div class="col-md-6">
        <img src="./assets/images/img 3.png" class="img-fluid" alt="" />
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5 mt-3">
        <h5 class="fw-bold">Do you want to buy a mobile phone online?</h5>
        <p class="para5 text-start">
          Lorem ipsum dolor sit amet consectetur. In et senectus rhoncus in
          sed. Sit viverra malesuada suspendisse amet aenean et ac pretium.
          Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.
        </p>
        <button class="btn btnP px-4 my-2 newPhone newPhone" type="submit">
          Get a New Phone
        </button>
      </div>
    </div>
    <div class="row my-2">
      <div class="col-md-12 my-2">
        <h1 class="text-center he2 my-3">Services</h1>
        <p class="para5">
          Lorem ipsum dolor sit amet consectetur. In et senectus rhoncus in
          sed. Sit viverra malesuada suspendisse amet aenean et ac pretium.
          Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor. Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.
        </p>
      </div>
    </div>

    <div class="row my-2 my-md-5 servicesSectionRow">
      <div class="col-md-4 my-4">
        <div class="my-2 my-md-5 ps-0 ps-md-5">
          <p class="para8">Convenience and Efficiency</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
        <div class="my-2 my-md-5">
          <p class="para8">Trust and Security</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
        <div class="my-2 my-md-5 ps-0 ps-md-5">
          <p class="para8">Time and Effort Savings</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
      </div>
      <div class="col-md-4 my-4">
        <img class="img-fluid" src="./assets/images/world.png" alt="" />
      </div>
      <div class="col-md-4 my-4">
        <div class="my-2 my-md-5">
          <p class="para8">Wide Range of Repair Services</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
        <div class="my-2 my-md-5 ps-0 ps-md-5">
          <p class="para8">ompetitive Pricing</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
        <div class="my-2 my-md-5">
          <p class="para8">Quality Assurance</p>
          <p class="para7">
            Tristique donec massa ac nec et quis. Et viverra .
          </p>
        </div>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-md-6">
        <img src="./assets/images/aboutU.png" class="img-fluid" alt="" />
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5 want-text mt-3">
        <h1 class="he2">About Us</h1>
        <p class="paran5">
          Lorem ipsum dolor sit amet consectetur. In et senectus rhoncus in
          sed. Sit viverra malesuada suspendisse amet aenean et ac pretium.
          Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor. Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.
        </p>
        <button class="btn btnP px-4 my-2 newPhone" type="submit">
          Read more
        </button>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-md-6">
        <h1 class="want">We Want Your</h1>
        <span class="feedback">FEEDBACK</span>
        <p class="loremm">
          Lorem ipsum dolor sit amet consectetur. In et senectus rhoncus in
          sed. Sit viverra malesuada suspendisse amet aenean et ac pretium.
          Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit
        </p>
        <button class="btn btnP px-4 my-2 newPhone" type="submit">
          Read more
        </button>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <img class="img-fluid" src="./assets/images/feback.png" alt="" />
      </div>
    </div>
    <div class="row my-5 rowBg py-3 px-1 px-md-5">
      <h1 class="he1 text-center">How it works at MobFix Service Center?</h1>
      <p class="para1d text-center">
        Our aim is to offer outstanding services straight to your home or to
        your office to conduct repair works or troubleshoot your smartphones.
        For us, the repair work is not just about finding the fault and fixing
        it, it is about quality parts that are made to last long.
      </p>

      <div class="col-md-4 my-2">
        <div
          class="d-flex flex-column align-items-center justify-content-center"
        >
          <img class="sImg m-auto" src="./assets/images/icons/G1.png" alt="" />
          <p class="para9 text-center">Book Your Repair</p>
          <p class="para1d text-center">
            View prices upfront and book appointment online or on call.
          </p>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div
          class="d-flex flex-column align-items-center justify-content-center"
        >
          <img class="sImg m-auto" src="./assets/images/icons/G2.png" alt="" />
          <p class="para9 text-center">Visit & Repair</p>
          <p class="para1d text-center">
            Relax! Our expert will fix the device at your comfort zone.
          </p>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div
          class="d-flex flex-column align-items-center justify-content-center"
        >
          <img class="sImg m-auto" src="./assets/images/icons/G3.png" alt="" />
          <p class="para9 text-center">Receive & Pay</p>
          <p class="para1d text-center">
            Check the device & pay.Yes! You get up to 60 days to check your
            device & claim warranty*.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="containerfluid bg-privacy">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mt-5 mb-5">
          <h1 class="heading-privacy">Privacy and Policy</h1>
          <p class="para-privacy">
            Our aim is to offer outstanding services straight to your home or
            to your office to conduct repair works or troubleshoot your
            smartphones. For us, the repair work is not just about finding the
            fault and fixing it, it is about quality parts that are made to
            last long.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <h1 class="heading-privacy">FAQ</h1>
    <div class="row">
      <div class="col-md-4">
        <img
          src="./assets/images/faq imag.png"
          alt="FAQ Image"
          class="img-fluid h-100 w-100"
        />
      </div>

      <div class="col-md-4 mt-lg-5 mt-3 px-md-0">
        <h1 class="andriod-heading">
          How to Change Broken Buttons on your Andriod Mobile
        </h1>
        <p>
          Are your Android Mobile buttons not responding? Learn how to fix
          this issue with our comprehensive guide.
        </p>
        <a href="#" class="btn btnP my-2 newPhone">View The Guide</a>
      </div>
      <div class="col-md-4 mt-lg-5 mt-3 px-md-0">
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How to Change Broken Buttons on your Android Mobile
          </p></a
        >
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How to Change Broken Buttons on your Android Mobile
          </p></a
        >
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How to Change Broken Buttons on your Android Mobile
          </p>
        </a>
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How to Change Broken Buttons on your Android Mobile
          </p></a
        >
      </div>
    </div>
  </div>

  <div class="container my-5">
    <h1 class="heading-certified">CERTIFIED EXPERTS</h1>
    <div class="row">
      <div class="col-lg-6">
        <p class="para1-certified pe-md-5">
          Lorem ipsum dolor sit amet consectetur. In et senectus rhoncus in
          sed. Sit viverra malesuada suspendisse amet aenean et ac pretium.
          Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor. Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor. Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.Lorem ipsum dolor sit amet consectetur. In et senectus
          rhoncus in sed. Sit viverra malesuada suspendisse amet aenean et ac
          pretium. Tristique donec massa ac nec et quis. Et viverra arcu id
          porttitor.
        </p>
      </div>
      <div class="col-lg-6 d-flex justify-content-lg-end mt-3 mt-md-0">
        <img src="/assets/images/repair2.png" alt="" class="img-fluid h-100" />
      </div>
    </div>
  </div>
  <div class="container">
    <!-- carousel -->
    <div class="container">
      <!-- carousel -->
      <div class="row my-3">
        <h1 class="he2 my-2">Testimonials</h1>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner px-5">
            <div class="carousel-item cItem active">
                <div class="img" style="width:100%; display:flex; justify-content:center; align-item:center">
                <img src="{{asset('assets/img/avator.png')}}" alt=""  style="width:100px; margin:auto" /></div>
              <p class="para11">JOSEPH JIMENEZ</p>
              <p class="para12">OSEPH JIMENEZ@gmail.com</p>
              <div class="stars d-flex justify-content-center">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star"></i>
              </div>
              <p class="para12 p-0 p-md-4">
                But I must explain to you how all this mistakn idea of
                denouncing pleasure and praising pain was born and I will give
                you a complete of the system, and expound the actual teaings of
                the great explorer idea to be on the top of the mobile industry.
              </p>
            </div>
            <div class="carousel-item cItem">
                <div class="img" style="width:100%; display:flex; justify-content:center; align-item:center">
                    <img src="{{asset('assets/img/avator.png')}}" alt=""  style="width:100px; margin:auto" /></div>
              <p class="para11">JOSEPH JIMENEZ</p>
              <p class="para12">OSEPH JIMENEZ@gmail.com</p>
              <div class="stars d-flex justify-content-center">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star"></i>
              </div>
              <p class="para12 p-0 p-md-4">
                But I must explain to you how all this mistakn idea of
                denouncing pleasure and praising pain was born and I will give
                you a complete of the system, and expound the actual teaings of
                the great explorer idea to be on the top of the mobile industry.
              </p>
            </div>
            <div class="carousel-item cItem">
                <div class="img" style="width:100%; display:flex; justify-content:center; align-item:center">
                    <img src="{{asset('assets/img/avator.png')}}" alt=""  style="width:100px; margin:auto" /></div>
              <p class="para11">JOSEPH JIMENEZ</p>
              <p class="para12">OSEPH JIMENEZ@gmail.com</p>
              <div class="stars d-flex justify-content-center">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star"></i>
              </div>
              <p class="para12 p-0 p-md-4">
                But I must explain to you how all this mistakn idea of
                denouncing pleasure and praising pain was born and I will give
                you a complete of the system, and expound the actual teaings of
                the great explorer idea to be on the top of the mobile industry.
              </p>
            </div>
          </div>
          <button
            class="carousel-control-prev cBg px-3"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next cBg px-3"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- carousel end -->
</div>





  </div>

  @endsection
