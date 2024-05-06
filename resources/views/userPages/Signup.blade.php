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
                    <img width="100px" src="{{asset('./assets/images/logo2.png')}}" class="img-fluid " alt="">
                    <h5>Create Account</h5>
                    <div class="been-text">
                        <p>Been here before? <span class="log-in" href="./bootstrap.html">Log In</span></p>
                    </div>
                </div>


                <div class="text-center google-logo mt-4">
                    <img src="{{asset('./assets/images/logos_facebook.png')}} " class="img-fluid FbIcon">
                    <img src="{{asset('./assets/images/devicon_google.png')}}" class="img-fluid ms-2 FbIcon">
                </div>

                <div class="d-flex justify-content-center flex-wrap mt-4 mb-4">
                    <div class="customer position-relative mx-2 mb-3">
                        <h4>Customer</h4>
                        <div class="form-check radio-box">
                            <input class="form-check-input" type="radio" name="userType" id="customerRadio"
                                value="customer" checked />
                            <label class="form-check-label" for="customerRadio"></label>
                        </div>
                    </div>

                    <div class="customer position-relative mx-2">
                        <h4>Vendor</h4>
                        <div class="form-check radio-box">
                            <input class="form-check-input" type="radio" name="userType" id="vendorRadio"
                                value="vendor" />
                            <label class="form-check-label" for="vendorRadio"></label>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('registers') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label label-color">Email Address</label>
                        <input type="email" class="form-control abcClass" placeholder="abc@gmail.com"
                            id="exampleInputEmail1" aria-describedby="emailHelp">

                        <label for="exampleInputEmail1" class="form-label label-color mt-3">Name</label>
                        <input type="text" class="form-control abcClass" placeholder="Enter Name" id="exampleInputEmail1"
                            aria-describedby="emailHelp">

                        <label for="exampleInputEmail1" class="form-label label-color mt-3">Phone Num</label>
                        <input type="number" class="form-control abcClass" id="exampleInputEmail1"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3 position-relative password-container">
                        <label for="exampleInputPassword1" class="form-label label-color">Password</label>
                        <input type="password" class="form-control abcClass" placeholder="........." id="Password" />
                        <div class="eye-icon" id="password-toggle">
                            <i class="fa-regular fa-eye-slash" id="show-password"></i>
                            <!-- <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="Toggle Password" /> -->
                        </div>
                    </div>

                    <div class="mb-3 position-relative password-container">
                        <label for="exampleInputPassword1" class="form-label label-color">Confirm Password</label>
                        <input type="password" class="form-control abcClass" placeholder="........." id="PasswordTwo" />
                        <div class="eye-icon" id="password-toggleTwo">
                            <i class="fa-regular fa-eye-slash" id="show-passwordTwo"></i>
                            <!-- <img src="./assets/images/ion_eye-off.png" class="img-fluid" alt="Toggle Password" /> -->
                        </div>
                    </div>
                    <div id="vendorFields" style="display: none;">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Shop Name</label>
                            <input type="text" class="form-control form-1" id="inputEmail4"
                                placeholder="Silver Stallion">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4"  name="phone_no" class="form-label">Phone Number</label>
                            <input type="number" class="form-control form-1" id="inputEmail4"
                                placeholder="Silver Stallion">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4"  name="WA_no" class="form-label">whatsApp Number</label>
                            <input type="number" class="form-control form-1" id="inputEmail4"
                                placeholder="Silver Stallion">
                        </div>

                        <div class="col-md-6">
                            <label for="text" class="form-label">Code #</label>
                            <input type="password" class="form-control form-1" id="inputPassword4"
                                placeholder="#989786">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Joining Date
                            </label>
                            <input type="date" class="form-control form-1" id="inputjoining"
                                placeholder="25/07/2023">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control form-1" id="inputCity" placeholder="Islamabad">
                        </div>

                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control form-1" id="inputAddress" placeholder="$ 150">
                        </div>


                        <div class="input-group" style="flex-wrap: unset;">
                            <button class="input-group-icon me-3 border-0">
                                <!-- Camera icon at the start -->
                                <img src="{{asset('./assets/images/camera.png')}}" alt="">
                            </button>
                            <input type="text" class=" form-12" placeholder="Add Pictures" id="file" readonly>
                            <span class="input-group-icon">
                                <!-- Plus button/icon at the end -->
                                <button class="btn" type="button" id="uploadBtn">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <!-- File input -->
                                <input type="file" class="file-input" name="images[]" accept="image/*" id="file2">
                            </span>

                        </div>
                    </div>
                </form>
                    <div class="d-grid gap-2 col-6 mx-auto password mt-5">
                        <button class="btn login" type="button"><img src="{{asset('./assets/images/fa_key.png')}}" class="img-fluid"
                                alt="">
                            Create my Account</button>
                        <a href="./bootstrap.html" class="text-center">Lost Your Password!</a>
                    </div>

            </div>
        </div>
    </div>
    </div>


    <script>
        // Function to show/hide vendor fields based on the selected radio button

        function toggleVendorFields() {
            const vendorFields = document.getElementById('vendorFields');
            const vendorRadio = document.getElementById('vendorRadio');
            const customerRadio = document.getElementById('customerRadio'); // Add this line

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



        passwordToggle.addEventListener('click', function() {
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

        passwordToggleTwo.addEventListener('click', function() {
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        $('#file2').change(function () {
            const fileName = $(this).val().split('\\').pop();
            $('#file').val(fileName);
        });

        $('#uploadBtn').click(function () {
            $('#file2').click();
        });
    });
</script>
@endsection
