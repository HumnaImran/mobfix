{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




@extends('userPages.master')
@section('content')


<div class="container-fluid  py-md-5 bg-image">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5 bgOrange d-flex flex-column justify-content-center  text-center">
        <h3 class="text-white uper-margin">Hey You!</h3>
        <h4 class="text-white mt-3">Welcome to MobFix</h4>
        <h5 class="text-white mt-3">You Break, We Collect, We Phix</h5>
      </div>

      <div class=" col-md-5 py-md-5 px-md-5 bg-white">
        <div class="text-center mob-log">
          <img src="./assets/images/MobFix.jpg" class="img-fluid " alt="">
          <h5>Create Account</h5>
          <div class="been-text">
            <p>Been here before? <a class="log-in" href="{{ url('login') }}">Log In</a></p>
          </div>
        </div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center google-logo mt-4">
          {{-- <img src="./assets/images/logos_facebook.png " class="img-fluid FbIcon"> --}}
          <a href="{{route('google-auth')}}">
               <img src="./assets/images/devicon_google.png" class="img-fluid ms-2 FbIcon"></a>
        </div>

        <div class="d-flex justify-content-center flex-wrap mt-4 mb-4">
          <div class="customer  mx-2 mb-3" style="display: flex; justify-content:space-between; align-items:center">
            <h4 style="margin-bottom: 0rem !important; margin-top: 0.1rem;">Customer</h4>
            <div class=" radio-box">
              <input class="form-check-input" style="margin-top: 0rem !important" type="radio" name="userType" id="customerRadio" value="customer"

              @if(!session()->has('type'))
              checked
          @endif



                />
              <label class="form-check-label" for="customerRadio"></label>
            </div>
          </div>

          <div class="customer position-relative mx-2" style="padding:13px; display: flex; justify-content:space-between; align-items:center">
            <h4 style="margin-bottom: 0rem !important; margin-top: 0.1rem;">Vendor</h4>
            <div class="form-check radio-box">
              <input class="form-check-input" type="radio" name="userType" id="vendorRadio" value="vendor"
              @if(session()->has('type'))
              checked
          @endif


              />
              <label class="form-check-label" for="vendorRadio"></label>
            </div>
          </div>
        </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label label-color">Email Address</label>
            <input type="email" class="form-control abcClass" placeholder="abc@gmail.com" name="email" id="exampleInputEmail1"
              aria-describedby="emailHelp">

            <label for="exampleInputEmail1" class="form-label label-color mt-3">Name</label>
            <input type="text" class="form-control abcClass" placeholder="Enter Name" name="name" id="exampleInputEmail1"
              aria-describedby="emailHelp">

            {{-- <label for="exampleInputEmail1" class="form-label label-color mt-3">Phone Num</label>
            <input type="number" class="form-control abcClass" id="exampleInputEmail1" name="contact_" aria-describedby="emailHelp"> --}}

          </div>


          <div class="mb-3 position-relative password-container">
            <label for="exampleInputPassword1" class="form-label label-color">Password</label>
            <input type="password" class="form-control abcClass" name="password" placeholder="........." id="Password" />
            <div class="eye-icon" id="password-toggle">
                <i class="fa-regular fa-eye-slash" id="show-password"></i>
                <!-- <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="Toggle Password" /> -->
            </div>
        </div>

        {{-- <div class="mb-3 position-relative password-container">
          <label for="exampleInputPassword1" class="form-label label-color">Confirm Password</label>
          <input type="password" class="form-control abcClass" placeholder="........." id="PasswordTwo" />
          <div class="eye-icon" id="password-toggleTwo">
              <i class="fa-regular fa-eye-slash" id="show-passwordTwo"></i>
              <!-- <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="Toggle Password" /> -->
          </div>
      </div> --}}

      <div id="vendorFields" style="display: none;">
      <div class="mb-3 col-lg-12">
        <label for="inputEmail4"  class="form-label">Shop Name</label>
        <input type="text"   class="form-control form-1"  name="shop_name" id="inputEmail4"
            placeholder="Silver Stallion">
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputEmail4"   class="form-label">Phone Number</label>
        <input type="number" class="form-control form-1" name="phone_no" id="inputEmail4"
        placeholder="000-0000000" >
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputEmail4"   class="form-label">Description</label>
        <input type="text" name="description" class="form-control form-1" id="inputEmail4"
        placeholder="000-0000000" >
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputEmail4"  class="form-label">whatsApp Number</label>
        <input type="number"  name="WA_no" class="form-control form-1" id="inputEmail4"
            placeholder="0000-0000000">
    </div>



    <div class="mb-3 col-lg-12">
        <label for="inputAddress" class="form-label">Joining Date
        </label>
        <input type="date" name="joining_date" class="form-control form-1" id="inputjoining"
            placeholder="25/07/2023">
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" name="city" class="form-control form-1" id="inputCity"
            placeholder="Islamabad">
    </div>

    <div class="mb-3 col-lg-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" name="address" class="form-control form-1" id="inputAddress"
            placeholder="$ 150">
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputAddress" class="form-label">State</label>
        <input type="text" name="state" class="form-control form-1" id="inputAddress"
            placeholder="$ 150">
    </div>
    <div class="mb-3 col-lg-12">
        <label for="inputAddress" class="form-label">Zip</label>
        <input type="text" name="zip" class="form-control form-1" id="inputAddress"
            placeholder="$ 150">
    </div>
    <div class="mb-3">
        <label for="proof_identity" class="form-label">Proof of Identity</label>
        <input type="file" class="form-control" id="proof_identity" name="proof_identity" accept=".jpg,.jpeg,.png">
    </div>

    <div class="mb-3">
        <label for="business_license" class="form-label">Business License</label>
        <input type="file" class="form-control" id="business_license" name="business_license" accept=".pdf,.doc,.docx">
    </div>
    <div class="mb-3 col-lg-12">
        <label for="text" class="form-label">Tax Identification Number (TIN)</label>
        <input type="password" class="form-control form-1" id="inputPassword4"
            placeholder="#989786" name="code">
    </div>




    <div class="input-group" style="flex-wrap: unset;">
        <button class="input-group-icon me-3 border-0">
            <!-- Camera icon at the start -->
            <img src="./assets/images/camera.png" alt="">
        </button>
        <input type="text" class=" form-12" placeholder="Add Store Pictures" id="file"
            readonly>
        <span class="input-group-icon">
            <!-- Plus button/icon at the end -->
            {{-- <button class="btn" type="button" id="uploadBtn">
                <i class="fas fa-plus"></i>
            </button> --}}
            <!-- File input -->
            <input type="file" name="images[]" accept="image/*" multiple>
        </span>

    </div>
</div>




        <div class="d-grid gap-2 col-6 mx-auto password mt-5">
          <button class="btn login" type="submit"><img src="./assets/images/fa_key.png" class="img-fluid" alt="">
            Create my Account</button>
            <a href="{{route('google-auth')}}" class="btn btn-primary" style="color:white!important"> <img src="./assets/images/devicon_google.png" class="img-fluid ms-2"  style="width:30px"/>
              Sign up With Google</button>
          <a href="{{ url('login') }}" class="text-center">Already have an account </a>
        </div>
      </div>
    </div>
  </div>
  </div>

</form>


  <script>

     // Function to show/hide vendor fields based on the selected radio button

     function toggleVendorFields() {
    const vendorFields = document.getElementById('vendorFields');
    const vendorRadio = document.getElementById('vendorRadio');
    const customerRadio = document.getElementById('customerRadio');  // Add this line

    if (vendorRadio.checked) {
        vendorFields.style.display = 'block';
    } else if (customerRadio.checked) {
        vendorFields.style.display = 'none';
    }
}

// Attach the toggle function to the radio button change event
const vendorRadio = document.getElementById('vendorRadio');
vendorRadio.addEventListener('change', toggleVendorFields);

// Attach the toggle function to the radio button change event for the customer as well
const customerRadio = document.getElementById('customerRadio');
customerRadio.addEventListener('change', toggleVendorFields);

// Call the toggle function initially to set the initial state
toggleVendorFields();







    const passwordInput = document.getElementById('Password');
const passwordToggle = document.getElementById('password-toggle');



passwordToggle.addEventListener('click', function () {
if (passwordInput.type === 'password') {
passwordInput.type = 'text';
passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
} else {
passwordInput.type = 'password';
passwordToggle.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
}
});



</script>
  <script>

        const passwordInputTwo = document.getElementById('PasswordTwo');
const passwordToggleTwo = document.getElementById('password-toggleTwo');

passwordToggleTwo.addEventListener('click', function () {
if (passwordInputTwo.type === 'password') {
    passwordInputTwo.type = 'text';
    passwordToggleTwo.innerHTML = '<i class="fas fa-eye"></i>';
} else {
    passwordInputTwo.type = 'password';
    passwordToggleTwo.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
}
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $('#file2').change(function () {
            const fileName = $(this).val().split('\\').pop();
            $('#file').val(fileName);
        });

        $('#uploadBtn').click(function () {
            $('.file-input').click();
        });
    });
</script>

  @endsection

