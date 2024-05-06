<!-- header -->
 <header class="head">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="./index.html" style="margin-right: 0rem !important">
          <img  width="150px" src="{{asset('assets/images/logo2.png')}}" alt="" />

        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0 nav-list p-4 navbarhover">
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a class="nav-link  " aria-current="page" href="{{route('index')}}"
                >Home</a
              >
            </li>

            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a class="nav-link  " href="{{url('AboutUs')}}">About Us</a>
            </li>
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
                <a class="nav-link  " aria-current="page" href="{{route('FixYourStuff')}}"
                  >Fix Your stuff</a
                >
              </li>
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a class="nav-link  " href="{{url('getAPhone')}}">Get a new phone</a>
            </li>
            {{-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"

                href="{{url('FixYourStuff')}}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Fix your stuff
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="FixYourStuff"></a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a href="{{url('Service')}}" class="nav-link" aria-disabled="true"
                >Services</a
              >
            </li>
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a href="{{url('faqs')}}" class="nav-link  " aria-disabled="true"
                >FAQ</a
              >
            </li>
            <li class="nav-item itemhover" style="margin-right: 0.5rem">
              <a href="{{route('contactUs')}}" class="nav-link " aria-disabled="true"
                >Contact Us</a
              >
            </li>
          </ul>



          @if (Route::has('login'))
          @auth
          <li>
            <div>

                <i class="fa-solid fa-cart-shopping" style="font-size: 2rem"></i>
                <span
                  class="badge bg-danger"
                  style="width: 30px;
                  height: 30px;

                  font-size: 27px;
                  border-radius: 26px;
                  transform: perspective(0px) translate(-12px) rotate(0deg) scale(0.50);
                  transform-origin: top;
                  padding-right: 0;
                  padding-top: 0.2px;
                  padding-left: 0.2px;
                  text-align: center;border-width: 48px;
                ">
                @if (auth()->user()->cart)
               {{ auth()->user()->cart()->with('product')->count()}}
@else
    0
@endif</span>
               </div>
          </li>
              <div class="dropdown" style="margin-left: 1rem">
                  <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #f86f03">
                      {{ auth()->user()->name }}
                  </button>


                  @php
                  $user = auth()->user();
                  $store = $user->store;
                  $storeStatus = optional($store)->status;
              @endphp



                  <ul class="dropdown-menu" aria-labelledby="userDropdown">
                      @if(auth()->user()->hasRole('admin'))
                          <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>

                          @elseif($user->hasRole('vendor') && $storeStatus === 'approved')
                          <li>
                              <a class="dropdown-item" href="{{ route('VendorProfile') }}">
                                  Dashboard
                              </a>
                          </li>

                      @elseif($user->hasRole('user'))
                          <li><a class="dropdown-item" href="{{ route('YourProfile') }}">Profile</a></li>
                          <li><a class="dropdown-item" href="{{ route('OrderHistory') }}">My orders</a></li>
                      @endif

                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <x-dropdown-link class="dropdown-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </x-dropdown-link>
                          </form>
                      </li>
                  </ul>
              </div>
          @else
              <form class="d-flex" role="search">
                  <a href="{{ url('login') }}" class="btn nav-button px-3" type="submit">Log In</a>
                  <a href="{{ route('Signup') }}" class="btn nav-button1 mx-3 px-3" type="submit">Register</a>
              </form>
          @endauth
      @endif
        </div>
      </div>
    </nav>
  </header>
  <!-- header end -->



