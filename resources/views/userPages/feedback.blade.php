@extends('userPages.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('./assets/css/feed.css') }}" />
    <style>
        .star.active {
    color: yellow;
}

        .contactclass h3 {
            margin-top: 10rem;
            font-size: 3rem;
            text-align: center;
            color: #f86f03;
            text-shadow: 2px 1px black;
            position: relative;
        }

        .contactclass h2:after {

            content: "";
            position: absolute;
            background-color: #f86f03;
            height: 3px;
            width: 10%;

            left: 45%;
            bottom: -5px;


        }


        .contactclass p {
            text-align: center;
            margin-top: auto;


        }

        .box1 {
            margin: auto;
            position: relative;
            width: 500px;
            height: 500px;
            background: black;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 5rem;

        }

        .box1::before {

            content: '';
            position: absolute;
            width: 500px;
            top: -50%;
            left: -50%;
            height: 500px;
            background: linear-gradient(0deg, transparent, #f86f03, #f86f03);
            animation: animate 6s linear infinite;
            transform-origin: bottom right;
        }


        .box1::after {
            z-index: -2;
            content: '';
            position: absolute;
            width: 500px;
            top: -50%;
            left: -50%;
            height: 500px;
            background: linear-gradient(0deg, transparent, #f86f03, #f86f03);
            animation: animate 6s linear infinite;
            transform-origin: bottom right;
            animation-delay: -3s;
        }

        .form {
            position: absolute;
            inset: 10px;
            z-index: 10;
            background: rgb(94, 80, 80);
            border-radius: 8px;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form h1 {
            color: #f86f03;
            font-weight: 500;
            font-size: 2rem;
            text-align: center;
            letter-spacing: 0.1rem;
            text-shadow: 2px 1px black;

        }

        .inputbox {
            position: relative;
            width: 300px;
            margin-top: 35px;

        }

        .inputbox input {
            width: 100%;
            padding: 20px 10px 10px;
            background: transparent;
            border: none;
            position: relative;
            outline: none;
            color: rgba(248, 246, 246, 0.83);
            font-size: 1rem;
            letter-spacing: 0.05rem;
            z-index: 10;


        }

        .inputbox span {
            position: absolute;
            left: 0;
            padding: 20px 10px 10px;
            font-size: 1rem;
            color: white;
            pointer-events: none;
            letter-spacing: 0.05rem;
            transition: 0.5s;

        }

        .inputbox input:valid~span,
        .inputbox input:focus~span {
            color: black;
            transform: translateX(0px) translateY(-34px);
            font-size: 0.75em;
        }

        .inputbox i {
            position: absolute;

            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #f86f03;
            border-radius: 4px;
            transition: 0.5s;
            pointer-events: none;

        }

        .inputbox input:valid~i,
        .inputbox input:focus~i {
            height: 44px;

        }

        input[type="submit"] {
            border: none;
            outline: none;
            background: #f86f03;
            padding: 11px 25px;
            width: 100px;
            margin-top: 10px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            color: white;

        }


        input[type="submit"]:active {
            opacity: 0.8;

        }



        input[type="submit"]:hover {
            background-color: white;
            color: #f86f03;
        }

        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="container-fluid header-feedus">
        <h1 class="heading-feed-1">Give Us Your Feedback</h1>
    </div>
    <div class="container my-5">
        <h1 class="feedback-head">COMPLETE FEEDBACK FORM</h1>

        {{-- <section class="contactclass" id="contact-id">
            <h3 data-aos="fade-right">COMPLETE FEEDBACK FORM</h3>
            <p data-aos="flip-right" data-aos-duration="2000">Do you have a question or are you interested in working with
                us? Just fill out the form fields below..</p>

            <div class="box1">
                <div class="form">
                    <h1>Get In Touch</h1>
                    <div class="inputbox">
                        <input type="text" required="required">
                        <span>Your Name</span>
                        <i></i>
                    </div>

                    <div class="inputbox">
                        <input type="text" required="required">
                        <span>Your Email</span>
                        <i></i>
                    </div>

                    <div class="inputbox">
                        <input type="text" required="required">
                        <span>Subject</span>
                        <i></i>
                    </div>


                    <div class="row mt-4 gap-lg-5 gap-md-5 feed-for1">
                        <div class="col mb-4 h-100">
                            <p class="feed-para2">
                                How would you rate your experience at MobFix?
                            </p>
                            <div class="d-flex align-items-center">
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="feed-para2 mt-3">
                                The store staff was courteous and helpful throughout my repair
                                process
                            </p>
                            <div class="d-flex align-items-center">
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                        <div class="col mb-4 h-100">
                            <p class="feed-para2">
                                How would you rate your experience at MobFix?
                            </p>
                            <div class="d-flex align-items-center">
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                            </div>
                            <p class="feed-para2 mt-3">
                                My device functions and feels as good or better than expected
                                after my repair
                            </p>
                            <div class="d-flex align-items-center">
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                                <span class="mr-2"><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputbox">
                        <input type="submit" value="submit">
                    </div>






                </div>
            </div>

        </section> --}}
        @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('submit-feedback') }}" method="POST">
            @csrf
            <div class="row mt-5 gap-lg-5">
                <div class="col-lg col-md col-12 mb-5">
                    <input type="text" class="form-feed w-100" name="full_name" placeholder="Full Name" />
                </div>
                <div class="col-lg col-md col-12 mb-5">
                    <input type="number"  name="phone_number" class="form-feed w-100" placeholder="Phone Num" />
                </div>
            </div>
            <div class="row gap-lg-5">
                <div class="col-lg col-md col-12 mb-5">
                    <input type="email" name="email" class="form-feed w-100" placeholder="Email Address" />
                </div>
                <div class="col-lg col-md col-12 mb-5">
                    <select name="store_id" id="store_name" class="form-feed w-100" class="form-control">
                        <option value="">Select Store</option>
                        @foreach($storeNames as $storeName)
                            <option value="{{ $storeName->id }}">{{ $storeName->name }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-feed w-100" placeholder="Enter Shop Name" /> --}}
                </div>


            </div>
            <div class="row">
                <div class="col-12">
                    <textarea class="form-feed w-100" name="comment" placeholder="Comment"></textarea>
                </div>
            </div>
            <div class="row mt-4 gap-lg-5 gap-md-5 feed-for1">
                <div class="col mb-4 h-100">
                    <p class="feed-para2">
                        How would you rate your experience at MobFix?
                    </p>
                    <div class="d-flex align-items-center" id="experience1">

                        <input type="hidden" name="experience[1][question]" value="How would you rate your experience at MobFix?" />
                        <input type="hidden" name="experience[1][rating]" id="experience1_rating" />
                        <span class="mr-2 star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                    <p class="feed-para2 mt-3">
                        The store staff was courteous and helpful throughout my repair
                        process
                    </p>
                    <div class="d-flex align-items-center" id="experience2">

                        <input type="hidden" name="experience[2][question]" value="How would you rate your experience at MobFix?" />
                        <input type="hidden" name="experience[2][rating]" id="experience2_rating" />
                        <span class="mr-2 star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="col mb-4 h-100">
                    <p class="feed-para2">
                        How would you rate your experience at MobFix?
                    </p>
                    <div class="d-flex align-items-center" id="experience3">

                        <input type="hidden" name="experience[3][question]" value="How would you rate your experience at MobFix?" />
                        <input type="hidden" name="experience[3][rating]" id="experience3_rating" />
                        <span class="mr-2 star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                    <p class="feed-para2 mt-3">
                        My device functions and feels as good or better than expected
                        after my repair
                    </p>
                    <div class="d-flex align-items-center" id="experience4">

                        <input type="hidden" name="experience[4][question]" value="How would you rate your experience at MobFix?" />
                        <input type="hidden" name="experience[4][rating]" id="experience4_rating" />
                        <span class="mr-2 star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="mr-2 star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="custom-send">Send Your Message</button>
            </div>
        </form>
    </div>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll('.star');

            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const rating = this.dataset.value;


                    const containerId = this.parentNode.id;
                    console.log(containerId);

                    const hiddenInput = document.querySelector(`#${containerId}_rating`);
                    hiddenInput.value = rating;

                    // Remove active class from all stars in the same container
                    const starsInContainer = document.querySelectorAll(`#${containerId} .star`);
                    starsInContainer.forEach(star => star.classList.remove('active'));

                    // Add active class to clicked star and all previous stars
                    for (let i = 0; i < rating; i++) {
                        starsInContainer[i].classList.add('active');
                    }
                });
            });
        });
    </script> --}}


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.dataset.value;
                const containerId = this.parentNode.id;
                // console.log(containerId);
                // console.log(rating);

                const hiddenInput = document.querySelector(`#${containerId}_rating`);
                if(hiddenInput) {
                    hiddenInput.value = rating;
                }
                console.log(hiddenInput.value);

                // Remove active class from all stars in the same container
                const starsInContainer = document.querySelectorAll(`#${containerId} .star`);
                starsInContainer.forEach(star => star.classList.remove('active'));

                // Add active class to clicked star and all previous stars
                for (let i = 0; i < rating; i++) {
                    starsInContainer[i].classList.add('active');
                }
            });
        });
    });
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.dataset.value;
                const containerId = this.parentNode.id;
                const hiddenInput = document.querySelector(`#${containerId}_rating`);
                hiddenInput.value = rating;

                // Remove active class from all stars in the same container
                const starsInContainer = document.querySelectorAll(`#${containerId} .star`);
                starsInContainer.forEach(star => star.classList.remove('active'));

                // Add active class to clicked star and all previous stars
                for (let i = 0; i < rating; i++) {
                    starsInContainer[i].classList.add('active');
                }
            });
        });
    });
</script> --}}


@endsection
