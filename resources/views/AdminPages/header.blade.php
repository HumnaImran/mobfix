<div class=" custom-search  py-3 px-sm-5">

    <div class="d-flex justify-content-between align-items-center search2">
        <button class="btn  d-lg-none d-block " type="button" data-bs-toggle="offcanvas"
            data-bs-target="#demo">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="search-bar">

            <input type="text" class=" search-input inpusearch" placeholder="search">
            <a href=""><img class=" search-icon" src="{{asset('./assets/images/Search.png')}}" alt=""></a>

        </div>
        <div class="d-lg-flex d-none gap-3 align-items-center social">
            <a href="/chatify"><img src="{{asset('./assets/images/conversation 1.png')}}" alt="">
            </a>
            <div class="dropdown ">
                <a class="btn  " href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{asset('./assets/images/notification (1) 1.png')}}" alt="">
                </a>

                <div class="dropdown-menu notify-menu ">
                    <div class="notification-list">
                        @if ($messages->isEmpty())

                <div class="notification-item d-flex gap-2 mb-2" style="justify-content: center; align-items: center;">
                    <p>No notifications</p>
                </div>
            @else
                        @foreach($messages as $message)
                        <a href="">
                            <div class="notification-item d-flex gap-2 mb-2" >
                                <img src="{{asset('./assets/images/user1.png')}}" alt="Rohit" style="height: 40px;">
                                <div style="display:flex; flex-direction:column; justify-content: center; align-item:center">
                                    <h3 class="user-1">{{ $message->from_user_name }}</h3>
                                    <p class="user-noti">{{ $message->body }}</p>
                                </div>
                            </div>

                        </a>

                        @endforeach
                        @endif

                        {{-- <a href="">
                            <div class="notification-item d-flex gap-2">
                                <img src="/assets/images/user1.png" alt="Rohit" style="height: 40px;">
                                <div>
                                    <h1 class="user-1">Rohit</h1>
                                    <p class="user-noti">You have 3 new messages.</p>
                                </div>
                            </div>
                        </a> --}}
                        <!-- Add more notification items as needed -->
                    </div>
                </div>
            </div>


            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="document.getElementById('logoutForm').submit();">
                    <img src="/assets/images/exit 1.png" alt="">

                </a>
            </form>



        </div>
    </div>
</div>
