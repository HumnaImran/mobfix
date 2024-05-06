@extends('AdminPages.AdminMaster')
@section('content')


<style>

body{
    background:#eee;
}

.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}

.card:before{

    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#eea36a;;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{

    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#f86f03;;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.social-list li{
    padding:10px;
    color:#f86f03;;
    font-size:19px;
}


.buttons button:nth-child(1){
       border:1px solid #f86f03; !important;
       color:#f86f03;;
       height:40px;
}

.buttons button:nth-child(1):hover{
       border:1px solid #f86f03; !important;
       color:#fff;
       height:40px;
       background-color:#f86f03;;
}

.buttons button:nth-child(2){
       border:1px solid #f86f03; !important;
       background-color:#f86f03 ;
       color:#fff;
        height:40px;
}

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 @if ($userHasProfile)

 <div class="row mt-5 gy-5">
    <div class="col-lg-6">
        <div class="container ">

            <div class="row ">

                <div class="col-md-7" style="width:100%">

                    <div class="card p-3 py-4">

                        <div class="text-center">
                            <img src="{{ asset('storage/' . $userProfile->profile_image)}}"  width="100"  alt="Profile Photo" class="rounded-circle img-fluid" >
                            {{-- <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle"> --}}
                        </div>

                        <div class="text-center mt-3">
                            <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                            <h5 class="mt-2 mb-0">{{auth()->user()->name}} {{$userProfile->last_name}}</h5>
                            <span>{{$userProfile->address}}</span>

                            <div class="px-4 mt-1">
                                <p class="fonts">{{auth()->user()->store->description}} </p>

                            </div>

                             <ul class="social-list">
                                <li><i class="fa fa-facebook"></i></li>
                                <li><i class="fa fa-dribbble"></i></li>
                                <li><i class="fa fa-instagram"></i></li>
                                <li><i class="fa fa-linkedin"></i></li>
                                <li><i class="fa fa-google"></i></li>
                            </ul>

                            <div class="buttons">

                                <a href="{{route('StoreProfile')}}"><button type="button" class="btn btn-outline-primary px-4">Edit Profile</button></a>
                                {{-- <button class="btn btn-primary px-4 ms-3">Contact</button> --}}
                            </div>


                        </div>




                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->name }} {{ $userProfile->last_name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->phone_number }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">City</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->city }}</p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Country</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->country }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->gender }}</p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Date Of Birth</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->date_of_birth }}</p>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $userProfile->address }} {{ $userProfile->country }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@else

<div class="col-lg-12">
  <div class="container mt-5">

      <div class="row d-flex justify-content-center">

          <div class="col-md-7">

              <div class="card p-3 py-4">

                  <div class="text-center">
                      <img src="./assets/images/gp.png" width="100" class="rounded-circle">

                  </div>

                  <div class="text-center mt-3">
                      <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                      <h5 class="mt-2 mb-0">{{auth()->user()->name}}</h5>
                      <span>{{auth()->user()->store->name}}</span>

                      <div class="px-4 mt-1">
                          <p class="fonts">{{auth()->user()->store->description}}</p>

                      </div>

                       <ul class="social-list">
                          <li><i class="fa fa-facebook"></i></li>
                          <li><i class="fa fa-dribbble"></i></li>
                          <li><i class="fa fa-instagram"></i></li>
                          <li><i class="fa fa-linkedin"></i></li>
                          <li><i class="fa fa-google"></i></li>
                      </ul>

                      <div class="buttons">
                        <a href="{{route('StoreProfile')}}"><button type="button" class="btn btn-outline-primary px-4">Create Profile</button></a>
                          {{-- <button class="btn btn-outline-primary px-4">Message</button> --}}
                          {{-- <button class="btn btn-primary px-4 ms-3">Contact</button> --}}
                      </div>


                  </div>




              </div>

          </div>

      </div>

  </div>
</div>
      @endif

{{-- <section >
    <div class="container py-5">
<div class="col-lg-12">
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                        <h5 class="mt-2 mb-0">Alexender Schidmt</h5>
                        <span>UI/UX Designer</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                        </div>

                         <ul class="social-list">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-dribbble"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                            <li><i class="fa fa-linkedin"></i></li>
                            <li><i class="fa fa-google"></i></li>
                        </ul>

                        <div class="buttons">

                            <button class="btn btn-outline-primary px-4">Message</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
</div>
    </div>
</section> --}}
            {{-- <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div> --}}
            {{-- @if ($userHasProfile) --}}
            {{-- <div class="row">
                <div class="col-lg-4">
                    <div class="container mt-5">

                        <div class="row d-flex justify-content-center">

                            <div class="col-md-7">

                                <div class="card p-3 py-4">

                                    <div class="text-center">
                                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                                    </div>

                                    <div class="text-center mt-3">
                                        <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                                        <h5 class="mt-2 mb-0">Alexender Schidmt</h5>
                                        <span>UI/UX Designer</span>

                                        <div class="px-4 mt-1">
                                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                        </div>

                                         <ul class="social-list">
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-dribbble"></i></li>
                                            <li><i class="fa fa-instagram"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                            <li><i class="fa fa-google"></i></li>
                                        </ul>

                                        <div class="buttons">

                                            <button class="btn btn-outline-primary px-4">Message</button>
                                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                                        </div>


                                    </div>




                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->name }} {{ $userProfile->last_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->phone_number }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->city }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->country }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->gender }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date Of Birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->date_of_birth }}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $userProfile->address }} {{ $userProfile->country }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


     </div>
    </section> --}}



@endsection
