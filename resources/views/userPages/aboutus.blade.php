
@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/aboutusstyle.css')}}" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<div class="container-fluid header-aboutus">
    <h1 class="heading-1">About Us</h1>
  </div>

  <!-- Process Section starts -->

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6">
        <img
          src="{{asset('./assets/images/repair.png')}}"
          alt=""
          class="img-fluid h-100 repairim" style="border-radius:30px" data-aos="fade-right" data-aos-duration="2000"
        />
      </div>
      <div class="col-lg-6">
        <h1 class="heading-2 mt-5" data-aos="fade-left" data-aos-duration="2000">About Us</h1>
        <p class="para1-z" data-aos="fade-left" data-aos-duration="2000">
            Welcome to our multi-vendor e-commerce mobile repairing web application! We are dedicated to providing a seamless and efficient platform for users to access a wide range of mobile repair services from various vendors. Our platform is designed to cater to the diverse needs of customers while ensuring a smooth and hassle-free experience throughout the repair process.Firstly, our Vendor Management & Onboarding module prioritizes the seamless onboarding and management of vendors. This ensures a diverse pool of skilled professionals available to address every repair need. Users can easily book repair services through our intuitive booking system, providing convenience and flexibility
        </p>
      </div>
    </div>
  </div>
  <div class="container mt-5 ">
    <h1 class="mt-4 heading-2">Our Process</h1>

    <div class="row mt-4">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card card-style" data-aos="flip-left" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/about1.png')}}"
            class="card-img-top"
            alt="Image 1"
          />
          <div class="card-body d-flex gap-1 align-items-baseline">
            <span class="span-card">1:</span>

            <div>
              <h3 class="card-title heading-3">Customer Books Service</h3>
              <p class="card-text para2">
                The customer initiates the process by booking a mobile repair service through the platform.
They provide necessary details such as their location, contact information, and description of the issue.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card card-style" data-aos="flip-left" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/about2.png')}}"
            class="card-img-top"
            alt="Image 1"
          />
          <div class="card-body d-flex gap-1 align-items-baseline">
            <span class="span-card">2:</span>
            <div>
              <h3 class="card-title heading-3">System Arranges Pickup</h3>
              <p class="card-text para2-z">
                Upon receiving the booking request, the platform integrates with the EasyPost API to arrange a pickup of the mobile device from the customer's location.
                EasyPost coordinates with shipping carriers to schedule a pickup based on the provided details.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card card-style" data-aos="flip-left" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/about3.png')}}"
            class="card-img-top"
            alt="Image 1"
          />
          <div class="card-body d-flex gap-1 align-items-baseline">
            <span class="span-card">3:</span>
            <div>
              <h3 class="card-title heading-3">Vendor Performs Repair</h3>
              <p class="card-text para2-z">
                Once the mobile device is delivered to the vendor's location, they proceed with diagnosing and repairing the issue. The vendor updates the repair status on the platform, keeping the customer informed about the progress.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card card-style" data-aos="flip-left" data-aos-duration="1500">
          <img
            src="{{asset('./assets/images/about4.png')}}"
            class="card-img-top"
            alt="Image 1"
          />
          <div class="card-body d-flex gap-1 align-items-baseline">
            <span class="span-card">4:</span>
            <div>
              <h3 class="card-title heading-3">
                System Returns Mobile to Customer
              </h3>
              <p class="card-text para2-z">
                After the repair is completed, the platform again utilizes the EasyPost API to arrange for the return shipment of the repaired mobile device to the customer's location.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Process Section ends -->

  <div class="container mt-5 mb-5">
    <h1 class="heading-2 mt-5" data-aos="fade-right" data-aos-duration="2000">CERTIFIED EXPERTS</h1>
    <div class="row">
      <div class="col-lg-6">
        <p class="para1-z" data-aos="fade-right" data-aos-duration="2000">

The vendors featured on our website are certified experts in their respective fields, ensuring that customers receive top-quality service and assistance for their mobile repair needs. Each vendor undergoes a rigorous certification process to validate their expertise and proficiency in mobile device repairs. This certification ensures that they possess the necessary skills, knowledge, and experience to effectively diagnose and resolve a wide range of mobile device issues. By choosing vendors from our platform, customers can rest assured that their devices are in the hands of trusted professionals who are committed to delivering exceptional service and ensuring complete customer satisfaction.Our platform takes great pride in curating a network of certified experts, ensuring that customers receive unparalleled service and support for their mobile repair requirements. These vendors have demonstrated their proficiency through comprehensive training programs and hands-on experience, guaranteeing precision and reliability in every repair task they undertake. With a commitment to excellence and a dedication to staying abreast of the latest advancements in mobile technology, our certified vendors stand as pillars of reliability and trustworthiness in the realm of mobile repair services
        </p>
      </div>
      <div class="col-lg-6 d-flex justify-content-lg-end mt-2 mt-md-0">
        <img
          src="{{asset('./assets/images/repair2.png')}}"
          alt=""
          class="img-fluid h-100 repairim" style="border-radius:30px"
        />
      </div>
    </div>
  </div>



<!-- for active and not active  -->
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
