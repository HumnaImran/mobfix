@extends('userPages.master')
@section('content')
    <link rel="{{ asset('stylesheet" href="assets/css/home.css') }}" />
    <link rel="{{ asset('stylesheet" href="assets/css/style.css') }}" />


    <!-- banner sectionm -->
    <div class="container-fluid bgMainContainer p-3 p-md-5">
        <h1 class="he1 mt-5">
            When Phones Break,<span> We Make Them Wake.</span>
        </h1>
        <p class="para1d">
            Are you looking for phone or any other device repair? We carry out large
            number of mobile <br />
            repairs every month and help you fix your device as well.
        </p>
        <div class="my-5 inputGroup">
            <div class="input-group">
                <input type="text" class="form-control sInp" aria-label="Dollar amount (with dot and two decimal places)"
                    placeholder="Search City or Zip" />
                <span class="input-group-text searchIcn"><img src="{{asset('./assets/images/icons/search.png')}}" width="60px"
                        alt="search icon" /></span>
                <span class="input-group-text btnFilter">
                    <button class="btn mx-2" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        <img src="{{asset('./assets/images/icons/Slider.png')}}" width="20px" alt="" />
                    </button>
                </span>
            </div>

            <div class="collapse filterCollapse p-3" id="collapseExample">
                <div class="row">
                    <div class="col-md-4 my-2">

                        <select id="brandSelect" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Select Brand</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-4 my-2">
                        <select id="phoneSelect" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Select a phone</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-4 my-2">
                        <select class="form-select" id="repairTypeSelect" aria-label="Floating label select example">
                            <option selected>Repair Type</option>
                            @foreach ($repairTypes as $repairType)
                                <option value="{{ $repairType->id }}">{{ $repairType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <a href="{{ route('findStore') }}">
                            <button class="btn btnFilter w-100" id="goForItButton">
                                go for it <i class="fa fa-arrow-righ mx-2t"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>


    <div class=" container ProfessionalRepairteam mt-5">
        <h4>OUR TEAM</h4>
        <h2 style="color:#F97813; font-size:40px; font-weight:700; ">PROFESSIONAL REPAIR TEAM</h2>
        <p>Since our establishment, we have gathered a team of dedicated Mobile and Apple repair professionals.</p>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card2" style="display: flex; flex-direction:column; align-items:center">
                    <img src="{{asset('./assets/images/Frame 35199.png')}}" class="img-fluid" alt="" style="width:80%;" />
                    <p style="font-size: 1rem; font-weight:700; color:#000000">Dominic Zboncak</p>
                    <p style="font-size: 0.7rem; font-weight:600">General Manager</p>


                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card2" style="display: flex; flex-direction:column; align-items:center">
                    <img src="{{asset('./assets/images/Frame 35199.png')}}" class="img-fluid" alt="" style="width:80%;" />
                    <p style="font-size: 1rem; font-weight:700; color:#000000">Dominic Zboncak</p>
                    <p style="font-size: 0.7rem; font-weight:600">General Manager</p>


                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card2" style="display: flex; flex-direction:column; align-items:center">
                    <img src="{{asset('./assets/images/Frame 35199.png')}}" class="img-fluid" alt="" style="width:80%;" />
                    <p style="font-size: 1rem; font-weight:700; color:#000000">Dominic Zboncak</p>
                    <p style="font-size: 0.7rem; font-weight:600">General Manager</p>


                </div>
            </div>


        </div>
    </div>
<div  style="margin-top:4rem; margin-bottom:4rem; padding-bottom:4rem; padding-top:4rem; background-image: url('./assets/images/WHYChoose.png'); background-size: cover;">
    <div class=" container WHYChoose " >

        <h3 style="text-align: center; margin-bottom: 2rem ; color:#F97813 ; font-weight:700; font-size: 35px" >WHY CHOOSE US</h3>
        <div class="row">
            <div class="col-lg-2 col-md-0  col-0"></div>
            <div class="col-lg-8 col-md-12 col-12 d-flex" style="justify-content: space-between">
                <div class="col-lg-3 col-md-3 col-4" style="border:1px solid white; padding:2rem; border-radius:20px; ">
                    <img src="{{asset('./assets/images/Vector.png')}}">
                    <h6 style="color:white; font-weight:400;">98% of Satisfied Clients</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-4" style="border:1px solid white; padding:2rem; border-radius:20px; ">
                    <img src="{{asset('./assets/images/Vector (2).png')}}">
                    <h6 style="color:white; font-weight:400;">Quick Repair Process</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-4" style="border:1px solid white; padding:2rem; border-radius:20px; ">
                    <img src="{{asset('./assets/images/Vector (3).png')}}">
                    <h6 style="color:white; font-weight:400;">100% Guarantee</h6>
                </div>


            </div>
            <div class="col-lg-2 col-md-0 col-0"></div>


        </div>
    </div>


</div>


<div class="PhoneRepair mb-5">
    <div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-12" style="display: flex; flex-direction:column;align-item:center; justify-content:center;">
<h4 style="color:#F97813; font-weight:700 ">Book a Phone Repair</h4>
<h5 style="font-weight:400">Book a cell phone repair online to save waiting time</h5>

<br>
<a href={{route('findStore')}}><button class="btn btn-primary">Book now</button></a>
</div>

<div class="col-lg-6 col-md-6 col-12">
<img src="{{asset('./assets/images/Bookrepair.png')}}" style=" border-radius:20px;">
</div>
</div>

</div>
</div>

<div  style="margin-top:4rem; margin-bottom:4rem; padding-bottom:4rem; padding-top:4rem; background-image: url('./assets/images/clients.png'); background-size: cover;">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-3 col-md-3 col-6">
                <div class="card2" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
                <h2><strong>1090</strong></h2>
                <p>Repairs</p>
                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="card2" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
                    <h2><strong>37</strong></h2>
                    <p>Partners</p>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="card2" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
                    <h2><strong>65</strong></h2>
                    <p>Monthly clients</p>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="card2" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
                    <h2><strong>590</strong></h2>
                    <p>Total clients</p>
                    </div>
            </div>
        </div>
    </div>

</div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // $(document).ready(function () {

        //     $('#brandSelect').change(function () {
        //         var categoryId = $(this).val();

        //         $.ajax({
        //             url: '/getModelsByCategory/' + categoryId,
        //             type: 'GET',
        //             success: function (data) {

        //                 $('#phoneSelect').empty();

        //                 $.each(data, function (key, value) {
        //                     $('#phoneSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
        //                 });
        //             },






        //             error: function (xhr) {
        //                 console.log(xhr.responseText);
        //             }
        //         });
        //     });
        // });



        $(document).ready(function() {
            $('#goForItButton').click(function() {

                    @auth

                    window.location.href = "{{ route('findStore') }}";
                @else

                    window.location.href = "{{ route('login') }}";
                @endauth
            });
        });



        $(document).ready(function() {
            $('#brandSelect').change(function() {
                var categoryId = $(this).val();

                $.ajax({
                    url: '/getModelsByCategory/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        $('#phoneSelect').empty();

                        $.each(data, function(key, value) {
                            $('#phoneSelect').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });

                        // Store selected brand in session
                        var selectedBrand = $('#brandSelect option:selected').text();
                        var selectedModel = $('#phoneSelect option:selected').text();
                        var selectedRepairType = $('#repairTypeSelect option:selected').text();

                        $.ajax({
                            url: '/storeSelectionsInSession',
                            type: 'POST',
                            data: {
                                brand: selectedBrand,
                                model: selectedModel,
                                repairType: selectedRepairType,
                                _token: '{{ csrf_token() }}',
                            },
                            success: function() {
                                console.log('Selections stored in session.');
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
