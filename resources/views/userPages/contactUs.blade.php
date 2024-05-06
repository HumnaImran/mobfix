
@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/contactstyle.css')}}" />
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    {{session()->get('message')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container-fluid header-contactus">




    <h1 class="heading-1">Contact Us</h1>
  </div>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-6">
        <h1 class="heading-2">Our Address</h1>
        <ul class="list-unstyled media-icon mt-4">
          <li class="d-flex gap-3 align-items-baseline">
            <a href=""><i class="fas fa-phone social-icon"></i></a>
            1-888-777-55555
          </li>
          <li class="d-flex gap-3 align-items-baseline">
            <a href=""><i class="fas fa-envelope social-icon"></i></a>
            phone-repair@example.com
          </li>
          <li class="d-flex gap-3 align-items-baseline">
            <a href=""><i class="fas fa-map-marker-alt social-icon"></i></a>
            131 Lonsdale St, Melbourne VIC 3000, Australia
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <h1 class="heading-2">Contact Us</h1>
        <form action="{{ route('Contactstore') }}" Method="post">
            @csrf
          <div class="mb-3">
            <input
              type="text"
              class="input-form p-3 w-100 p-3"
              placeholder=" Your Name (required)" name="name"
            />
          </div>
          <div class="mb-3">
            <input
              type="email"
              class="input-form p-3 w-100"
              placeholder="Your Email (required)"
              name="email"
            />
          </div>
          <div class="mb-3">
            <input
              type="text"
              class="input-form p-3 w-100"
              placeholder="Subject" name="subject"
            />
          </div>
          <div class="mb-3">
            <textarea
              class="input-form p-3 w-100"
              rows="5"
              name="message"
              placeholder="Your Messages"
            ></textarea>
          </div>
          <button type="submit" class="form-button mx-3">Send</button>
        </form>
      </div>
    </div>
  </div>



  {{-- <script>
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
  </script> --}}

  @endsection
