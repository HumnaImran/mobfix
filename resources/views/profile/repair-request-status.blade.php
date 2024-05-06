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
     @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

     <div>
        <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color: #f1af7d">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Your Repair Requests</li>
                </ol>
              </nav>
            </div>
          </div>
         <div class="card">
             <div class="card-body">

                 <div class="table-responsive">
                     <table class="table table-bordered"  width="100%" cellspacing="0" id="dataTable">


                         <thead>
                             <tr>
                                 <th>Request ID</th>
                                 <th>Booker Name</th>
                                 <th> Repair Type Name</th>
                                 <th> Store Name</th>
                                 <th> Store Location</th>
                                 <th> Store phone_no</th>
                                 <th> Request Status</th>
                                 <th> Offered Price</th>
                                 <th> Action</th>

                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($repairDetails as $repairDetail)
                                 <tr>
                                     <td> {{ $repairDetail->id }} </td>
                                     <td> {{ $repairDetail->first_name }}  {{ $repairDetail->last_name }}  </td>
                                     <td>{{ $repairDetail->repairType->name }}</td>
                                     <td> {{ $repairDetail->store->name }}</td>
                                     <td> {{ $repairDetail->store->location }}</td>
                                     <td> {{ $repairDetail->store->phone_no }}</td>
                                     <td> {{ $repairDetail->status }}</td>
                                     <td style="color: Red; font-weight:700">{{ $repairDetail->price }}</td>
                                     <td>
                                         <div class="d-flex">
                                             @if ($repairDetail->status === 'customer accepted' && $repairDetail->shipmentdata !== null)
                                                 @php
                                                     $shipmentData = json_decode($repairDetail->shipmentdata, true);
                                                     $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                                                 @endphp

                                                 {{-- {{ dd($shipmentData['traking_code']) }} --}}
                                                 {{-- @if (isset($shipmentData['tracking_code'])) --}}
                                                 {{-- <a href="https://track.easypost.com/{{ $shipmentData['traking_code'] }}" class="btn btn-primary me-2">
                                                    Track
                                                </a> --}}
                                                @isset($shipmentData['traking_link'])
                                                 <a href="{{$shipmentData['traking_link']}}"
                                                     class="btn btn-primary me-2">
                                                     Track
                                                 </a>
                                                 @endisset
                                                 {{-- @else
                                                     <!-- Handle the case when tracking_code is not set in the decoded JSON data -->
                                                 @endif --}}
                                                 @elseif ($repairDetail->status === 'vendor Returned')
                                                 <a href="{{ route('MobileReceivedCustomer', ['repairDetail' => $repairDetail->id]) }}"
                                                     class="btn btn-primary me-2">
                                                     Received
                                                 </a>
                                                 @elseif ($repairDetail->status === 'completed')
                                                <a href="{{route('feedback')}}" class="btn btn-success">Write a Review</a>

                                             @else

                                                 @if ($repairDetail->price === null)
                                                     <a href="{{ route('acceptRequest', $repairDetail->id) }}">
                                                        <button  class="btn btn-primary me-2" disabled>
                                                         Accept</button>
                                                     </a>
                                                 @else
                                                     <a href="{{ route('acceptRequest', $repairDetail->id) }}"
                                                         class="btn btn-primary me-2">
                                                         Accept
                                                     </a>
                                                 @endif
                                                 <a href="{{ route('delRequest', $repairDetail->id) }}"
                                                    class="btn btn-primary">
                                                    Reject
                                                </a>
                                             @endif

                                         </div>
                                     </td>
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





     <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
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
     {{-- https://cdn.datatables.net/2.0.5/js/dataTables.min.js --}}
     {{-- <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script> --}}
     <script src="https://techrepublica.com/playground/dashboard/js/demo/datatables-demo.js"></script>

{{--
<link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css" rel="stylesheet"> --}}
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
         integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
         integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
     </script>
     <!-- datatable script -->
     {{-- <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
 @endsection

