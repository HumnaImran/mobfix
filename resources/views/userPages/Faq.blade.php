
@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/faq.css')}}" />

<div class="container mt-4">
    <div class="row">
      <div class="col-md-2">
        <img src="{{asset('./assets/images/mobile.png')}}" class="img-fluid" />
      </div>
      <div class="col-md-10 mobile">
        <h3>How to Change Broken Buttons on your Andriod Mobile</h3>

        <div class="d-flex move-colum">
          <div class="d-flex markhor-icon">
            <img
              src="{{asset('./assets/images/Group 21.png')}}"
              class="img-fluid"
              alt=""
            />
            <div class="shop-text ms-3">
              <h3 class=""><u>Shop Name</u></h3>
              <p>Last updated on April 20, 2023</p>
            </div>
          </div>

          <div class="d-flex justify-content-end viewIcons">
            <div class="d-flex views-icons">
              <img src="{{asset('./assets/images/Vector.png')}}" class="img-fluid me-2" />
              <p>3.8k</p>
            </div>

            <div class="d-flex views-icons">
              <img
                src="{{asset('./assets/images/Vector (1).png')}}"
                class="img-fluid ms-2 me-2"
              />
              <p>1</p>
            </div>

            <div class="d-flex views-icons">
              <img
                src="{{asset('./assets/images/Vector (2).png')}}"
                class="img-fluid ms-2 me-2"
              />
              <p>8</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Introduction -->

  <div class="text-center mt-5">
    <h1>Introduction</h1>
    <p class="offset-md-3 col-md-6 ps-2 pe-2 offset-md-3">
      But I must explain to you how all this mistakn idea of denouncing
      pleasure and praising pain was born and I will give you a complete of
      the system, and expound the actual teaings of the great explorer idea to
      be on the top of the mobile industry.
    </p>
  </div>

  <!-- step 1 -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card">
          <h4 class="text-center fw-bold mt-3 mb-3">Step 1</h4>
          <img src="{{asset('./assets/images/smartphon.png')}}" class="img-fluid" />
          <p class="m-4 fw-medium  textDec ">
            <sup class="dot">.</sup> Make sure your phone battery has enough
            charge for the phone to actually run.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card">
          <h4 class="text-center fw-bold mt-3 mb-3">Step 2</h4>
          <img
            src="{{asset('./assets/images/powerbutton (1) 1.png')}}"
            class="img-fluid"
          />
          <p class="m-4 fw-medium  textDec ">
            <sup class="dot">.</sup> Hold down the volume down key and connect
            your phone via USB cable to your PC.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card">
          <h4 class="text-center fw-bold mt-3 mb-3">Step 3</h4>
          <img
            src="{{asset('./assets/images/powerbutton (1) 1 (1).png')}}"
            class="img-fluid"
          />
          <p class="m-4 fw-medium  textDec ">
            <sup class="dot">.</sup> Select the 'Start' option using your
            volume keys, and your phone will power on.
          </p>
        </div>
      </div>
      <hr class="hr-width ms-3 mt-5" />
    </div>
  </div>

  <!-- quill editor -->


  <div class="container">
    <div class="d-flex flex-column flex-sm-row justify-content-between mb-5">
      <h5>ONE COMMENT</h5>
      <button type="button" class="btn comBtn mt-2 mt-sm-0">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
          <path d="M9.5 18C11.1811 18 12.8245 17.5015 14.2223 16.5675C15.6202 15.6335 16.7096 14.306 17.353 12.7528C17.9963 11.1996 18.1646 9.49057 17.8367 7.84173C17.5087 6.1929 16.6991 4.67834 15.5104 3.4896C14.3217 2.30085 12.8071 1.4913 11.1583 1.16333C9.50943 0.835355 7.80036 1.00368 6.24719 1.64703C4.69402 2.29037 3.3665 3.37984 2.43251 4.77766C1.49852 6.17547 1 7.81886 1 9.5C1 10.9053 1.34 12.2294 1.94444 13.3977L1 18L5.60228 17.0556C6.76961 17.6591 8.09561 18 9.5 18Z" stroke="black" stroke-opacity="0.4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></span>
        Add a comment
      </button>
    </div>

    <button type="button" class="btn uselessBtn  ">
      <span><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
        <path d="M17.5875 16.2754C18.4926 16.2754 19.3605 15.9159 20.0005 15.2759C20.6405 14.6359 21 13.7679 21 12.8629V3.93789C21 3.03284 20.6405 2.16486 20.0005 1.52489C19.3605 0.884921 18.4926 0.525391 17.5875 0.525391H3.4125C2.96437 0.525391 2.52062 0.613657 2.10659 0.785152C1.69257 0.956646 1.31638 1.20801 0.999498 1.52489C0.682619 1.84177 0.431255 2.21796 0.259762 2.63198C0.0882664 3.04601 0 3.48975 0 3.93789V12.8629C0 13.311 0.0882664 13.7548 0.259762 14.1688C0.431255 14.5828 0.682619 14.959 0.999498 15.2759C1.31638 15.5928 1.69257 15.8441 2.10659 16.0156C2.52062 16.1871 2.96437 16.2754 3.4125 16.2754H9.4374L14.7 20.2129C14.895 20.3588 15.1268 20.4476 15.3694 20.4694C15.612 20.4911 15.8558 20.4449 16.0737 20.3359C16.2915 20.2269 16.4747 20.0595 16.6028 19.8523C16.7309 19.6452 16.7988 19.4065 16.799 19.1629V16.2754H17.5875ZM9.9603 14.7004H3.4125C2.92517 14.7004 2.45779 14.5068 2.11319 14.1622C1.76859 13.8176 1.575 13.3502 1.575 12.8629V3.93789C1.575 3.45056 1.76859 2.98318 2.11319 2.63858C2.45779 2.29398 2.92517 2.10039 3.4125 2.10039H17.5875C18.0748 2.10039 18.5422 2.29398 18.8868 2.63858C19.2314 2.98318 19.425 3.45056 19.425 3.93789V12.8629C19.425 13.8772 18.6018 14.7004 17.5875 14.7004H15.2261V18.6379L9.9603 14.7004Z" fill="black" fill-opacity="0.58"/>
        </svg></span>
      useless guide</button>
  </div>

  <div class="container my-5 heigtCont">

    <div id="editor" class="heigtCont">
    </div>
<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Create the editor container -->

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>

  </div>
  <div class="container my-4 pt-5 d-flex justify-content-end">
    <button type="button" class="btn text-white btn-primary postBtn">Post Comment</button>
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

  @endsection
