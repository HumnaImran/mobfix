
@extends('userPages.master')
@section('content')


<link rel="stylesheet" href="{{asset('./assets/css/service.css')}}" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- background -->
 <div class="container-fluid services d-flex justify-content-center">
    <!-- heading -->
    <h1 class="services-heading">Services</h1>
  </div>
  <!-- paragraph -->
  <div class="container-fluid mt-5 text-center mb-md-5" >
    <p class="services-para px-md-4 text-start text-sm-center">
        Welcome to our comprehensive mobile repair and services center, where convenience, quality, and affordability converge to offer you an unparalleled experience. Our commitment to excellence shines through in every aspect of our operations, from our wide range of repair services to our competitive pricing and stringent quality assurance measures.
    </p>
  </div>
  <!-- cards -->
  <div class="container pb-5">
    <div class="row justify-content-center">
      <!-- card1 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4" >
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img src="{{asset('./assets/images/348s 1.png')}}" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title py-2">Wide Range of Repair Services</h5>
            <p class="card-text">
                Discover a comprehensive range of mobile repair services tailored to meet your needs. From screen replacements to battery diagnostics, our expert technicians are equipped to handle a wide array of issues with precision and efficiency.
            </p>
          </div>
        </div>
      </div>
      <!-- card2 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/Ellipse 7.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">Competitive Pricing</h5>
            <p class="card-text">
                Experience the perfect blend of quality service and affordability with our competitive pricing. We understand the importance of value for money, which is why we offer transparent and competitive rates for all our services
            </p>
          </div>
        </div>
      </div>
      <!-- card3 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/quality-check-432786740-760 1.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">Quality Assurance</h5>
            <p class="card-text">
                At our service center, quality assurance isn't just a promise – it's our commitment to you. With rigorous quality control measures in place, we ensure that every repair and service meets the highest standards of excellence.
            </p>
          </div>
        </div>
      </div>
      <!-- card4 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card " data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/close-up-modern-man-using-mobile-app-phone 1.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">Convenience and Efficiency</h5>
            <p class="card-text">
                Embrace convenience and efficiency with our streamlined repair services. We prioritize your time and comfort by offering hassle-free solutions that fit seamlessly into your busy schedule. With swift turnaround times and flexible appointment options, getting your device repaired has never been easier.
            </p>
          </div>
        </div>
      </div>
      <!-- card5-->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/standard-quality-control-collage 1.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">Trust and Security</h5>
            <p class="card-text">
                At the core of our service is a commitment to trust and security. We understand the importance of safeguarding your personal data and ensuring the confidentiality of your devices. That's why we prioritize stringent security measures and employ trusted professionals who handle your devices with the utmost care and respect.
            </p>
          </div>
        </div>
      </div>
      <!-- card6 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/front-view-businessman-with-coins-hourglass 1.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">Time and Effort Savings</h5>
            <p class="card-text">
                Say goodbye to lengthy wait times and tedious repair procedures – with us, you can enjoy the convenience of a quick turnaround while saving valuable time and effort. Let us handle the complexities while you focus on what truly matters
            </p>
          </div>
        </div>
      </div>
      <!-- card7 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
        <div class="card services-card" data-aos="flip-right" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/electronic-devices-balancing-concept 1.png')}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title py-2">New Phones</h5>
            <p class="card-text">
                Explore our collection of cutting-edge new phones, where innovation meets functionality. From the latest flagship models to sleek budget-friendly options, we offer a diverse range of smartphones to suit every preference and budget.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


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
    AOS.init();
  </script>
  @endsection
