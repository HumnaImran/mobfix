@extends('userPages.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('./assets/css/viewstore.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/location.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <div class="container-fluid header-location">
        <div class="container pb-5">
            <h1 class="heading-location">{{ $store->location }}</h1>
          <a href="{{ route('BookRepair', ['store_id' => $store->id]) }}">  <button class="book-buttons">Book Now</button></a>


        </div>
    </div>

    <!-- Process Section starts -->
    <div class="container-fluid">
        <div class="container pt-5">
            <h1 class="loc-head-1 ">Profile</h1>
            <div class="img-div1 mt-4">
                {{-- <img src="{{ asset('./assets/img/line-26.png') }}" alt=""> --}}
                @if ($store->images->isNotEmpty() && $store->images->first()->image)
    <img src="{{ asset('storage/' . $store->images->first()->image) }}" alt="Store Image" style="width:120px" class="img-fluid">
@else
    <!-- Placeholder image or alternative content -->
   <img src="{{ asset('./assets/img/line-26.png') }}" alt="">
@endif
                {{-- <img src="{{ asset('storage/' . $store->images->first()->image) }}" alt="Store Image" style="width:120px" class="img-fluid"> --}}
                <div class="profile-usrr">
                    <h1 class="profile-head1">
                        {{ $store->name }}
                    </h1>
                    <p class="para-profile">
                        {{$positiveRate}}% Positive Seller Ratings
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div>
                        <iframe class="ifram-1"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3320.5837408574857!2d73.07206992564004!3d33.66794608792467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95459918a25f%3A0x46495cfc8ce0a1a3!2sI-8%20Markaz%20I%208%20Markaz%20I-8%2C%20Islamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1697002643576!5m2!1sen!2s"
                            style="border:0 ; width: 100%;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-4 loc-div" style="flex-direction: column">
                        <h3>Description</h3>
                        <p class="location-paragraph">
                            {{ $store->description }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0  mt-3">
                    <div class="view-store-div text-justify p-2 p-sm-3 p-md-4  pb-3  ">
                        <h5>{{ $store->location }}</h5>
                        <p>{{ $store->description }}</p>
                        <div class="d-flex">
                            <a href="">
                                <i class="fa-brands fa-2x fa-whatsapp"
                                    style="color:rgb(7, 230, 7); font-size:1.3rem !important; margin-right:0.5rem"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <div class="call_store d-flex mx-1">
                                    <i class="fa-solid fa-phone "
                                        style="color:#f86f03; margin-left:0.5rem; font-size:1.3rem !important"></i>
                                    <p class="view-store-callnow" style="font-size: 1rem; margin-left:0.3rem ">Call Now</p>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-md-end">
                            <div class="d-flex">
                                <!-- <button type="button" class="btn  view-store-view px-4 py-2">View Store</button> -->
                               <a href="{{ route('BookRepair', ['store_id' => $store->id]) }}"> <button type="button" class="btn view-store-book mx-1 px-4 py-2" style="border-color:#f86f03 !important">Book Now</button></a>
                            </div>
                        </div>
                        <div class="view-store-slid mt-5">
                            <div class="view-store-walk">
                                <p>Walk-ins are always welcome</p>
                            </div>
                            <!-- three image slider -->
                            <div class="container">
                                <div class="row">
                                    <div class="MultiCarousel slider" data-items="1,2,3,4" data-slide="3" id="MultiCarousel"
                                        data-interval="3000">
                                        <div class="MultiCarousel-inner slider1">
                                            @foreach($store->images as $image)
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="Store Image" class="img-fluid">

                                                    {{-- <img src="storage/app/public/store_images/Tz6UVaQI6dIBjbEgRvEnCmihq9O1X7fdE8BIXgNR.png" alt="Store Image" class="img-fluid"> --}}


                                                </div>
                                            </div>

                                            @endforeach

                                            {{-- <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/about1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div>
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/electronic-devices-balancing-concept 1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div>
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/electronic-devices-balancing-concept 1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div>
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/about1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div>
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/about1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div>
                                            <div class="item slider2">
                                                <div class="pad15 slider3">
                                                    <img src="{{asset('./assets/images/about1.png')}}" alt="Store Image" class="img-fluid">

                                                </div>
                                            </div> --}}
                                        </div>
                                        <button class="btn  leftLst text-white"><i
                                                class="fa-solid fa-angle-left   leftLst-icon"></i></button>
                                        <button class="btn rightLst text-white"><i
                                                class="fa-solid fa-angle-right   rightLst-icon"></i></button>
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div>
                </div>
            </div>
            <hr class="hr1">
        </div>
    </div>
    <!-- next part  start-->
    <div class="container-fluid">
        <div class="container ">
            <div class="location-content text-sm-center p-3 d-flex justify-content-between">
                <div class="content1-h2">
                    <h1 class="conten-h1">Location</h1>
                    <p class="content-p">{{$store->city}}<br>
                        {{$store->location}}</p>
                </div>
                <div class="content1-h2">
                    <h1 class="conten-h1">Time on MobFix</h1>
                    <p class="content-p">{{$timeDifference}}</p>
                </div>
                <div class="content1-h2">
                    <h1 class="conten-h1">Seller Size</h1>
                    <img src="{{asset('assets/img/signal.png')}}" alt="">
                </div>
            </div>
            <hr class="hr1">
        </div>


    </div>
    <div class="container-fluid">
        <div class="container ">
            <div class="location-content  p-3 ">
                <div class="content1-h">
                    <div class=" ul-location">
                        <p class="location-li conten-h1">Chat Response Time
                        </p>
                        <p class="location-li conten-h2">
                            @if ($averageResponseTime < 60)
                                {{ round($averageResponseTime) }} mins
                            @else
                                {{ round($averageResponseTime / 60, 1) }} hours
                            @endif
                        </p>
                    </div>
                    <div class=" ul-location">
                        <p class="location-li conten-h1">Chat Response Rate
                        </p>
                        <p class="location-li conten-h2">{{$responseRate}}%
                        </p>
                    </div>
                    {{-- <div class=" ul-location">
                        <p class="location-li conten-h1">Chat Response Time
                        </p>
                        <p class="location-li conten-h2">100%
                        </p>
                    </div> --}}


                </div>

                <div class="conten-h1 d-flex justify-content-center">This is average for seller in same category</div>
            </div>
            <hr class="hr1 ">
        </div>


    </div>
    <!-- progresss div -->


    <div class="container-fluid">
        <div class="container pt-md-5 pt-3">
            <div class="row align-items-center gap-3 gap-md-0">
                <!-- First Flex Div -->
                <div class="col-md-6">
                    <div class="d-flex progress-stage flex-column justify-content-between h-100">
                        <div>
                            <p class="mb-0 percentage-1">{{$positiveRate}}%</p>
                            <p class="mb-0 rating">Positive Seller Rating</p>
                            <p class="mb-0 review">{{$totalFeedbackForms}} Customer Reviews</p>
                        </div>
                        <!-- You can add additional content below if needed -->
                    </div>
                </div>

                <!-- Second Flex Div -->
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="mb-0 conten-h1">Positive</p>
                                <div class="progress w-75">
                                    <div class="progress-bar" style="width: {{ $positiveRate }}%; background: #FBCB50;"></div>
                                </div>
                                <p class="mb-0 conten-h1">{{$positiveCount}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="mb-0 conten-h1">Neutral</p>
                                <div class="progress w-75">
                                    <div class="progress-bar" style="width: {{ $neutralRate }}%;background: #FBCB50;"></div>
                                </div>
                                <p class="mb-0 conten-h1">{{$neutralCount}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 conten-h1">Negative</p>
                                <div class="progress w-75">
                                    <div class="progress-bar" style="width: {{ $negativeRate }}%;background: #FBCB50;"></div>
                                </div>
                                <p class="mb-0 conten-h1">{{$negativeCount}}</p>
                            </div>
                        </div>
                        <!-- You can add additional content below if needed -->
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-5 pt-4">
                <div class="">
                    <h1 class="content3">Recent Reviews</h1>
                </div>
                <div class="">
                    <div class="btn-group">
                        <button type="button" class="btn " data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Three Dot Icon -->
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="hr1 mt-2">
        </div>

    </div>
    <!-- anpother rating -->
    @foreach($Recentcomments as $Recentcomment)
    <div class="container-fluid">
        <div class="container ">


            <div class="d-flex justify-content-between">
                <!-- First Div with Dropdown -->
                <div>
                    <h1 class="content4">{{$Recentcomment->full_name}} - {{ $Recentcomment->created_at->diffForHumans() }}</h1>
                    <p>{{$Recentcomment->comment}}</p>
                    {{-- <div class="btn-group"> --}}
                        {{-- <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Three Dot Icon -->
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                            <img src="{{asset('assets/img/dot3.png')}}" alt="">
                        </button> --}}


                        {{-- <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                        </ul> --}}
                    {{-- </div> --}}
                </div>
                @php
                $rating = \App\Models\FeedbackForm::getAverageRating($Recentcomment->id);
                $wholeStars = floor($rating);
                $halfStar = $rating - $wholeStars >= 0.5;
            @endphp

                <!-- Second Div with Emoji and Content -->
                <div class="text-center">
                    <img src="{{asset('assets/img/emoji2.png')}}" alt="">
                    <p class="conten5">{{$rating}}</p>
                </div>
            </div>


            <hr class="hr1 ">

        </div>

    </div>
    @endforeach


    <!-- anpother rating -->

    <!-- next part start -->
    <div class="container-fluid">
        <div class="container py-md-5 py-3">
            <h1 class="content3 pb-3">Seller Ratings and Reviews ({{$totalComments}})</h1>
            <div class="row gap-5">
                @foreach($comments as $comment)
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="img-section1 d-flex gap-4 align-items-start">
                                <img src="{{ asset('./assets/img/line-26.png') }}" alt="">
                                <div class="img-cont1">
                                    <h1 class="con-1-h1">{{$comment->full_name}}</h1>
                                    <p class="con1-p">{{$comment->comment}}
                                    </p>
                                </div>

                            </div>

                        </div>

                        @php
                        $rating = \App\Models\FeedbackForm::getAverageRating($comment->id);
                        $wholeStars = floor($rating);
                        $halfStar = $rating - $wholeStars >= 0.5;
                    @endphp
                        <div class="col-md-4 d-flex justify-content-end align-items-end">

                            <div class="rating d-flex justify-content-end">
                                @php
                                $rating = \App\Models\FeedbackForm::getAverageRating($comment->id);
                                $wholeStars = floor($rating);
                                $halfStar = $rating - $wholeStars >= 0.5;
                            @endphp

                            <p>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $wholeStars)
                                        <i class="fas fa-star" style="color: #FFCC00;"></i>
                                    @elseif ($i == $wholeStars + 1 && $halfStar)
                                        <i class="fas fa-star-half-alt" style="color: #FFCC00;"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a href="{{ route('AllsellerReviews', ['store_id' => $store->id]) }}" style="float: right;">see more</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function() {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function() {
                ResCarouselSize();
            });

            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();

                $(itemsDiv).each(function() {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);

                    if (bodyWidth >= 992) {
                        incno = 3; // Set the number of items to display as 2 for larger screens
                    } else if (bodyWidth >= 768) {
                        incno = 2; // Set the number of items to display as 2 for larger screens
                    } else {
                        incno = 1; // Set the number of items to display as 1 for smaller screens
                    }
                    itemWidth = sampwidth / incno;

                    $(this).css({
                        'transform': 'translateX(0px)',
                        'width': itemWidth * itemNumbers
                    });
                    $(this).find(itemClass).each(function() {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");
                });
            }

            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var
                        itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");
                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function() {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function() {
                ResCarouselSize();
            });

            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();

                $(itemsDiv).each(function() {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);

                    if (bodyWidth >= 992) {
                        incno = 3; // Set the number of items to display as 2 for larger screens
                    } else if (bodyWidth >= 768) {
                        incno = 2; // Set the number of items to display as 2 for larger screens
                    } else {
                        incno = 1; // Set the number of items to display as 1 for smaller screens
                    }
                    itemWidth = sampwidth / incno;

                    $(this).css({
                        'transform': 'translateX(0px)',
                        'width': itemWidth * itemNumbers
                    });
                    $(this).find(itemClass).each(function() {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");
                });
            }

            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");
                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var
                        itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");
                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }
        });
    </script>
@endsection
