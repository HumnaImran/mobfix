
@extends('userPages.master')
@section('content')

<style>
  .wishlist {
            color: #fff;
            display: none;
            margin-bottom: 3px;
            height: 36px;
            width: 38px;
            line-height: 30px;
            text-align: center;
            padding: 0;
            border: none;
            -webkit-transition: .3s;
            transition: .3s
        }


        .wishlist a {
            display: block;
            color: #fff;
            font-size: 14px
        }

        .wishlist {
            /* position: absolute;
            top: 15px;
            left: 15px; */
            background: #F86F03;
        }

        .wishlist:hover {
            background: #F86F03;
        }

        p .compare {
            position: absolute;
            top: 3pc;
            left: 15px;
            background: #f80b03
        }


        .wishlist {
            display: block
        }


tr{
    text-align: left !important;
}
th{
    text-align: left !important;
}
    .col-2setting
     {
      width: 19%;
    }

    .col-10setting {
      width:81%;
    }

    .scroll {
      border: 2px solid #ccc;
      margin: 0.5rem;

      cursor: pointer;
    }

    .scroll.active {
      border: 2px solid #343434;
    }

    .scroll img {
      width: 100%;
      height: 20%;

    }

    .carouselsliding {
      position: relative;
      margin: 0 auto;
      overflow: hidden;
    }

    .slides-container {
      display: flex;

      width: 100%;
      height: 510px;

    }



    #nextBtn,
    #prevBtn {
      position: absolute;
      top: 50%;
      padding: 0.5rem;
      background-color: transparent;
      border: none;
      outline: none;
      font-size: 1.5rem;
      cursor: pointer;
      z-index: 1;
    }

    #nextBtn {
      right: 0;
    }


    .ruppe{
        font-size: 22px;
        font-weight: 600;
    }
    .ruppe span{
        font-size: 22px;
        font-weight: 600;
        color: #F86F03;
    }

    .tablecolorset tr th{
        background-color: #f1f1f1 !important;
    }
    .tablecolorset tr td{
        background-color: #f1f1f1 !important;
    }
    .tablecolorset tr th:nth-child(1){
      color: #525FE1;

    font-family: Segoe UI;
    font-size: 17px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    }
    .tablecolorset tr th:nth-child(2){
      color: rgba(0, 0, 0, 0.70);

    font-family: Segoe UI;
    font-size: 17px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    }
    .incredecre{
      border-radius: 6px;
    border: 1px solid #525FE1;
    width: 90px;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    }
    .incredecre button{
      border: none;
      background-color: none ;
      cursor: pointer !important;
    }

    @media(max-width:992px)
    {
      .scroll img{
        height: 100% !important;
        width: 100px;
      }
      .col-10setting{
    width: 100%;
      }
    }
    @media(max-width:554px)
    {
      .scroll img{
        height: 100% !important;
        width: 60px;
      }
    }


            </style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif



  <div class="px-md-5">
    <div class="rowmain d-md-flex my-4 ">
      <div class="col-2setting ">
        <div class="scrollsslider d-flex d-md-block">

          @foreach($products->images as $image)
          <div class="scroll" style="display: flex; justify-content:center; align-item:center">
              <img style="width:9rem" src="{{ asset('storage/' . $image->image) }}" alt="Product Image"
                    onclick="document.getElementById('imageprevie').src=this.src"
              >
          </div>
      @endforeach
        </div>
      </div>
      <div class="col-10setting " >
        <div class="carouselsliding" style="display: flex; justify-content:center align-items:center">
          <button id="prevBtn"><i class="fas fa-angle-left"></i></button>
          <button id="nextBtn"><i class="fas fa-angle-right"></i></button>
          <div class="slides-container" style="display: flex; Justify-content:center; align-items:center; ">
            <div class="slidemaster" style="display: flex; justify-content:center" >

                {{-- <img src="{{ asset('./assets/images/iphonepic')}}"  alt="..." id="imageprevie"
                style="width:100%;min-width:75vw"
                > --}}
                <img src="{{ asset('storage/' . $products->images->first()->image) }}" id="imageprevie"  alt="Product Image" class="img-fluid"  style="width:80%; max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>

          </div>
        </div>
      </div>
    </div>
   </div>


<div class="container pb-5">
    <div class="d-md-flex">
        <h1>{{$products->name}}</h1>
<h4 class="mt-4"> (Awesome Graphite {{$products->ProductSpecs->where('spec_id', 11)->first()?->value}} + {{$products->ProductSpecs->where('spec_id', 10)->first()?->value}})</h4>
    </div>

    <p class="ruppe">PKR. <span>{{$products->price}}</span></p>

   <div class="row">
    <div class="col-md-8 d-flex">
      {{-- <div class="incredecre my-3">
        <button onclick="decrease()">-</button> --}}
        {{-- <span id="counter">0</span> --}}
        {{-- <input type="text" id="counter" name="quantity" value="0" readonly style="width: 1rem; border: none; outline: none;">
        <button onclick="increase()">+</button>
      </div> --}}
      <div class=" my-3 mx-2" style="display: flex; ">
        <form method="POST" action="{{ route('addToCart', ['product' => $products->id]) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg px-5">Add to Cart</button>
        </form>
        <form action="{{ route('AddTofavourtes', ['product' => $products->id]) }}"
            method="post">
            @csrf
            {{-- <button type="submit" class="btn priceBtn btn-default wishlist" data-toggle="tooltip"
                data-placement="right" title="Favorite" >
                <i class="fa fa-heart"></i>
            </button> --}}
            <button type="submit"  class="btn btn-lg px-5  add-to-cart-button" style="color:white; margin-left:1rem;background-color:#F86F03">Add To Favorite</button>
        </form>
      </div>
    </div>
    <div class="col-md-4"></div>
   </div>


    <div class="mt-5 table-responsive" >
        <h3 class="pb-2">{{$products->name}} Specifications</h3>

        


        <table class="table table-sm  tablecolorset" style="background-color: background-color: #f1f1f1 !important;">
            <thead>
              <tr>

                <th scope="col" class="px-3">Expected Released</th>
                <th scope="col" class="px-3">October, 2020</th>

              </tr>
            </thead>
          </table>
    </div>

    <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
        {{-- @foreach ($products->ProductSpecs as $productSpec)
        <h3 class="pb-2">{{ $productSpec->pspecs->type }}</h3>



      <table class="table table-sm  tablecolorset">
          <thead>

            <tr>

              <th scope="col" class="px-3">{{ $productSpec->pspecs->name }}</th>
              <th scope="col" class="px-3">{{ $productSpec->value }}</th>

            </tr>



          </thead>
        </table>
        @endforeach --}}

        @foreach ($products->ProductSpecs as $index => $productSpec)
    @if ($index == 0 || $productSpec->pspecs->type != $products->ProductSpecs[$index - 1]->pspecs->type)
        <h3 class="pb-2">{{ $productSpec->pspecs->type }}</h3>
        <table class="table table-sm tablecolorset">
            {{-- <thead>
                <tr>
                    <th scope="col" class="px-3">Name</th>
                    <th scope="col" class="px-3">Value</th>
                </tr>
            </thead> --}}
            <tbody>
    @endif
    <tr>
        <td class="px-3">{{ $productSpec->pspecs->name }}</td>
        <td class="px-3">{{ $productSpec->value }}</td>
    </tr>
    @if ($index == count($products->ProductSpecs) - 1 || $productSpec->pspecs->type != $products->ProductSpecs[$index + 1]->pspecs->type)
            </tbody>
        </table>
    @endif
@endforeach

  </div>
    {{-- <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
      <h3 class="pb-2">Platform</h3>



      <table class="table table-sm  tablecolorset">
          <thead>
            <tr>

              <th scope="col" class="px-3">OS</th>
              <th scope="col" class="px-3">iOS 14</th>

            </tr>

            <tr>

              <th scope="col" class="px-3">Chipset</th>
              <th scope="col" class="px-3">Apple A14 Bionic (5nm)</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">CPU</th>
              <th scope="col" class="px-3">Hexa-core</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">GPU</th>
              <th scope="col" class="px-3">Apple GPU (4-core graphics)</th>

            </tr>

          </thead>
        </table>
  </div>
    <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
      <h3 class="pb-2">Memory</h3>



      <table class="table table-sm  tablecolorset">
          <thead>
            <tr>

              <th scope="col" class="px-3">RAM</th>
              <th scope="col" class="px-3">6 GB</th>

            </tr>

            <tr>

              <th scope="col" class="px-3">Storage</th>
              <th scope="col" class="px-3">128/256/512 GB, NVMe</th>

            </tr>


          </thead>
        </table>
  </div>
    <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
      <h3 class="pb-2">Camera</h3>



      <table class="table table-sm  tablecolorset">
          <thead>
            <tr>

              <th scope="col" class="px-3">Primary Camera</th>
              <th scope="col" class="px-3">Quad: 12 MP + 12 MP + 12 MP</th>

            </tr>

            <tr>

              <th scope="col" class="px-3">Features</th>
              <th scope="col" class="px-3">f/1.8, 26mm (wide), 1/1.76\\\", 1.8Âµm, dual pixel PDAF, OIS, f/1.8, 78mm (telephoto), 1/3.4\\\", 1.0Âµm, PDAF, OIS, 3x optical zoom, f/2.2, 13mm (ultrawide), Quad-LED dual-tone flash, HDR (photo/panorama)</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Video</th>
              <th scope="col" class="px-3">4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Secondary Camera</th>
              <th scope="col" class="px-3">Dual: 12 MP + SL 3D</th>

            </tr>


          </thead>
        </table>
  </div>
    <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
      <h3 class="pb-2">Entertainment</h3>



      <table class="table table-sm  tablecolorset">
          <thead>
            <tr>

              <th scope="col" class="px-3">Entertainment</th>
              <th scope="col" class="px-3">Audio formats supported: MP3/WAV/AAX+/AIFF/Apple Lossless player, Protected AAC, Linear PCM, FLAC, Dolby Digital Plus, Video formats supported: HEVC, H.264, MPEG, and Motion JPEG, High Dynamic Range with Dolby Vision and HDR10 content, Stereo speakers, Lightning to 3.5 mm headphone jack adapter</th>

            </tr>




          </thead>
        </table>
  </div>
    <div class="mt-5 table-responsive" style="background-color: background-color: #f1f1f1 !important;">
      <h3 class="pb-2">Other Features</h3>



      <table class="table table-sm  tablecolorset">
          <thead>
            <tr>

              <th scope="col" class="px-3">Hidden Features</th>
              <th scope="col" class="px-3">IP68 dust/water resistant (up to 6m for 30 mins), Apple Pay (Visa, MasterCard, AMEX certified), VoiceOver, Zoom, Magnifier, RTT and TTY support, Siri and Dictation, Type to Siri, Switch Control, Closed Captions, AssistiveTouch, Speak Screen, Assisted GPS, GLONASS, Galileo, and QZSS, iBeacon microlocation, Siri Use your voice to send messages, set reminders, and more, Fast charging 18W, 50% in 30 min, Qi wireless charging, iCloud cloud service, Audio/video/photo editor, USB Power Delivery 2.0</th>

            </tr>

            <tr>

              <th scope="col" class="px-3">Primary Camera</th>
              <th scope="col" class="px-3">Quad: 12 MP + 12 MP + 12 MP</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Connectivity</th>
              <th scope="col" class="px-3">Bluetooth 5.0 wireless technology, NFC with reader mode, Wiâ€‘Fi 6 (802.11ax) with 2x2 MIMO, hotspot, Lightning, USB 2.0, Built-in GPS, GLONASS, Galileo, QZSS, and BeiDou, GPRS, EDGE, 3G, 4G, 5G</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Operating Frequency</th>
              <th scope="col" class="px-3">HTML5</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Colors</th>
              <th scope="col" class="px-3">Silver, Graphite, Gold, Pacific Blue</th>

            </tr>

            <tr>

              <th scope="col" class="px-3">Sensors</th>
              <th scope="col" class="px-3">Face ID, accelerometer, gyro, proximity, compass, barometer</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Ring Tones</th>
              <th scope="col" class="px-3">Vibration, MP3 ringtones</th>

            </tr>
            <tr>

              <th scope="col" class="px-3">Messaging</th>
              <th scope="col" class="px-3">SMS, MMS, Email, Push Mail</th>

            </tr>




          </thead>
        </table>
  </div> --}}
  </div>


  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
  crossorigin="anonymous"></script> --}}

  <script src="./assets/js/script.js"></script>

  <script>
    let counter = 0;

function increase() {
counter++;
document.getElementById('counter').value = counter;
}

function decrease() {
if (counter > 0) {
  counter--;
  document.getElementById('counter').value = counter;
}
}

  </script>

  @endsection


