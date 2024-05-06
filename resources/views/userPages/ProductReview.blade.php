@extends('userPages.master')
@section('content')
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #heartIcon {
    color: black; /* Default color */
}

#heartIcon.red {
    color: red; /* Red color */
}
        .star-rating {
            display: inline-block;
        }

        .star-rating .star {
            font-size: 2.5em;
            /* Adjust the font size as needed */
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating .star:hover,
        .star-rating .star.active {
            color: #ffc107;
        }

        .Privacytext {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 600;
            line-height: 53px;
            text-align: left;
            color: black;
        }

        .ParagraphText {
            background-color: #f3f1f1;
        }

        .Text-privacy {
            color: black;
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;

        }

        .WalleT {
            font-family: Segoe UI;
            font-size: 30px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0px;
            text-align: left;

        }

        .Walletbalance {
            font-family: Segoe UI;
            font-size: 16px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
        }

        .Balanced {
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;
            line-height: 32px;
            letter-spacing: 0px;
            text-align: left;

        }

        .TableBody {
            background-color: #f3f1f1;
        }

        .Tableborder {
            border: 2px solid white !important;
        }

        .tABBLEHEADER {
            border: 1px solid #f3f1f1 !important;
            border-top: 10px;
        }

        .BTN {
            background-color: #F6A92C !important;
            color: white !important;
            border-radius: 10px;
        }

        /* faqs css*/
        .FAQSsection2 {
            background-color: #f3f1f1;
            border-radius: 12px;

        }

        .BAKSections {
            position: absolute;
            top: 80%;
            left: 15%;
            width: 70%;
        }

        @media(max-width:520px) {
            .BAKSections {
                top: 60%;
                width: 80%;
                left: 10%;
            }
        }

        @media(max-width:397px) {
            .BAKSections {
                top: 40%;
                width: 90%;
                left: 5%;
            }
        }

        @media(max-width:992px) {
            .SecTions4 {
                margin-top: 40% !important;
            }
        }

        @media(max-width:857px) {
            .SecTions4 {
                margin-top: 50% !important;
            }
        }

        @media(max-width:767px) {
            .SecTions4 {
                margin-top: 60% !important;
            }

            .PrivacyTEXT {
                font-size: 25px;
            }
        }

        @media(max-width:660px) {
            .SecTions4 {
                margin-top: 80% !important;
            }
        }

        @media(max-width:600px) {
            .SecTions4 {
                margin-top: 90% !important;
            }
        }

        @media(max-width:550px) {
            .SecTions4 {
                margin-top: 100% !important;
            }
        }

        @media(max-width:440px) {
            .SecTions4 {
                margin-top: 120% !important;
            }
        }

        @media(max-width:360px) {
            .SecTions4 {
                margin-top: 140% !important;
            }

            .PrivacyTEXT {
                font-size: 16px;
            }
        }

        .SecTions4 {
            margin-top: 20%;
            margin-bottom: 5%;
        }

        .PrivacyTEXT {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 600;
            /* line-height: 20px; */
            text-align: left;
            color: black;
        }

        .accordion-button {
            font-size: 20px;
            font-weight: 600;
            color: black;
        }

        /* news css */
        .mainSections {
            background-image: url('../img/Rectangle\ 1128.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100% !important;
            height: 60vh !important;
            background-position: 100% 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mainSections h2 {
            font-family: Segoe UI;
            font-size: 35px;
            font-weight: 700;
            line-height: 64px;
            letter-spacing: 0em;
            color: white;

        }

        .REVIES {
            color: #F6A92C;
        }

        .Privacyhiden {
            font-family: Segoe UI;
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            letter-spacing: 0em;
            text-align: left;
            color: rgb(160, 154, 154);

        }

        /* warrenty pages css */
        .bACKground {
            background-image: url('{{ asset('assets/img/Rectangle1128.png') }}');
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 100% 100%;
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .MOB {
            font-family: Segoe UI;
            font-size: 40px;
            font-weight: 700;
            color: #525fe1;
        }

        .FIX {
            color: #f86f03;
        }

        .bACKground h2 {
            font-family: Segoe UI;
            font-size: 40px;
            font-weight: 700;

            color: rgb(180, 173, 173);

        }

        .bACKground p {
            font-family: Segoe UI;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            color: white;
        }

        .mainCONTent {
            background-color: #f3f1f1;
            margin-top: 20px;
        }

        .WARENTTEXT {
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            color: #7a7979;

        }

        .CLAIM {
            font-family: Segoe UI;
            font-size: 34px;
            font-weight: 600;
            color: black;

        }

        .FORMSLABELD {
            font-family: Segoe UI;
            font-size: 18px;
            font-weight: 600;
            color: black;
        }

        .WARENTTEXT::placeholder {
            font-family: Segoe UI;
            font-size: 14px;
            font-weight: 400;
            color: #7a7979;
        }

        .BORDERD {
            border: 1px solid #c5c4c4;
            border-radius: 10px;
        }

        .INPUTBOX {
            border: 1px solid black !important;
            border-radius: 5px;
            width: 20px !important;
            height: 20px !important;
        }

        .form-check-input[type="checkbox"]:checked {
            background-color: blue !important;
        }

        .BTNTEXTED {
            font-family: Segoe UI;
            font-size: 16px !important;
            font-weight: 600 !important;
            padding-inline: 5rem !important;
        }



        .fm-600 {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
        }

        .fm-400 {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
        }

        .fm-600 {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
        }

        .fn-700 {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
        }

        .fn-400 {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
        }

        .bg-colo {
            background-color: #3a3a3a;
        }

        /* @media(max-width:1399){

        } */


        /* orderRatingsandReviews */

        .fon-41 {
            font-size: 7rem;
            font-weight: 400;
        }
    </style>


    <section class="" style="background-color: #f5f5f5;">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="border-bottom border-1">

            <div class="container ">

                <div class="row pt-5">

                    <div class="col-lg-6 pb-4">
                        {{-- <img class="w-100" src="./assests/img/product-cover-5 (1).png" alt=""> --}}
                        <img src="{{ url('storage/' . $order->product->images->first()->image) }}"
                            class="img-fluid me-4 w-100" alt="Card Image" style="border-radius:20px;">
                    </div>

                    <div class="col-lg-6 pt-5">
                        <div class="d-flex align-items-center justify-content-between pt-2 pb-2">
                            <h4 class="fw-bold text-dark pt-3">{{ $order->product->name }} </h4>
                            {{-- <img class="pt-2" src="  {{ asset('assets/img/Vector (8).png') }}" alt=""> --}}
                            <i id="heartIcon" class="fa-regular fa-heart fa-2x" data-product-id="{{ $order->product->id }}"></i>

                        </div>
                        @php
                            $averageRating = number_format($product->averageRating(), 1);
                            // dd($averageRating);
                            $filledStars = intval($averageRating);
                            $emptyStars = 5 - $filledStars;
                        @endphp
                         {{-- @php
                         dd($product->Productreviews->rating);
                         $Rating = number_format($product->reviews->user->rating, 1);
                         // dd($averageRating);
                         $filledStars = intval($Rating);
                         $emptyStars = 5 - $filledStars;
                     @endphp --}}
                        <div class="d-flex align-items-center pb-4">
                            @for ($i = 0; $i < $filledStars; $i++)
                                <img src="{{ asset('assets/img/Vector (7).png') }}" alt="" />
                            @endfor
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <img src="{{ asset('assets/img/Vector (6).png') }}" alt="" />
                            @endfor
                            <h6 class="text-secondary ps-2 pt-1 fm-700">{{ $reviewscount }} Reviews</h6>
                        </div>
                        <h4 class="fw-bold pb-4">PKR.{{ $order->product->price }}</h4>
                        <p class="text-secondary fm-400">{{$order->product->name}} (
                            {{ $order->product->ProductSpecs()->where('spec_id', 10)->first()?->value }}
                            ,
                            {{ $order->product->ProductSpecs()->where('spec_id', 11)->first()?->value }}
                            ) {{ $order->product->ProductSpecs()->where('spec_id', 3)->first()?->value }}  {{ $order->product->ProductSpecs()->where('spec_id', 6)->first()?->value }} {{ $order->product->ProductSpecs()->where('spec_id', 5)->first()?->value }} {{ $order->product->ProductSpecs()->where('spec_id', 4)->first()?->value }}  With Official
                            Warranty</p>
                        <div class="d-flex align-items-center pt-4">
                            <p class="text-secondary fm-400 pt-2 pe-3">Color : </p>
                            @php
                                                        $colors=$order->product->ProductSpecs()->where('spec_id', 20)->first()
                                                            ?->value;
                                                           $colors= explode(',',$colors)??[];
                                                    @endphp
                                                    @foreach($colors as $c)
                                                        <span style="width: 30px;height:30px; margin-right:10px; border-radius:50%;background:{{$c}}"></span>
                                                    @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="border-top border-bottom border-1 py-2 mt-2">

            <div class="container">
                <h1 class="fw-normal fn-400">Ratings and reviews</h1>
            </div>

        </div>

        <div>

            <div class="container py-5">

                <div class="row">

                    <div class="col-lg-4">
                        <h1 class="fon-41 pb-3">{{ $averageRating }}</h1>
                        <div>


                            <div class="d-flex align-items-center  pb-2">
                                @php
                                    $averageRating = number_format($product->averageRating(), 1);
                                    $filledStars = intval($averageRating);
                                    $emptyStars = 5 - $filledStars;
                                @endphp

                                @for ($i = 0; $i < $filledStars; $i++)
                                    <img src="{{ asset('assets/img/Vector (7).png') }}" alt="" />
                                @endfor
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <img src="{{ asset('assets/img/Vector (6).png') }}" alt="" />
                                @endfor


                                <h6 class="text-secondary ps-2 pt-1 fm-700 ps-3">{{ $reviewscount }} Reviews</h6>
                            </div>
                        </div>

                    </div>

                        <div class="col-lg-8 pt-2">

                            <div>
                                <p class="mb-0 conten-h1">Positive</p>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: {{ $positiveRate }}%;" ></div>
                                </div>

                            </div>

                            <div class="pt-3">
                                <p class="mb-0 conten-h1">Negative</p>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: {{ $negativeRate }}%; "></div>
                                </div>

                            </div>

                            <div class="pt-3">
                                <p class="mb-0 conten-h1">Neutral</p>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="15"
                                    aria-valuemin="0" aria-valuemax="100">

                                    <div class="progress-bar" style="width: {{ $neutralRate }}%;"></div>
                                </div>

                            </div>




                        </div>

                    </div>

                </div>

            </div>

            <div class="border-top border-bottom border-1 py-2 mt-2">

                <div class="container">
                    <h1 class="fw-normal fn-400">Add Your Review</h1>
                </div>

            </div>

            <div>

                <div class="container py-5">
                    <form action="{{ route('AddProductReview') }}" method="post">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $order->product->id }}">
                        <div class="rat-icon">
                            <div class="star-rating">
                                <span class="star fx-5" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                                <input type="hidden" id="rating" name="rating" value="0">
                            </div>

                            <div class="mb-5 pt-5">
                                <textarea class="form-control pb-5 ps-4" id="message-text" placeholder="Write Your Comment" name="comment"></textarea>
                            </div>

                            <div class="mx-5 ">
                                <button type="submit" class="btn py-2  btn-primary px-5">Send it</button>
                            </div>

                        </div>
                    </form>

                </div>

                <div class="comments">

                    <div class="container py-5">
                        @foreach ($reviews as $review)

                            <div class="card mb-5">

                                <div class="card-body">

                                    <div class="card-title d-flex align-items-center">

                                        <img src="{{ asset('assets/img/Untitled.png') }}" alt="" />
                                        {{-- <h5 class=" ms-3">{{ $review->user->name }}</h5> --}}
                                        <h5 class="ms-3">
                                            @if ($review->user)
                                                {{ $review->user->name }}
                                            @else
                                                User not found
                                            @endif
                                        </h5>
                                    </div>

                                    <div class="card-text pb-2">
                                        {{-- @dd( $review ) --}}
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <img src="{{ asset('assets/img/Star 19.png') }}" alt="" />
                                            @else
                                                <img src="{{ asset('assets/img/Star 20.png') }}" alt="" />
                                            @endif
                                        @endfor
                                    </div>

                                    <div class="p-0">
                                        <p class="text-secondary">{{ $review->comment }}</p>
                                    </div>

                                </div>

                            </div>
                        @endforeach


                    </div>

                </div>

    </section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heartIcon = document.getElementById('heartIcon');

    heartIcon.addEventListener('click', function() {
        const productId = heartIcon.getAttribute('data-product-id'); // Get product ID from data attribute

        heartIcon.classList.toggle('red'); // Toggle red class to change color

        // Check if product is already in favorites
        if (heartIcon.classList.contains('red')) {
            // If not in favorites, add it
            addToFavorites(productId);
        } else {
            // If already in favorites, remove it
            removeFromFavorites(productId);
        }
    });

    function addToFavorites(productId) {
        fetch('{{ route("Addfavourtes", ["productId" => ":productId"]) }}'.replace(':productId', productId), {
        method: 'POST',
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to add product to favorites');
            }
            // Handle success
        })
        .catch(error => {
            console.error(error);
            // Handle error
        });
    }



    function removeFromFavorites(productId) {
        fetch('{{ route("RemoveFavorites", ["productId" => ":productId"]) }}'.replace(':productId', productId), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to remove product from favorites');
            }
            // Handle success
        })
        .catch(error => {
            console.error(error);
            // Handle error
        });
    }

});

    </script>

    <script>
        // Add event listener to stars to update hidden input value
        const stars = document.querySelectorAll('.star-rating .star');
        const ratingInput = document.querySelector('#rating');
        stars.forEach(star => {
            star.addEventListener('click', (event) => {
                const value = event.target.getAttribute('data-value');
                ratingInput.value = value;
                stars.forEach(s => s.classList.remove('active'));
                event.target.classList.add('active');
                event.stopPropagation(); // Prevent event bubbling
            });
        });
    </script>

@endsection
