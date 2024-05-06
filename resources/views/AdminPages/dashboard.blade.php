@extends('AdminPages.AdminMaster')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-lg-flex d-none justify-content-center notScroll px-0 mx-0 bgSide">
                <div class="w-100" id="sidebar-wrapper ">
                    <div class="sidebar-heading d-flex justify-content-center align-items-center p-5">
                        <i class=" "></i><img class="mobimg" src="./assets/images/MobFiximg.png" alt="" />
                    </div>
                    <div class="list-group list-group-flush my-3">
                        <a href="{{route('dashboard')}}" class="dash d-flex justify-content-center align-items-center my-3 w-100">
                            <div class="d-flex">
                                <div class="px-1">
                                    <img class="dashIcon px-2" src="./assets/images/dashboardone.png" alt="" />
                                </div>
                                <div>
                                    <p>Dashboard</p>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown w-100 my-3">
                            <button class="btn dash text dropdown-toggle dashBtn w-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="dashIcon pe-3" src="./assets/images/shopimg.png" alt="" />
                               Category
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('Addcategory')}}">Create Category</a></li>
                                <li><a class="dropdown-item" href="#">View Category</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>



                        <a href="#" class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                            <div class="d-flex">
                                <div class="px-3">
                                    <img class="dashIcon" src="./assets/images/shopimage.png" alt="" />
                                </div>
                                <div class="">
                                    <p class="">Sales</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                            <div class="d-flex">
                                <div class="px-2">
                                    <img class="dashIcon px-2" src="./assets/images/repairimg.png" alt="" />
                                </div>
                                <div>
                                    <p>Repairs</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dash d-flex justify-content-center align-items-center my-3 pe-3 w-100">
                            <div class="d-flex">
                                <div class="px-2">
                                    <img class="dashIcon px-2" src="./assets/images/customerimg.png" alt="" />
                                </div>
                                <div>
                                    <p>Messages</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown w-100 my-3">
                            <button class="btn dash text dropdown-toggle dashBtn w-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="dashIcon pe-3" src="./assets/images/shopimg.png" alt="" />
                                Shops
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                            <div class="d-flex">
                                <div class="px-2">
                                    <img class="dashIcon px-2" src="./assets/images/reportsimg.png" alt="" />
                                </div>
                                <div>
                                    <p>Reports</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dash d-flex justify-content-center align-items-center mt-5 pe-4 w-100">
                            <div class="d-flex">
                                <div class="px-2">
                                    <img class="dashIcon px-2" src="./assets/images/settingsicon.png" alt="" />
                                </div>
                                <div>
                                    <p>Settings</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- offcanvas code start here  ---------- -->

            <div class=" d-lg-none d-flex justify-content-center notScroll px-0 mx-0 ">

                <!-- offcanava  -->
                <!-- <button class="btn d-lg-none d-md-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa fa-bars"></i></button> -->

                <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <!-- <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5> -->
                        <div class=" d-flex justify-content-between">
                            <div>
                                <img class="mobimg" src="./assets/images/MobFiximg.png" alt="" />
                            </div>
                            <div>
                                <button type="button" class="btn-close btnClose" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                        </div>

                    </div>
                    <div class="offcanvas-body ">

                        <div class="w-100" id="sidebar-wrapper ">

                            <div class="list-group list-group-flush my-3">
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center my-3 w-100">
                                    <div class="d-flex">
                                        <div class="px-1">
                                            <img class="dashIcon px-2" src="./assets/images/dashboardone.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <p>Dashboard</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                                    <div class="d-flex">
                                        <div class="px-3">
                                            <img class="dashIcon" src="./assets/images/shopimage.png" alt="" />
                                        </div>
                                        <div class="">
                                            <p class="">Sales</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                                    <div class="d-flex">
                                        <div class="px-2">
                                            <img class="dashIcon px-2" src="./assets/images/repairimg.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <p>Repairs</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center my-3 pe-3 w-100">
                                    <div class="d-flex">
                                        <div class="px-2">
                                            <img class="dashIcon px-2" src="./assets/images/customerimg.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <p>Messages</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown w-100 my-3">
                                    <button class="btn dash text dropdown-toggle dashBtn w-100" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="dashIcon pe-3" src="./assets/images/shopimg.png" alt="" />
                                        Shops
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center my-3 pe-4 w-100">
                                    <div class="d-flex">
                                        <div class="px-2">
                                            <img class="dashIcon px-2" src="./assets/images/reportsimg.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <p>Reports</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"
                                    class="dash d-flex justify-content-center align-items-center mt-5 pe-4 w-100">
                                    <div class="d-flex">
                                        <div class="px-2">
                                            <img class="dashIcon px-2" src="./assets/images/settingsicon.png"
                                                alt="" />
                                        </div>
                                        <div>
                                            <p>Settings</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- offcanava  -->


            </div>
            <!-- offcanvas code end here  ---------- -->

            <div class="col-12 col-lg-10 scrollYes px-0 mx-0">
                <div class="containertwo">
                    <!-- navbar start ------ -->
                    <div class="d-flex bg-white  w-100">
                        <div class="ps-3">
                            <button class="btn  d-lg-none d-md-flex d-md-flex " type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><span> <i
                                        class="fa fa-bars"></i></span></button>

                        </div>
                        <div class="d-flex justify-content-between  w-100">
                            <div class="ms-5">
                                <div class="input-group mb-3 inDiv">
                                    <input type="text" class="form-control inClass inDiv" placeholder="search"
                                        aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn" type="button" id="button-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            viewBox="0 0 15 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.20886 0C11.1838 0 14.417 3.1619 14.417 7.04913C14.417 8.88311 13.6973 10.5558 12.5196 11.8112L14.837 14.0727C15.0539 14.2848 15.0546 14.6279 14.8377 14.84C14.7296 14.9472 14.5868 15 14.4447 15C14.3033 15 14.1612 14.9472 14.0524 14.8415L11.707 12.5542C10.4732 13.5205 8.90887 14.099 7.20886 14.099C3.23396 14.099 0 10.9364 0 7.04913C0 3.1619 3.23396 0 7.20886 0ZM7.20886 1.08582C3.84611 1.08582 1.11031 3.76055 1.11031 7.04913C1.11031 10.3377 3.84611 13.0132 7.20886 13.0132C10.5709 13.0132 13.3067 10.3377 13.3067 7.04913C13.3067 3.76055 10.5709 1.08582 7.20886 1.08582Z"
                                                fill="#B5B2B2" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex me-5">
                                <a href="#">
                                    <img class="conIcon mx-2" src="./assets/images/conversationimg.png"
                                        alt="" /></a>

                                <a href="#">
                                    <img class="conIcon mx-2" src="./assets/images/notimg.png" alt="" />
                                </a>
                                <a href="#">
                                    <img class="conIcon mx-2" src="./assets/images/exitimg.png" alt="" />
                                </a>
                            </div>

                        </div>

                    </div>
                    <!-- navbar end ------ -->

                    <!-- main container start ------- -->
                    <div class="container">
                        <div class="row rightSide">
                            <h4 class="p-4">Dashboard</h4>
                            <div class="col-md-3">
                                <div class="card orangeCard">
                                    <div class="card-body w-100 p-0">
                                        <div class="d-flex justify-content-between p-3">
                                            <div>
                                                <p class="ten">10</p>
                                                <p class="shopClass">Shops</p>
                                            </div>
                                            <div>
                                                <img class="eImg" src="./assets/images/enterpriseimg.png"
                                                    alt="" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center cardoneBg">
                                            <a class="moreClass p-2" href="#">More info
                                                <img class="circleimg" src="./assets/images/circleImg.png"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card cardTwoBg">
                                    <div class="card-body w-100 p-0">
                                        <div class="d-flex justify-content-between p-3">
                                            <div>
                                                <p class="ten">200</p>
                                                <p class="shopClass">Sales</p>
                                            </div>
                                            <div>
                                                <img class="eImg" src="./assets/images/Totalimg.png" alt="" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center cardoneBg">
                                            <a class="moreClass p-2" href="#">More info
                                                <img class="circleimg" src="./assets/images/circleImg.png"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card orangeCard">
                                    <div class="card-body w-100 p-0">
                                        <div class="d-flex justify-content-between p-3">
                                            <div>
                                                <p class="ten">100</p>
                                                <p class="shopClass">Repair Phones</p>
                                            </div>
                                            <div>
                                                <img class="eImg" src="./assets/images/Carimg.png" alt="" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center cardoneBg">
                                            <a class="moreClass p-2" href="#">More info
                                                <img class="circleimg" src="./assets/images/circleImg.png"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card orangeCard">
                                    <div class="card-body w-100 p-0">
                                        <div class="d-flex justify-content-between p-3">
                                            <div>
                                                <p class="ten">250</p>
                                                <p class="shopClass">Customers</p>
                                            </div>
                                            <div>
                                                <img class="eImg" src="./assets/images/pimg.png" alt="" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center cardoneBg">
                                            <a class="moreClass p-2" href="#">More info
                                                <img class="circleimg" src="./assets/images/circleImg.png"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Dashed Chart Section -->
                                <div class="col-lg-8 col-12">
                                    <div class="card h-100">
                                        <div class="card-body cradreport">


                                            <h1 class="card-title-repair">Repair Reports</h1>
            <canvas id="storeRepairChart" class=""></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Stacked Area Chart Section -->
                                <div class="col-lg-4 col-12 mt-lg-0 mt-md-0 mt-4">
                                    <div class="card h-100">
                                        <div class="card-body cradreport">
                                            <h1 class="card-title-repair">Customer Fulfilment</h1>
                                            <canvas id="stackedAreaChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row ">

                          <div class="col-lg-8  col-12">


                              <div class="card h-100 ">

                                  <div class="card-body cradreport ">
                                      <h1 class="card-title-repair ">Repair Reports</h1>
                                      <canvas id="dashedChart" class="">

                                      </canvas>
                                      <img src="./assets/images/grl.png" alt="">


                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4  col-12 mt-lg-0 mt-md-0 mt-4">
                            <canvas id="stackedAreaChart" width="400" height="200"></canvas>
                          </div>
                      </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <div class="tableOne bg-white">
                                            <table class="table">
                                                <h1 class="shops pt-4 mx-3 tableShop">Shops</h1>
                                                <hr style="margin: 0px" />
                                                <thead>
                                                    <!-- <p class="tableShop border-bottom p-4">Shops</p> -->
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    ID
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Company Name
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Release Date
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center tablePart">01</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@mdo</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">02</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@fat</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">03</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">04</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">05</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <div class="tableOne bg-white">
                                            <table class="table">
                                                <h1 class="pt-4 mx-3 tableSales">Sales</h1>
                                                <hr style="margin: 0px" />
                                                <thead>
                                                    <!-- <p class="tableSales border-bottom p-4">Sales</p> -->
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    ID
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Bicycle
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Delivery Date
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center tablePart">01</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@mdo</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">02</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@fat</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">03</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">04</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">05</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="table-responsive">
                                        <div class="tableOne bg-white">
                                            <table class="table">
                                                <h1 class="pt-4 mx-3 tableRepair">Repair Phones</h1>
                                                <hr style="margin: 0px" />
                                                <thead>
                                                    <!-- <p class="tableRepair border-bottom p-4">Repair Phones</p> -->
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    ID
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Day of under maint
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    End Date
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center tablePart">01</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@mdo</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">02</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@fat</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">03</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">04</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">05</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="table-responsive">
                                        <div class="tableOne bg-white">
                                            <table class="table">
                                                <h1 class="pt-4 mx-3 tableCus">Customers</h1>
                                                <hr style="margin: 0px" />
                                                <thead>
                                                    <!-- <p class="tableCus border-bottom p-4">Customers</p> -->
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    ID
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    User Name
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Reg Date
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <th scope="col">
                                                            <div class="dropdown text-center">
                                                                <button class="btn idBtn dropdown-toggle text-bold"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    End Date
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Another
                                                                            action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">Something
                                                                            else here</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center tablePart">01</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@mdo</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">02</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <!-- <td>@fat</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">03</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">04</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center tablePart">05</th>
                                                        <td class="text-center tablePart">Giant</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                        <td class="text-center tablePart">02/08/2023</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main container end ------- -->
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
            labels: ['Stores', 'Repair Orders'],
            datasets: [{
                label: 'Count',
                data: [{{ $numStores }}, {{ $numRepairOrders }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)', // Red
                    'rgba(54, 162, 235, 0.6)', // Blue
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
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

{{--
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('storeRepairChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Stores', 'Repair Orders'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $numStores }}, {{ $numRepairOrders }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}

@endsection
