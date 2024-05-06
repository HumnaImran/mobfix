@extends('AdminPages.AdminMaster')
@section('content')

@if(session('success'))
<div class="alert alert-success mt-4">
    {{ session('success') }}
</div>
@endif

<div class="main-content">
    <h1 class=" mb-4 dash-1">Dashboard</h1>
    <div class="row gap-3  gap-sm-0 ">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-4 gcard">
                <div class="card-body gt">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title1">{{$totalStoresCount}}</h1>
                        <img src="{{asset('./assets/images/enterprise 1.png')}}" alt="">
                    </div>
                    <h1 class="card-text1">Shops</h1>


                </div>
                <a href="{{route('viewApprovedStores')}}" class="btn-more-info1 w-100 d-flex gap-1 justify-content-center">More
                    Info
                    <img src="{{asset('./assets/images/Frame 263.png')}}" alt=""></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-4 vcard">
                <div class="card-body gt">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title1">200</h1>
                        <img src="{{asset('./assets/images/Total Sales.png')}}" alt="">
                    </div>
                    <h1 class="card-text1">Sales</h1>

                </div>
                <a href="{{route('Allsales')}}" class="btn-more-info1 w-100 d-flex gap-1 justify-content-center">More
                    Info
                    <img src="{{asset('./assets/images/Frame 263.png')}}" alt=""></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-4 scard">
                <div class="card-body gt">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title1">{{$totalRepairOrderDetailsCount}}</h1>
                        <img src="{{asset('./assets/images/Car Service.png')}}" alt="" style="width: 50px;">
                    </div>
                    <h1 class="card-text1">Repair Phones</h1>

                </div>
                <a href="{{route('ViewRepairPhones')}}" class="btn-more-info1 w-100 d-flex gap-1 justify-content-center">More
                    Info
                    <img src="{{asset('./assets/images/Frame 263.png')}}" alt=""></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-4 dcard">
                <div class="card-body gt">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title1">{{$totalUsersCount}}</h1>
                        <img src="{{asset('./assets/images/people 1.png')}}" alt="">
                    </div>
                    <h1 class="card-text1">Products' Customers</h1>

                </div>
                <a href="{{route('viewProductCustomers')}}" class="btn-more-info1 w-100 d-flex gap-1 justify-content-center">More
                    Info
                    <img src="{{asset('./assets/images/Frame 263.png')}}" alt=""></a>
            </div>
        </div>


    </div>

    <!-- Cards Section -->
    <div class="row ">

        <!-- Add more cards here -->

        <!-- Charts Section -->
        <div class="col-lg-8  col-12">


            <div class="card h-100 ">

                <div class="card-body p-4 cradreport " style="display: flex; flex-direction:column; justify-content:center; align-items:center">

                    {{-- <div class="d-flex justify-content-between">
                        <h1 class="card-title-repair">Repairs Report</h1>
                        <div class="dropdown calender-dropdown ">
                            <button class="btn  dropdownBor dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 15 15" fill="none">
                                        <g clip-path="url(#clip0_216_140)">
                                            <path
                                                d="M11.575 2.63892H3.06956C2.3985 2.63892 1.85449 3.18292 1.85449 3.85398V12.3594C1.85449 13.0305 2.3985 13.5745 3.06956 13.5745H11.575C12.2461 13.5745 12.7901 13.0305 12.7901 12.3594V3.85398C12.7901 3.18292 12.2461 2.63892 11.575 2.63892Z"
                                                stroke="black" stroke-width="1.21507"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.75293 1.42389V3.85402" stroke="black"
                                                stroke-width="1.21507" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.8916 1.42389V3.85402" stroke="black"
                                                stroke-width="1.21507" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M1.85449 6.28412H12.7901" stroke="black"
                                                stroke-width="1.21507" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_216_140">
                                                <rect width="14.5808" height="14.5808" fill="white"
                                                    transform="translate(0.0322266 0.208801)" />
                                            </clipPath>
                                        </defs>
                                    </svg></span>
                                2022
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div> --}}

                    <h1 class="card-title-repair" >  Analytical Reports</h1>
                    <div style="width: 400px; height: 400px;">
                    <canvas id="storeRepairChart" style="width:100px !important; height:100px !important" class=""></canvas>
                    </div>
                    <img src="{{asset('./assets/images/grl.png')}}" alt="">


                </div>
            </div>
        </div>



        <!-- Line Chart for Repair Reports -->



        <div class="col-lg-4  col-12 mt-lg-0 mt-md-0 mt-4">
            <!-- Bar Chart for Customer Fulfillment -->
            <div class="card h-100">
                <div class="card-body p-4">

                    <h4 class="card-title-repair mt-4">Customer Fulfilment</h4>

                    <canvas id="stackedReviewsChart"  class=""></canvas>
                    <h4 class="card-title-repair mt-5">Warranty claims</h4>

                    <canvas id="stackedFeedbackChart"  class=""></canvas>

                    {{-- <div class="heading-customer d-flex justify-content-around">
                        <div class="headcustomer-1"> --}}
                            {{-- <h1 class="head-user-1">
                                Last Month
                            </h1>
                            <p class="head-paras">$4,087</p>
                        </div>
                        <div class="headcustomer-1">
                            <h1 class="head-user-1">
                                This Month
                            </h1>
                            <p class="head-paras">$4,087</p>
                        </div> --}}
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-6">

            <div class="table-responsive">
                <table id="myTable" class="table ">
                    <h1 class="shops pt-2 mx-3">Stores</h1>
                    <hr style="margin: 0px;">
                    <thead>

                        <tr>
                            <th class="text-head">
                                ID
                            </th>
                            <th class="text-head">
                                Store Name
                            </th>
                            <th class="text-head">
                               Store Location
                            </th>
                            <th class="text-head">

                                Release Date

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forEach($totalStores as $totalStore)
                        <tr>
                            <td>{{$totalStore->id}}</td>
                            <td>{{$totalStore->name}}</td>
                            <td>{{$totalStore->location}}</td>
                            <td>{{$totalStore->created_at}}</td>
                        </tr>
                        @endforeach

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>

            </div>

        </div>
        <div class="col-md-6 mt-lg-0   mt-md-0 mt-4">
            <div class="table-responsive">

                <table id="myTable2" class="table">
                    <h1 class="sales pt-2 mx-3">Sales</h1>
                    <hr style="margin: 0px;">
                    <thead>

                        <tr>
                            <th class="text-head">
                                ID
                            </th>
                            <th class="text-head">
                                Bicycle
                            </th>
                            <th class="text-head">
                                Delievery Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Silver Stallion</td>
                            <td>02/08/2023</td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>T Rider</td>
                            <td>02/08/2023</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Zeus</td>
                            <td>02/08/2023</td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Pegasus</td>
                            <td>02/08/2023</td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Silver Stallion</td>
                            <td>02/08/2023</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6 mt-4 ">

            <div class="table-responsive">
                <table class="table " id="myTable3">
                    <h1 class="repair pt-2 mx-3">Repair Phones</h1>
                    <hr style="margin: 0px;">
                    <thead>

                        <tr>
                            <th class="text-head">

                                ID
                            </th>
                            <th class="text-head">

                               Customer name

                            </th>
                            <th class="text-head">

                               device_code

                            </th>
                            <th class="text-head">

                              Repair type

                             </th>
                             <th class="text-head">

                              Store name

                               </th>
                        </tr>
                    </thead>


                    <tbody>
                        @forEach($totalRepairOrderDetails as $totalRepairOrderDetail)
                        <tr>

                            <td>{{$totalRepairOrderDetail->id}}</td>
                            <td>{{$totalRepairOrderDetail->first_name}}</td>
                            <td>{{$totalRepairOrderDetail->device_code}}</td>
                            <td>{{$totalRepairOrderDetail->repairType->name}}</td>
                            <td>{{$totalRepairOrderDetail->store->name}}</td>
                            <td></td>
                        </tr>
                        @endforeach

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 mt-4 ">
            <div class="table-responsive">

                <table class="table " id="myTable4">

                    <thead>


                        <tr>
                            <h1 class="customer pt-2 mx-3">Customers</h1>
                            <hr style="margin: 0px;">
                            <th class="text-head">
                                ID
                            </th>
                            <th class="text-head">
                                User name
                            </th>
                            <th class="text-head">
                                Reg Date
                            </th>
                            <th class="text-head">
                                End Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                       @forEach($totalUsers as $totalUser)
                        <tr>
                            <td>{{$totalUser->id}}</td>
                            <td>{{$totalUser->name}}</td>
                            <td>{{$totalUser->created_at}}</td>
                            <td>{{$totalUser->updated_at}}</td>
                        </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('storeRepairChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Stores', 'Repair Orders','Product Orders','customers','Complaints'],
            datasets: [{
                label: 'Count',
                data: [{{ $numStores }}, {{ $numRepairOrders }}, {{$numOrders}},{{$numCustomers}},{{$numComplaints}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)', // Red
                    'rgba(54, 162, 235, 0.6)',
                    '#F86F03', // Blue
                    'rgba(128, 0, 128, 0.5)',
                    'rgba(255, 255, 0, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    '#F86F03',
                    'rgba(128, 0, 128, 0.5)',
                    'rgba(255, 255, 0, 0.5)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false // Hide legend
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.parsed.y;
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('stackedReviewsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Set chart type to line
        data: {
            labels: ['Last Month', 'This Month'],
            datasets: [{
                label: 'Last Month',
                data: [{{$positiveReviewsLastMonth}}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Blue area fill color
                borderColor: 'rgba(54, 162, 235, 1)', // Blue line color
                borderWidth: 1,
                fill: true // Fill area under the line
            }, {
                label: 'This Month',
                data: [{{$positiveReviewsThisMonth}}],
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


<script>
    var ctx = document.getElementById('stackedFeedbackChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Set chart type to line
        data: {
            labels: ['Last Month', 'This Month'],
            datasets: [{
                label: 'Last Month',
                data: [{{$warrantyClaimsLastMonth}}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: true // Fill area under the line
            }, {
                label: 'This Month',
                data: [{{$warrantyClaimsThisMonth}}],
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

@endsection
