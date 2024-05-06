@extends('profile.master')
@section('content')


<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
<link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

<link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

<style>

.profile-pic-div{
    height: 200px;
    width: 200px;
    position: relative;


    border-radius: 50%;
    overflow: hidden !important;


}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
</style>
<form method="POST" action="{{ route('updateUserProfile') }}" enctype="multipart/form-data" style="background-color: #e6e4e1;">
    @csrf

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col">
      <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color: #f1af7d">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">User</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
        </ol>
      </nav>
    </div>
  </div>
                <!-- Begin Page Content -->
                <div class="container-fluid mt-0 pt-2 py-5">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mt-5 pt-5">
                                <p class="fontEdit mt-5 pt-5">My Profile</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">

                                <div class="profile-pic-div">
                                    @php
                                    $profilepic=" ./assets/images/gp.png";
                                    if(isset(\Auth::user()?->Userprofile?->profile_image)){
                                    $profilepic=asset('storage/' . \Auth::user()?->Userprofile?->profile_image);


                                }
                                    @endphp
                                    <img src="{{$profilepic}}" id="photo">

                                    <input type="file" id="file" name="photo">
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                  </div>


                                {{-- <p class="proText">{{ auth()->user()->name }}</p> --}}
                            </div>
                            <div class="my-3">

                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <small class="my-3 text-muted">Personal</small>


                                        <div class="my-2 d-flex justify-content-between">
                                            <div class="mx-1">
                                                <label class="prLabel" for="form-label">First Name</label>
                                                <input class="form-control prInp" type="text"  value ="{{ auth()->user()->name }}" readonly />
                                            </div>

                                            <div class="mx-1">
                                                <label class="prLabel" for="form-label">Last Name</label>
                                                <input class="form-control prInp" type="text" value="{{ auth()->user()->last_name }}" name="last_name" />
                                            </div>
                                            {{-- <div class="mx-1">
                                                <label class="prLabel" for="form-label">Surname</label>
                                                <input class="form-control prInp" type="text" />
                                            </div> --}}
                                        </div>
                                        {{-- <div class="my-2">
                                            <label class="prLabel" for="form-label">Vat#</label>
                                            <input class="form-control prInp" type="text"
                                                placeholder="Enter Value" name="vat_number"/>
                                        </div> --}}
                                        <div class="my-2">
                                            <label class="prLabel" for="form-label">Date of birth</label>
                                            <input name="date_of_birth" class="form-control prInp" type="date" placeholder="Enter Value" />
                                        </div>
                                        <div class="my-2">
                                            <label class="prLabel" for="form-label">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="my-2">
                                            <label class="prLabel" for="form-label">Address</label>
                                            <textarea class="form-control prInp" name="address" rows="3"></textarea>
                                        </div>


                                        {{-- <div class="my-2">
                                            <label class="prLabel" for="form-label">Role</label>
                                            <select class="form-control" id="exampleSelect">
                                                <option value="">Admin</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <small class="my-3 text-muted">Contact</small>
                                        <div class="my-2">
                                            <div class="">
                                                <label class="prLabel" for="form-label">Email</label>
                                                <input class="form-control prInp" value ="{{ auth()->user()->email }}" type="text"
                                                    placeholder="admin@gmail.com" readonly />
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <label class="prLabel" for="exampleInput">Phone Number</label>
                                            <div class="row">
                                                {{-- <div class="col-md-4">
                                                    <select name="phone_code" class="form-control" id="exampleSelect">
                                                        <option value="">+92</option>
                                                        <option value="{{ $code }}">{{ $name }}</option>
                                                        @foreach ($countries as $code => $name)
                                                            <option value="{{ $code }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <input class="form-control prInp" name="phone_number" type="text"
                                                        placeholder="912000000" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <label class="prLabel"  for="form-label">Country</label>
                                            <input class="form-control prInp" type="text"
                                                placeholder="Enter Value" name="country" />
                                        </div>
                                        <div class="my-2">
                                            <label class="prLabel" name="city'" for="form-label">City</label>
                                            <input class="form-control prInp" type="text"name="city"
                                                placeholder="Enter Value" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="addButn btn px-5">Save</button>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>




</form>

<script>
//declearing html elements

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

//if user hover on img div

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});

//lets work for image showing functionality when we choose an image to upload

//when we choose a foto to upload

file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

        //Allright is done

        //please like the video
        //comment if have any issue related to vide & also rate my work in comment section

        //And aslo please subscribe for more tutorial like this

        //thanks for watching
    }
});
</script>



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
