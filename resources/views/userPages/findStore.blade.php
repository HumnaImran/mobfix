@extends('userPages.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('./assets/css/find-store.css') }}" />
    <div class="container-fluid find-store d-flex justify-content-center ">
        <h1 class="find-store-heading">Find Your Nearest Store</h1>
    </div>
    <div class="container " style="margin-bottom: 7rem">
        <div class="row mt-5" style="display: flex; justify-content:center !important; align-item:center !important">
            <div class="col-md-6" style="display: flex; flex-direction:column; align-item:center; justify-content:center;">
                <label for="exampleInputEmail1" class="form-label label-color">Enter Your Location</label>
                <input type="text" name ="location" class="form-control abcClass" placeholder="0-1082-A Satelite Town"
                    id="exampleInputEmail1" aria-describedby="emailHelp">

                <button id="searchButton" style="margin-top: 1rem; margin-bottom:1rem;" class="btn btn-primary"> Search
                    Stores </button>
            </div>

            <div class="col-md-6">
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d212645.32758412763!2d73.08610799999998!3d33.61611625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1693554710759!5m2!1sen!2s"
                        class="w-100" height="400" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div id="storeResults" style="display: none;">
            @if (session('stores'))
                <div class="row mt-5 mb-5">


                    <div class="col-md-6 mt-md-0 mt-3">

                    </div>
                </div>
                @else
        <!-- Display error message if no stores are found -->
        <p>No stores found for the given location.</p>

            @endif
        </div>
    </div>





    <div class="container preference mt-5">
        <h4>Top Service Providers By orders Count</h4>
        <p></p>The top service providers, as determined by user count and completed orders count, offer valuable insights
        for users seeking quality services. By analyzing these metrics, users can identify providers who consistently
        deliver satisfactory outcomes and maintain a high level of customer satisfaction.
        <div class="row mt-5 mb-5 gy-5">
            {{-- @foreach ($storesWithHighestOrderCount as $store) --}}
            <div class="col-lg-6 col-md-6 col-12">
                @foreach ($storesWithHighestOrderCount as $store)
                    <div class="find-store-div text-justify p-2 p-sm-3 p-md-4 pb-3">
                        <h5>{{ $store->name }}</h5>
                        <p>{{ $store->description }}</p>
                        <p>{{ $store->location }}</p>
                        <div class="d-flex" style="align-items: center ">
                            <a href="">
                                <i class="fa-brands fa-2x fa-whatsapp"
                                    style="color:rgb(7, 230, 7); font-size:1.3rem !important; margin-right:0.5rem"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <div class="d-flex call_store">
                                    <a href="/chatify/{{ $store->user->id }}"><i class="fa-brands fa-rocketchat"
                                            style="color:#f86f03; margin-left:0.5rem; font-size:1.3rem !important"></i></a>

                                    {{-- class="btn btn-primary"><p class="find-store-callnow" style="font-size: 1rem; margin-left:0.3rem ">Message Now</p></a> --}}
                                </div>
                            </a>
                            <button type="button" class="btn priceBtn text-white"
                                style="margin-left: 1rem; display:flex; justify-content:center; align-items:center;">
                                {{ number_format($store->feedbackForms()->avg('experience->rating'), 0) }}.00
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 8 9"
                                    fill="none">
                                    <path
                                        d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z"
                                        fill="white" />
                                </svg>

                            </button>

                        </div>
                        <div class="d-flex justify-content-between" style="align-items:end">
                            {{-- <div class="date">
                                @if ($latestOrder = $store->orders->last())
                                    <p style="font-size:0.8rem"><strong>Last Time You Booked:</strong>
                                        {{ $latestOrder->created_at->format('Y-m-d') }}</p>
                                @endif
                            </div> --}}
                            <br>
                            <div class="d-lg-flex">
                                <a href="{{ route('viewStore', ['store_id' => $store->id]) }}">
                                    <button type="button" class="btn find-store-view px-4 py-2">View Store</button>
                                </a>
                                <a href="{{ route('BookRepair', ['store_id' => $store->id]) }}"> <button type="button"
                                        class="btn find-store-book mx-1 px-4 py-2">
                                        Book Now
                                    </button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-6 col-md-6 col-12 ">

                <canvas id="stackedFeedbackChart" style="width:450px; height:250px" class=""></canvas>


                <canvas id="orderStatusPieChart" style="width:150px; height:100px"></canvas>

            </div>
        </div>


    </div>




    <div class="container preference mt-5">
        <h3>Your Preferences</h3>
        <p></p>Explore a record of your interactions with various stores over time.: Reevaluate the stores you've chosen in
        the past, considering the quality of service and overall experience. Reflecting on past choices informs future
        consumer decisions.
        <div class="row mt-5 mb-5 gy-5">
            @foreach ($stores as $store)
                <div class="col-md-6">
                    <div class="find-store-div text-justify p-2 p-sm-3 p-md-4 pb-3">
                        <h5>{{ $store->name }}</h5>
                        <p>{{ $store->description }}</p>
                        <p>{{ $store->location }}</p>
                        <div class="d-flex" style="align-items: center ">
                            <a href="">
                                <i class="fa-brands fa-2x fa-whatsapp"
                                    style="color:rgb(7, 230, 7); font-size:1.3rem !important; margin-right:0.5rem"></i>
                            </a>
                            <a href="" class="text-decoration-none">
                                <div class="d-flex call_store">
                                    <a href="/chatify/{{ $store->user->id }}"><i class="fa-brands fa-rocketchat"
                                            style="color:#f86f03; margin-left:0.5rem; font-size:1.3rem !important"></i></a>

                                    {{-- class="btn btn-primary"><p class="find-store-callnow" style="font-size: 1rem; margin-left:0.3rem ">Message Now</p></a> --}}
                                </div>
                            </a>
                            <button type="button" class="btn priceBtn text-white"
                                style="margin-left: 1rem; display:flex; justify-content:center; align-items:center;">
                                {{ number_format($store->feedbackForms()->avg('experience->rating'), 0) }}.00
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 8 9"
                                    fill="none">
                                    <path
                                        d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z"
                                        fill="white" />
                                </svg>

                            </button>

                        </div>
                        <div class="d-flex justify-content-between" style="align-items:end">
                            <div class="date">
                                @if ($latestOrder = $store->orders->last())
                                    <p style="font-size:0.8rem"><strong>Last Time You Booked:</strong>
                                        {{ $latestOrder->created_at->format('Y-m-d') }}</p>
                                @endif
                            </div>
                            <div class="d-lg-flex">
                                <a href="{{ route('viewStore', ['store_id' => $store->id]) }}">
                                    <button type="button" class="btn find-store-view px-4 py-2">View Store</button>
                                </a>
                                <a href="{{ route('BookRepair', ['store_id' => $store->id]) }}"> <button type="button"
                                        class="btn find-store-book mx-1 px-4 py-2">
                                        Book Now
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-6 mt-md-0 mt-3">

            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add this in your HTML head section -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var location = $('#exampleInputEmail1').val();

                $.ajax({
                    url: '{{ route('searchStores') }}',
                    method: 'GET',
                    data: {
                        location: location
                    },
                    success: function(data) {

                        if (data.hasOwnProperty('message')) {
                                // alert(data.message)
                            $('#storeResults').html('<p>' + data.message + '</p>');
                            $('#storeResults').show()
                        } else {

                            $('#storeResults').html(data);

                            $('#storeResults').slideDown('slow');
                        }
                    },
                    error: function(error) {

                        console.error('Error fetching store data:', error);
                    }
                });
            });
        });
    </script>



    <script>
        var ctx = document.getElementById('orderStatusPieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach ($completedOrdersCountTopStores as $storeName => $completedCount)
                        '{{ substr($storeName, 0, 5) }} (Completed)',
                    @endforeach
                    @foreach ($cancelledOrdersCountTopStores as $storeName => $cancelledCount)
                        '{{ substr($storeName, 0, 5) }} (Cancelled)',
                    @endforeach
                ],
                datasets: [{
                    label: 'Order Status',
                    data: [
                        @foreach ($completedOrdersCountTopStores as $completedCount)
                            {{ $completedCount }},
                        @endforeach
                        @foreach ($cancelledOrdersCountTopStores as $cancelledCount)
                            {{ $cancelledCount }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                    ],
                    borderWidth: 1,

                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('stackedFeedbackChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Top Rated Stores', 'Lowest Rated Stores'],
                datasets: [{
                    label: 'User Count',
                    data: [{{ implode(',', $userCountTopStores) }},
                        {{ implode(',', $userCountBottomStores) }}
                    ],
                    backgroundColor: [
                        'rgba(248, 111, 3, 0.5)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(248, 111, 3, 0.5)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1,

                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('stackedFeedbackChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Set chart type to line
            data: {
                labels: ['highest order Count', 'lowest Order Count'],
                datasets: [{
                    label: 'Highest Order',
                    data: [{{ $storesWithHighestOrderCount }}],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true // Fill area under the line
                }, {
                    label: 'lowest Order Count',
                    data: [{{ $bottomStoresWithLowestOrderCount }}],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Red area fill color
                    borderColor: 'rgba(255, 99, 132, 1)', // Red line color
                    borderWidth: 1,
                    fill: true // Fill area under the line
                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    {{-- <script>
    $(document).ready(function () {
        $('#searchButton').click(function () {

            $('#storeResults').slideToggle(); // Use slideToggle() for a smooth show/hide effect
        });
    });
</script> --}}
@endsection
