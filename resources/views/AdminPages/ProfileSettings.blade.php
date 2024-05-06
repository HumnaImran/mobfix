@extends('AdminPages.AdminMaster')
@section('content')

 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    /* body {
        background: #f86f03;
    } */

    .form-control:focus {
        box-shadow: none;
        border-color: #f86f03;
    }

    .profile-button {
        background: #f86f03;;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #f86f03;
    }

    .profile-button:focus {
        background: #f86f03;;
        box-shadow: none
    }

    .profile-button:active {
        background: #f86f03;;
        box-shadow: none
    }

    .back:hover {
        color: #f86f03;;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #f86f03;;
        color: #fff;
        cursor: pointer;
        border: solid 1px #f86f03;
    }



    /* //profile img */



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
<form method="POST" action="{{ route('updateUserProfile') }}" enctype="multipart/form-data">
    @csrf

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="profile-pic-div">
                        @php
                        $profilepic=" https://i.imgur.com/bDLhJiP.jpg";
                        if(isset(\Auth::user()?->Userprofile?->profile_image)){
                        $profilepic=asset('storage/' . \Auth::user()?->Userprofile?->profile_image);


                    }
                        @endphp
                        <img src="{{$profilepic}}" id="photo">

                        <input type="file" id="file" name="photo">
                        <label for="file" id="uploadBtn">Choose Photo</label>
                      </div>
                        <span
                        class="font-weight-bold">{{auth()->user()->name}}</span><span class="text-black-50">{{auth()->user()->email}}</span><span>
                    </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="prLabel" for="form-label">Name</label><input type="text" class="form-control"
                                placeholder="first name" value="{{auth()->user()->name}}"></div>
                        <div class="col-md-6"><label class="prLabel" for="form-label">Surname</label><input type="text"
                                class="form-control" value=""  name="last_name" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="prLabel" for="form-label">Mobile Number</label><input type="text" name="phone_number"
                                class="form-control" placeholder="enter phone number" value=""></div>

                        <div class="col-md-12"><label class="prLabel" for="form-label">Address</label><input type="text"
                                class="form-control" placeholder="enter address "  name="address" value=""></div>



                        <div class="col-md-12"><label class="prLabel" for="form-label">Email ID</label><input type="text"
                                class="form-control" placeholder="enter email id" value="{{auth()->user()->email}}"></div>
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

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="prLabel"  for="form-label">City</label>
                            <input type="text" name="city"
                            class="form-control" placeholder="country" value=""></div>
                        <div class="col-md-6"><label class="prLabel" for="form-label">Country</label><input type="text"
                                class="form-control" placeholder="country"  name="country" value=""></div>

                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                            class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                            class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div> --}}
        </div>
    </div>
    </div>
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


@endsection

