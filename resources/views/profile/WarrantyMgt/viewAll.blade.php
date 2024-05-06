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

<!-- Error message -->
@if (session('error'))
    <div class="alert alert-danger mt-4">
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
                  <li class="breadcrumb-item active" aria-current="page">Your Claimed  Warranties</li>
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
                                <th>Claim ID</th>
                                <th>Claimer</th>
                                <th>Claimer Email</th>
                                <th>Claim_type</th>
                                <th>Claim_information</th>
                                <th>status</th>
                                <th> Product / Store </th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($claims as $claim)
                                <tr>
                                    <td>{{ $claim->id }} </td>
                                    <td>{{ $claim->full_names }} </td>
                                    <td>{{ $claim->email }} </td>
                                    <td>{{ $claim->claim_type }} </td>
                                    <td>{{ $claim->claim_information }}</td>
                                    <td>{{ $claim->status }}</td>

                                    @if ($claim->claim_type == 'purchased_mobile')
                                        <td>{{ $claim->product->name }}</td>
                                    @elseif($claim->claim_type == 'repair_service')
                                        <td>{{ $claim->store->name }}</td>
                                    @endif

                                    @if ($claim->status == 'pending' && now()->diffInDays($claim->created_at) > 7)
                                        <td>

                                            <a href="{{route('ComplainToAdminForm')}}">    <button type="submit" class="btn btn-danger">Complain to Admin</button></a>

                                        </td>

                                        @elseif ($claim->status == 'pending')
                                        <td>
                                            <span style="color:red">In Process</span>
                                        </td>
                                    @elseif($claim->claim_type == "purchased_mobile" && $claim->status == 'Approved')
                                        <td>
                                            <a href="{{ route('DeliverWarrantyProduct', $claim->id) }}"
                                                class="btn btn-primary">
                                                Deliver product
                                            </a>
                                        </td>

                                    @elseif($claim->claim_type == "repair_service" && $claim->status == 'Approved')

                                   <td>
                                            <a href="{{ route('DeliverwarrntyRepair', $claim->id) }}"
                                                class="btn btn-primary">
                                                Deliver mobile
                                            </a>
                                        </td>




                                        @elseif($claim->status == 'Deliver back')

                                        <td>
                                            <form action="{{route('UserRecievedProduct')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                                <button type="submit" class="btn btn-primary">Received</button>
                                            </form>
                                        </td>

                                    @elseif ($claim->status == 'Deliver To')
                                    @php
                                    $shipmentData = json_decode($claim->shipment_data, true);
                                    $encodedTrackingCode = isset($shipmentData['traking_code']) ? base64_encode($shipmentData['traking_code']) : null;
                                @endphp


                                    @isset($shipmentData['traking_link'])
                                    <td style="display: flex; flex-direction:column; justify-content:center; align-items:center;">
                                        <a href="{{ $shipmentData['traking_link'] }}" class="btn btn-primary me-2">
                                            Track
                                        </a>
                                    </td>
                                @else
                                    <td>Shipment data not available</td>
                                @endisset

                                @elseif($claim->status == 'Completed')
                                <td>
                                    <span style="color:green">Completed</span>
                                </td>
                                        @endif


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
