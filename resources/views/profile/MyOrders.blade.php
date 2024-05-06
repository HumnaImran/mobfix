@extends('profile.master')
@section('content')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

    <link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />


    <!-- Begin Page Content -->
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color: #f1af7d">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Your Orders</li>
                </ol>
              </nav>
            </div>
          </div>
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th> Price</th>
                                <th>Order Status </th>

                                <th> Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allOrders as $allOrder)
                                <tr>

                                    {{-- @dd($allOrders) --}}
                                    <td>{{ $allOrder->id }} </td>
                                    <td>{{ $allOrder->user->name }}  </td>
                                    <td>{{ $allOrder->product->name }}  </td>
                                    <td>{{ $allOrder->quantity }}</td>
                                    <td>{{ $allOrder->price}}</td>
                                    <td>{{ $allOrder->status}}</td>
                                    @if($allOrder->status == "order_placed")
                                    <td><a href="{{ route('cancelOrder', ['order' => $allOrder]) }}"><button class="btn btn-primary">cancel</button></a></td>
                                    {{-- @php
                                     $shipmentData = $allOrder->shipment_data ? json_decode($allOrder->shipment_data, true) : null;


                                     if ($shipmentData && isset($shipmentData['traking_code'])) {
        $encodedTrackingCode = base64_encode($shipmentData['traking_code']);

    } else {

        $encodedTrackingCode = null;
    }
                                    // $shipmentData = json_decode($allOrder->shipment_data, true);
                                    // $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                                @endphp --}}


{{-- @php


$shipmentData = json_decode($order->shipment_data, true);

// Check if $shipmentData is not null before accessing its elements
if ($shipmentData !== null) {
    $encodedTrackingCode = base64_encode($shipmentData['traking_code']);

} else {
    // Handle the case where $shipmentData is null
    $encodedTrackingCode = null; // or any other appropriate default value
}
@endphp --}}
                                  {{-- @dd($shipmentData['traking_link']) --}}
                                  {{-- @dd($allOrder); --}}
                                  @php
                                  $shipmentData = $allOrder->shipment_data ? json_decode($allOrder->shipment_data, true) : null;


                                  if ($shipmentData && isset($shipmentData['traking_code'])) {
     $encodedTrackingCode = base64_encode($shipmentData['traking_code']);

  } else {

     $encodedTrackingCode = null;
  }
                                 // $shipmentData = json_decode($allOrder->shipment_data, true);
                                 // $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                             @endphp
                                @elseif($allOrder->status == "DeliveredFromAdmin")
                                @php
                                $shipmentData = $allOrder->shipment_data ? json_decode($allOrder->shipment_data, true) : null;


                                if ($shipmentData && isset($shipmentData['traking_code'])) {
   $encodedTrackingCode = base64_encode($shipmentData['traking_code']);

} else {

   $encodedTrackingCode = null;
}
                               // $shipmentData = json_decode($allOrder->shipment_data, true);
                               // $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                           @endphp
                                @isset($shipmentData['traking_link'])
                                {{-- @dd($shipmentData) --}}
                               <td style="display: flex; flex-direction:column; justify-content:center; align-item:center ">
                             <a href="{{$shipmentData['traking_link']}}"
                                    class="btn btn-primary me-2">
                                    Track
                                </a>
                                <br>


                            <form action="{{ route('orders.complete', $allOrder->id) }} " style="margin-top:1rem" method="POST">
                                        @csrf
                                        @method('PUT')
                                       <button
                                    class="btn btn-primary me-2">
                                    Received </button>

                            </form>

                        </td>
                                @endisset
                                @elseif($allOrder->status == "completed")
                                <td>
                                  <a href="{{route('ProductReview',   ['orderId' => $allOrder->id])}}"><button class="btn btn-success">Write a review</button></a>

                                    @else
                                    <td><a href=""><button class="btn btn-primary" disabled>cancel</button></a>

                                </td>
                                @endif



                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- resources/views/delivery_service_selection.blade.php -->



                    <script>
                        function showDeliveryServiceForm() {
                            // Show the delivery service selection form
                            document.getElementById('deliveryServiceForm').style.display = 'block';
                        }
                    </script>
                    <script>
                        // Optional: You can add JavaScript code to handle form submission, validation, etc.
                    </script>

                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </div>










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
