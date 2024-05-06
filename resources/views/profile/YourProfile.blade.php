@extends('profile.master')
@section('content')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
<link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

<link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color: #f1af7d">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
      @if ($userHasProfile)
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4" style="background-color: #e6e4e1; border-color:#f1af7d">
            <div class="card-body text-center" style="display: flex; flex-direction:column; justify-content:center; align-items:center; ">
                @php
                $profilepic=" https://i.imgur.com/bDLhJiP.jpg";
                if(isset(\Auth::user()?->userProfile?->profile_image)){
                $profilepic=asset('storage/' . \Auth::user()?->userProfile?->profile_image);


            }
                @endphp
                {{-- <img src="{{$profilepic}}" id="photo"> --}}


                    <img src="{{$profilepic}}" style=" width: 150px;" alt="Profile Photo" class="rounded-circle img-fluid" >

                {{-- src="{{ asset('Category_images/' . $categorie->image) }}" --}}


{{-- @else
<img src="./assets/images/gp.png" alt="avatar"
class="rounded-circle img-fluid" style="margin:auto; width: 150px;">
    @endif --}}

              <h5 class="my-3">{{auth()->user()->name}} {{$userProfile->last_name}}</h5>
              {{-- <p class="text-muted mb-1">Full Stack Developer</p> --}}
              <p class="text-muted mb-4">{{$userProfile->address}}</p>
              <div class="d-flex justify-content-center mb-2">
                <a href="{{route('ViewProfile')}}"><button type="button" class="btn btn-primary">Edit Profile</button></a>
               <a href="/chatify/{{ auth()->user()->id }}"> <button type="button" class="btn btn-outline-primary ms-1">Message</button></a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4" style="background-color: #e6e4e1; border-color:#f1af7d">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{auth()->user()->name}} {{$userProfile->last_name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->phone_number}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">City</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->city}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">City</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->country}}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Gender</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->gender}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Date Of Birth</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->date_of_birth}}</p>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$userProfile->address}} {{$userProfile->country}}</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      @else

      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="./assets/images/gp.png" alt="avatar"
              class="rounded-circle img-fluid" style="margin:auto; width: 150px;">
            <h5 class="my-3">{{auth()->user()->name}}</h5>

            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{route('ViewProfile')}}"><button type="button" class="btn btn-primary">Create Profile</button></a>
             <a href="/chatify/{{ auth()->user()->id }}"> <button type="button" class="btn btn-outline-primary ms-1">Message</button></a>
            </div>
          </div>
        </div>

      </div>
      @endif

    </div>
  </section>



  <script src="https://techrepublica.com/playground/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="https://techrepublica.com/playground/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://techrepublica.com/playground/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="https://techrepublica.com/playground/dashboard/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="https://techrepublica.com/playground/dashboard/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="https://techrepublica.com/playground/dashboard/js/demo/chart-area-demo.js"></script>
  <script src="https://techrepublica.com/playground/dashboard/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="https://techrepublica.com/playground/dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="https://techrepublica.com/playground/dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="https://techrepublica.com/playground/dashboard/js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
  <!-- datatable script -->
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

@endsection
