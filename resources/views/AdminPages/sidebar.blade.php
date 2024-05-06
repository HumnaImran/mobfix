
<style>
.menu-wrapper::-webkit-scrollbar {
    width: 4px; /* Width of the scrollbar */
}

.menu-wrapper::-webkit-scrollbar-thumb {
    background-color: #333; /* Color of the scrollbar thumb */
    border-radius: 4px; /* Rounded corners */
}

.menu-wrapper::-webkit-scrollbar-track {
    background-color: #ddd; /* Color of the scrollbar track */
}
    </style>

<div class="col-lg-2  sidebar d-none d-lg-flex justify-content-center   ">
    <div class="position-fixed ist-part1">
        <div class="sidebar-logo mt-2 ">

            <img src="/assets/images/logo2.png" alt="Logo" style="width: 10rem;">
        </div>
        <div class="sidebar-menu  row justify-content-center">
            <!-- Sidebar menu items go here -->
            <div class="menu-wrapper" style="padding-left:0rem !important; height: 80vh; overflow-y: auto;">
                <ul class="ul-dash " style="padding-left: 0.5rem !important; margin-top:1rem">


                    @if (auth()->check() && auth()->user()->hasRole('admin'))
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/dashboard 1.png">

                                    <h1 class="dash1">Dashboard</h1>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="shop-dropdown dropdown class1 ">
                                <button class="btn dropdown-toggle d-flex gap-4 align-items-center p-0" type="button"
                                    id="shopDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="" src="./assets/images/office-building 1.png">
                                    <h1 class="dash1">Category</h1>
                                </button>

                                <ul class="dropdown-menu shop-effect" aria-labelledby="shopDropdown">
                                    <li><a class="dropdown-item" href="{{ route('Addcategory') }}">Create Category</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('Allcategory') }}">View Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="shop-dropdown dropdown class1">
                            <button class="btn dropdown-toggle d-flex gap-4 align-items-center p-0"
                                    type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                                <img class="" src="/assets/images/office-building 1.png">
                                <h1 class="dash1">Products</h1>
                            </button>

                            <ul class="dropdown-menu shop-effect" aria-labelledby="productsDropdown">
                                <li><a class="dropdown-item" href="{{route('createProduct')}}">Create </a></li>
                                <li><a class="dropdown-item" href="{{route('viewProducts')}}">View Products</a></li>
                            </ul>
                        </li>




                        <li><a href="{{ route('RequestedProducts') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/group 1 (1).png">
                                    <h1 class="dash1">Requested Products</h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('Allsales') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/Total Sales.png" style="width:20px;">
                                    <h1 class="dash1">Sales</h1>
                                </div>
                            </a>
                        </li>

                        <li><a href="{{ route('viewRequest') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/customer-service 1.png">
                                    <h1 class="dash1">Stores' Requests</h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('viewFeedback') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/customer-service 1.png">
                                    <h1 class="dash1">Stores' Feedbacks </h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('ViewRepairPhones') }}">
                            <div class="d-flex gap-4 align-items-center class1 ">
                                <img class="" src="/assets/images/customer-service 1.png">
                                <h1 class="dash1">RepairPhones</h1>
                            </div>
                        </a>
                    </li>
                        <li><a href="{{ route('Allclaims') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/group 1 (1).png">
                                    <h1 class="dash1">Warranty claims</h1>
                                </div>
                            </a>
                        </li>





                        <li><a href="{{ route('viewwarrantyComplains') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/customer-service 1.png">
                                    <h1 class="dash1">Complains </h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('viewAllContacts') }}">
                            <div class="d-flex gap-4 align-items-center class1 ">
                                <img class="" src="/assets/images/customer-service 1.png">
                                <h1 class="dash1">Contacts </h1>
                            </div>
                        </a>
                    </li>

                        <li>
                            <div class="shop-dropdown dropdown class1 ">
                                <button class="btn dropdown-toggle d-flex gap-4 align-items-center p-0" type="button"
                                    id="shopDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                                    <img class="" src="./assets/images/office-building 1.png">
                                    <h1 class="dash1">Testimonial</h1>

                                </button>

                                <ul class="dropdown-menu shop-effect" aria-labelledby="shopDropdown">
                                    <li><a class="dropdown-item" href="{{ route('AddTestimonial') }}">Create
                                            Testimonial</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('AllTestimonial') }}">View
                                            Testominials</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <div class="shop-dropdown dropdown class1 ">

                            <button class="btn dropdown-toggle d-flex gap-4 align-items-center p-0" type="button"
                                id="shopDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                                <img class="" src="/assets/images/office-building 1.png">
                                <h1 class="dash1">Shops</h1>

                            </button>
                            <ul class="dropdown-menu shop-effect" aria-labelledby="shopDropdown">
                                <li><a href="{{ route('viewApprovedStores') }}" class="dropdown-item"> Shops List</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('viewProductCustomers') }}">Customers</a></li>

                            </ul>

                        </div>
                    @endif
                    <!-- li2 -->



                    {{-- @if (auth()->check() && auth()->user()->hasRole('vendor'))
                <li class="shop-dropdown dropdown class1">
                    <button class="btn dropdown-toggle d-flex gap-4 align-items-center p-0"
                            type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                        <img class="" src="/assets/images/office-building 1.png">
                        <h1 class="dash1">Products</h1>
                    </button>

                    <ul class="dropdown-menu shop-effect" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item" href="{{route('createProduct')}}">Create </a></li>
                        <li><a class="dropdown-item" href="{{route('viewProducts')}}">View Products</a></li>
                    </ul>
                </li>
            @endif --}}

                    <!-- li-3 -->
                    @if (auth()->check() && auth()->user()->hasRole('vendor'))
                        <li>

                            <a href="{{ route('VendorProfile') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    {{-- <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" /> --}}
                                    <img class="" src="/assets/images/office-building 1.png">
                                    <h1 class="dash1">Your Profile</h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('ViewRepairRequest') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/office-building 1.png">
                                    <h1 class="dash1">Repair Requests</h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('ViewStoreFeedbacks') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/office-building 1.png">
                                    <h1 class="dash1">View Feedbacks</h1>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ route('VendorAllclaims') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/office-building 1.png">
                                    <h1 class="dash1">View warranty Claims</h1>
                                </div>
                            </a>
                        </li>

                        <li><a href="{{ route('ViewYourCustomers') }}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img class="" src="/assets/images/office-building 1.png">
                                    <h1 class="dash1">your Customers</h1>
                                </div>
                            </a>
                        </li>
                        <li >
                            <a  href="{{route('VendorWallet')}}">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                {{-- <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" /> --}}
                                <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
                                <h1 class="dash1">Manage wallet</h1></div></a>
                        </li>
                    @endif
                    <!-- li-3 -->

                    <li><a href="/chatify">
                            <div class="d-flex gap-4 align-items-center class1 ">
                                <img class="" src="/assets/images/customer-service 1.png">
                                <h1 class="dash1">Messages</h1>
                            </div>
                        </a>
                    </li>
                    <li><a href="{{ route('StoreProfile') }}">
                            <div class="d-flex align-items-center gap-4  class1 ">
                                <img class="" src="/assets/images/settings 1.png">
                                <h1 class="dash1">Settings</h1>
                            </div>
                        </a></li>
                    <li><a href="{{ route('privacy') }}">
                            <div class="d-flex align-items-center gap-4  class1 ">
                                <img class="" src="/assets/images/enterprise 1.png" style="width:25px;">
                                <h1 class="dash1">Privacy Policy</h1>
                            </div>
                        </a></li>
                    <li><a href="{{ route('TermsAndCondition') }}">
                            <div class="d-flex align-items-center gap-4  class1 ">
                                <img class="" src="/assets/images/settings 1.png">
                                <h1 class="dash1">Terms And Condition</h1>
                            </div>
                        </a></li>



                    <li>
                        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="#" onclick="document.getElementById('logoutForm').submit();">
                                <div class="d-flex gap-4 align-items-center class1 ">
                                    <img src="/assets/images/exit 1.png" alt="">
                                    <h1 class="dash1">Logout</h1>
                                </div>

                            </a>
                        </form>
                    </li>

                    {{-- <li><a href="#">
                    <div class="d-flex align-items-center gap-4  class1 class2">
                        <img class="" src="/assets/images/settings 1.png">
                        <h1 class="dash1">Settings</h1>
                    </div>
                </a></li> --}}

                    {{-- @if (auth()->check() && auth()->user()->hasRole('vendor'))
                    <li><a href="{{ route('viewOrders') }}">
                            <div class="d-flex gap-4 align-items-center class1 ">
                                <img class="" src="/assets/images/customer-service 1.png">
                                <h1 class="dash1"> Orders</h1>
                            </div>
                        </a>
                    </li>
                @endif --}}


                    {{-- @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <li><a href="{{ route('viewFeedback') }}">
                            <div class="d-flex gap-4 align-items-center class1 ">
                                <img class="" src="/assets/images/customer-service 1.png">
                                <h1 class="dash1">Stores Feedback </h1>
                            </div>
                        </a>
                    </li>
                @endif --}}




                    <!-- Add more menu items here -->
                </ul>
            </div>


            </div>



        </div>

    </div>
