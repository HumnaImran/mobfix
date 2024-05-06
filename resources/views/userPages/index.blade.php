@extends('userPages.master')
@section('content')
<link rel="{{asset('stylesheet" href="assets/css/home.css')}}" />
<link rel="{{asset('stylesheet" href="assets/css/style.css')}}" />

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 <!-- banner sectionm -->
 <div class="container-fluid bgMainContainer p-3 p-md-5" style="display: flex; flex-direction:column; justify-content:center; align-items:center">
    <h1 class="he1 mt-5">
      When Phones Break,<span> We Make Them Wake.</span>
    </h1>
    <p class="para1d">
      Are you looking for phone or any other device repair? We carry out large
      number of mobile <br />
      repairs every month and help you fix your device as well.
    </p>
    {{-- <div class="my-5 inputGroup">
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
    </div> --}}
    <br>
    <a href="{{route('FixYourStuff')}}">
    <button class="btn" style="background-color: #f86f03">Get started <i class="fa-solid fa-arrow-right"></i></i></button></a>
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
              src="{{asset('./assets/images/icons/time.png')}}"
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
              src="{{asset('./assets/images/icons/staff.png')}}"
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
              src="{{asset('./assets/images/icons/Stopwatch.png')}}"
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
      <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{asset('./assets/images/img 3.png')}}" class="img-fluid" alt="" />
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5 mt-3" data-aos="fade-left" data-aos-duration="2000">
        <h5 class="fw-bold">Do you want to buy a mobile phone online?</h5>
        <p class="para5 text-start" >
            Embark on a journey of technological marvel with MobFix, your trusted companion in the realm of mobile innovation. Discover the latest addition to our lineup. Engineered to redefine your mobile experience, the MobFix X3 boasts cutting-edge features and unparalleled performance.  Stay powered throughout the day with its robust 4500mAh battery and embrace the future with Android 12.
        </p>
       <a href="{{route('getAPhone')}}"> <button class="btn btnP px-4 my-2 newPhone newPhone" type="submit">
          Get a New Phone
        </button></a>
      </div>
    </div>
    <div class="row my-2">
      <div class="col-md-12 my-2">
        <h1 class="text-center he2 my-3">Services</h1>
        <p class="para5">
            At MobFix, we believe in empowering vendors to showcase their expertise and offer repair services directly to our valued customers. With our platform, vendors can create personalized profiles and highlight their skills in mobile device repair. Whether you're a seasoned technician or an emerging repair specialist, MobFix provides the perfect opportunity to connect with customers seeking professional repair services. Customers can browse through vendor profiles, read reviews, and choose the service provider that best fits their needs. From screen replacements to software troubleshooting, our vendors offer a wide range of repair solutions to ensure your device is in top condition. Join the MobFix community today and discover a world of possibilities for your mobile repair business
        </p>
      </div>
    </div>

    <div class="row my-2 my-md-5 servicesSectionRow">
      <div class="col-md-4 my-4">
        <div class="my-2 my-md-5 ps-0 ps-md-5" data-aos="fade-right" data-aos-duration="1000">
          <p class="para8">Convenience and Efficiency</p>
          <p class="para7">
            Your ultimate destination for all your mobile needs.
          </p>
        </div>
        <div class="my-2 my-md-5" data-aos="fade-right" data-aos-duration="1500">
          <p class="para8">Trust and Security</p>
          <p class="para7">
            Ensuring peace of mind every step of the way.
          </p>
        </div>
        <div class="my-2 my-md-5 ps-0 ps-md-5" data-aos="fade-right" data-aos-duration="2000">
          <p class="para8">Time and Effort Savings</p>
          <p class="para7">
            streamlining your mobile solutions
          </p>
        </div>
      </div>
      <div class="col-md-4 my-4">
        <img class="img-fluid"  data-aos="flip-left" data-aos-duration="1500" src="./assets/images/world.png" alt="" />
      </div>
      <div class="col-md-4 my-4">
        <div class="my-2 my-md-5" data-aos="fade-left" data-aos-duration="1000">
          <p class="para8">Wide Range of Repair Services</p>
          <p class="para7">
            Explore a diverse array of repair services catered to your needs
          </p>
        </div>
        <div class="my-2 my-md-5 ps-0 ps-md-5" data-aos="fade-left" data-aos-duration="1500">
          <p class="para8">Competitive Pricing</p>
          <p class="para7">
            Ensuring affordability without compromise.
          </p>
        </div>
        <div class="my-2 my-md-5" data-aos="fade-left" data-aos-duration="2000">
          <p class="para8">Quality Assurance</p>
          <p class="para7">
            guaranteeing excellence in every service
          </p>
        </div>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{asset('./assets/images/aboutU.png')}}" class="img-fluid" alt="" style="border-radius:30px;"/>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5 want-text mt-3" data-aos="fade-left" data-aos-duration="2000">
        <h1 class="he2">About Us</h1>
        <p class="paran5">
            At MobFix, we're dedicated to revolutionizing the mobile industry by providing a seamless platform connecting customers with trusted vendors offering top-notch repair services. With a passion for innovation and a commitment to customer satisfaction, we strive to create an ecosystem where convenience, quality, and affordability converge. Our mission is simple: to empower both vendors and customers alike, fostering a community built on trust, reliability, and technological advancement. From sourcing the latest smartphones to facilitating expert repairs, MobFix is your go-to destination for all your mobile needs. Join us in shaping the future of mobile solutions today.
        </p>
       <a href="{{route('AboutUs')}}"> <button class="btn btnP px-4 my-2 newPhone" type="submit">
          Read more
        </button></a>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
        <h1 class="want">We Want Your</h1>
        <span class="feedback">FEEDBACK</span>
        <p class="loremm">
            Your input matters to us! We strive to provide the best experience possible, and your feedback helps us achieve that goal. Take a moment to let us know how we're doing.We value your opinion! Your feedback helps us improve our services. Share your thoughts with us today.
        </p>
        <a href="{{route('feedback')}}"><button class="btn btnP px-4 my-2 newPhone" type="submit">
          Read more
        </button></a>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5" data-aos="fade-left" data-aos-duration="2000">
        <img class="img-fluid" src="{{asset('./assets/images/feback.png')}}" alt="" style="border-radius:30px"/>
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
          <img class="sImg m-auto" src="{{asset('./assets/images/icons/G1.png')}}" alt="" data-aos="flip-left" data-aos-duration="1500" />
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
          <img class="sImg m-auto" src="{{asset('./assets/images/icons/G2.png')}}" alt="" data-aos="flip-left" data-aos-duration="1500" />
          <p class="para9 text-center">System Arranges Pickup</p>
          <p class="para1d text-center">
            Relax! Our expert will fix the device at your comfort zone.
          </p>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div
          class="d-flex flex-column align-items-center justify-content-center"
        >
          <img class="sImg m-auto" src="{{asset('./assets/images/icons/G3.png')}}" alt="" data-aos="flip-left" data-aos-duration="1500"s />
          <p class="para9 text-center">Vendor Performs Repair</p>
          <p class="para1d text-center">
            Check the device & pay.Yes! You get up to 30 days to check your
            device & claim warranty*.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="containerfluid bg-privacy" data-aos="flip-down" data-aos-duration="1500">
    <div class="container-fluid">
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
      <div class="col-md-4" data-aos="zoom-left" data-aos-duration="2000">
        <img
          src="{{asset('./assets/images/faq imag.png')}}"
          alt="FAQ Image"
          class="img-fluid h-100 w-100" style="border-radius:30px"
        />
      </div>

      <div class="col-md-4 mt-lg-5 mt-3 px-md-0" >
        <h1 class="andriod-heading">
          How to Change Broken Buttons on your Andriod Mobile
        </h1>
        <p>
          Are your Android Mobile buttons not responding? Learn how to fix
          this issue with our comprehensive guide.
        </p>
        <a href="{{route('faqs')}}" class="btn btnP my-2 newPhone">Read More</a>
      </div>
      <div class="col-md-4 mt-lg-5 mt-3 px-md-0" >
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How can customers book a repair service?
          </p></a
        >
        <a href="#" class="faqLink">
          <p class="para-mobile">
            Can customers track the status of their repair orders?
          </p></a
        >
        <a href="#" class="faqLink">
          <p class="para-mobile">
            Are there reporting features to track sales, revenue, and customer feedback?
          </p>
        </a>
        <a href="#" class="faqLink">
          <p class="para-mobile">
            How are reviews and ratings used to maintain service quality?
          </p></a
        >
      </div>
    </div>
  </div>

  <div class="container my-5">

    <h1 class="heading-certified" data-aos="fade-right" data-aos-duration="2000">CERTIFIED EXPERTS</h1>
    <div class="row">
      <div class="col-lg-6" data-aos="fade-right" data-aos-duration="2000">
        <p class="para1-certified pe-md-5">
            At MobFix, we understand the importance of entrusting your device to qualified professionals, which is why we've curated a network of certified experts in mobile device repair. Our stringent vetting process ensures that each technician possesses the necessary skills and expertise to handle a wide range of repair tasks. From screen replacements to software diagnostics, our certified experts are equipped to tackle any issue with precision and efficiency.With MobFix, you can have peace of mind knowing that your device is in capable hands. Our certified technicians adhere to industry best practices and utilize the latest tools and techniques to deliver exceptional results. Whether you're dealing with a cracked screen, battery issue, or software glitch, our experts are here to provide prompt and reliable solutions.We take great pride in our team of certified professionals who are dedicated to exceeding your expectations.


        </p>
      </div>
      <div class="col-lg-6 d-flex justify-content-lg-end mt-3 mt-md-0" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{asset('./assets/images/repair2.png')}}" alt="" class="img-fluid h-100"  style="border-radius:30px"/>
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
            @foreach ($testimonials as $key => $testimonial)
                <div class="carousel-item cItem {{ $key == 0 ? 'active' : '' }}">
                    <div class="img" style="width:100%; display:flex; justify-content:center; align-items:center">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="" data-aos="flip-right" data-aos-duration="1000" style="height:120px; border-radius:100%; width:130px; margin:auto" />
                    </div>
                    <p class="para11">{{ $testimonial->name }}</p>
                    <p class="para12">{{ $testimonial->email }}</p>
                    <div class="stars d-flex justify-content-center">
                        @for ($i = 0; $i < $testimonial->rating; $i++)
                            <i class="fa fa-star text-warning"></i>
                        @endfor
                    </div>
                    <p class="para12 p-0 p-md-4">{{ $testimonial->message }}</p>
                </div>
            @endforeach
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

  <script>
    AOS.init();
  </script>
  @endsection
