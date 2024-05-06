<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->

<ul class="navbar-nav bgSideBar sidebar sidebar-dark accordion" id="accordionSidebar" >
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">
            {{-- <img
      class=""
      src="{{ asset('./assets/images/dlogo.png')}}"
      alt=""
      width="200px"
    /> --}}
            <img width="200px" src="{{ asset('./assets/images/logo2.png') }}"
                alt="" />
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ml-4 dashcolor ">
        <a class="nav-link" href="{{route('YourProfile')}}">
            {{-- <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" /> --}}
            <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
            <span>Profile</span></a>
    </li>
 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item ml-4 dashcolor">
        <a class="nav-link collapsed" href="{{route('RepairRequestStatus')}}">
            <span><img src="{{ asset('./assets/images/orderimg.png') }}" alt="" /> </span>
            <span class="sbfont">Repair Request Status</span>
        </a>

        <div id="companyNav" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="./order2.html">All </a>
                <a class="collapse-item" href="./editUser.html">Edit</a>
                <a class="collapse-item" href="addUser.html">Add r</a>
            </div>
        </div>
    </li>


    <li class="nav-item active ml-4 dashcolor ">
        <a class="nav-link" href="{{route('MyOrders')}}">
            {{-- <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" /> --}}
            <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
            <span>My orders</span></a>
    </li>
    <li class="nav-item active ml-4 dashcolor ">
        <a class="nav-link" href="{{route('MyFavorites')}}">

            <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
            <span>My Favorites</span></a>
    </li>
    <li class="nav-item ml-4 dashcolor">
        <a class="nav-link collapsed" href="/chatify" aria-expanded="true" aria-controls="categoryNav">
            <span>
                <img src="{{ asset('./assets/images/Users.png') }}" alt="" width="25px" />
            </span>
            <span class="sbfont">Go to Chat</span>
        </a>
    </li>

    <li class="nav-item active ml-4 ">
        <a class="nav-link" href="{{route('MyWallet')}}">
            {{-- <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" /> --}}
            <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
            <span>Manage wallet</span></a>
    </li>






    {{-- <li class="nav-item active ml-4 dashcolor">
        <a class="nav-link" href="{{route('WarrantyClaim')}}">
            <img  style="width:5rem" src="{{ asset('./assets/images/MobFix-removebg-preview.png')}}" alt="" />
            <img src="{{ asset('./assets/images/dasl.png') }}" alt="" />
            <span>Claim Warranty</span></a>
    </li> --}}

    {{-- <li class="nav-item ml-4">
        <a class="nav-link collapsed">
            <span><img src="{{ asset('./assets/images/orderimg.png') }}" alt="" /> </span>
            <span class="sbfont">Warranty Management</span>
        </a>

        <div id="companyNav" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('WarrantyClaim')}}">Claim Warranty</a>
                <a class="collapse-item" href="./editUser.html">View claimed warranty </a>

            </div>
        </div>
    </li> --}}

    <li class="nav-item ml-4 dashcolor">
        <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#companyNav" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
            <span><img src="{{ asset('./assets/images/orderimg.png') }}" alt="" /> </span>
            <span class="sbfont">Warranty Management</span>
        </a>

        <div id="companyNav" class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="{{ route('WarrantyClaim') }}">Claim Warranty</a>
                <a class="dropdown-item" href="{{ route('viewYourclaims') }}">View claimed warranty </a>
            </div>
        </div>
    </li>



    {{-- <li class="nav-item ml-4 dashcolor">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
            data-target="#subCategoryChildNav" aria-expanded="true" aria-controls="subCategoryChildNav">
            <span><svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.9375 11.25C12.7883 11.25 12.6452 11.3158 12.5398 11.4331C12.4343 11.5503 12.375 11.7092 12.375 11.875C12.375 12.0408 12.4343 12.1997 12.5398 12.3169C12.6452 12.4342 12.7883 12.5 12.9375 12.5H15.1875C15.3367 12.5 15.4798 12.4342 15.5852 12.3169C15.6907 12.1997 15.75 12.0408 15.75 11.875C15.75 11.7092 15.6907 11.5503 15.5852 11.4331C15.4798 11.3158 15.3367 11.25 15.1875 11.25H12.9375ZM0 3.4375C0 2.52582 0.325948 1.65148 0.906138 1.00682C1.48633 0.362164 2.27324 0 3.09375 0H14.9062C15.7268 0 16.5137 0.362164 17.0939 1.00682C17.6741 1.65148 18 2.52582 18 3.4375V11.5625C18 12.4742 17.6741 13.3485 17.0939 13.9932C16.5137 14.6378 15.7268 15 14.9062 15H3.09375C2.27324 15 1.48633 14.6378 0.906138 13.9932C0.325948 13.3485 0 12.4742 0 11.5625V3.4375ZM3.09375 1.25C2.5716 1.25 2.07085 1.48047 1.70163 1.8907C1.33242 2.30094 1.125 2.85734 1.125 3.4375V5H16.875V3.4375C16.875 2.85734 16.6676 2.30094 16.2984 1.8907C15.9292 1.48047 15.4284 1.25 14.9062 1.25H3.09375ZM16.875 6.25H1.125V11.5625C1.125 12.77 2.007 13.75 3.09375 13.75H14.9062C15.4284 13.75 15.9292 13.5195 16.2984 13.1093C16.6676 12.6991 16.875 12.1427 16.875 11.5625V6.25Z"
                        fill="white" />
                </svg>
            </span>
            <span>
                <img src="{{ asset('./assets/images/menuicon.png') }}" alt="" width="25px" />
            </span>
            <span class="sbfont"> Menu</span>
        </a>
    </li> --}}
    <li class="nav-item navActive ml-4">
        <a class="nav-link collapsed" href="{{route('ViewProfile')}}">
            <span><svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.9375 11.25C12.7883 11.25 12.6452 11.3158 12.5398 11.4331C12.4343 11.5503 12.375 11.7092 12.375 11.875C12.375 12.0408 12.4343 12.1997 12.5398 12.3169C12.6452 12.4342 12.7883 12.5 12.9375 12.5H15.1875C15.3367 12.5 15.4798 12.4342 15.5852 12.3169C15.6907 12.1997 15.75 12.0408 15.75 11.875C15.75 11.7092 15.6907 11.5503 15.5852 11.4331C15.4798 11.3158 15.3367 11.25 15.1875 11.25H12.9375ZM0 3.4375C0 2.52582 0.325948 1.65148 0.906138 1.00682C1.48633 0.362164 2.27324 0 3.09375 0H14.9062C15.7268 0 16.5137 0.362164 17.0939 1.00682C17.6741 1.65148 18 2.52582 18 3.4375V11.5625C18 12.4742 17.6741 13.3485 17.0939 13.9932C16.5137 14.6378 15.7268 15 14.9062 15H3.09375C2.27324 15 1.48633 14.6378 0.906138 13.9932C0.325948 13.3485 0 12.4742 0 11.5625V3.4375ZM3.09375 1.25C2.5716 1.25 2.07085 1.48047 1.70163 1.8907C1.33242 2.30094 1.125 2.85734 1.125 3.4375V5H16.875V3.4375C16.875 2.85734 16.6676 2.30094 16.2984 1.8907C15.9292 1.48047 15.4284 1.25 14.9062 1.25H3.09375ZM16.875 6.25H1.125V11.5625C1.125 12.77 2.007 13.75 3.09375 13.75H14.9062C15.4284 13.75 15.9292 13.5195 16.2984 13.1093C16.6676 12.6991 16.875 12.1427 16.875 11.5625V6.25Z"
                        fill="white" />
                </svg>
            </span>
            <span>
                <img src="{{ asset('./assets/images/Settingsicon.png') }}" alt="" width="25px" />
            </span>
            <span class="sbfont"> Setting</span>
        </a>
        <div id="subCategoryChildNav" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">All</a>
                <a class="collapse-item" href="">Add</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    $(document).ready(function(){
        // Add click event listener to the dropdown toggle button
        $('.dropdown-toggle').on('click', function(){
            // Toggle the dropdown menu visibility
            $(this).next('.dropdown-menu').toggle();
        });

        // Add click event listener to close the dropdown when clicking outside of it
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').hide();
            }
        });
    });
</script>
