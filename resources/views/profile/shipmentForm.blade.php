@extends('profile.master')
@section('content')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

    <link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <form style="margin-left: 2rem; margin-top:2rem"
        action="{{ route('easyPost', ['repairDetails_id' => $repairDetail->id]) }}" method="POST">
        @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2>Fill the Shippment Form</h2>
        <div class="form-group mb-3">
            <label class="form-label" for="to_address_name">Name</label>
            <input type="text" class="form-control" name="to_address_name" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_street1">Street 1</label>
            <input type="text" class="form-control" name="to_address_street1" required>
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="to_address_city">City</label>
            <input class="form-control" type="text" name="to_address_city" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_state">State</label>
            <input class="form-control" type="text" name="to_address_state" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_zip">ZIP Code</label>
            <input class="form-control" type="text" name="to_address_zip" required>
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="to_address_phone">Phone</label>
            <input class="form-control" type="text" name="to_address_phone" required>
            <small class="form-text text-muted">Please enter the phone number in the format +92 (387) 816-5037</small>
        </div>

        {{-- <div class="form-group mb-3">
    <label class="form-label" for="to_address_email">Email</label>
    <input class="form-control" type="email" name="to_address_email" required></div> --}}


        <!-- Store's address fields -->
        <div class="form-group mb-3">
            <label class="form-label" for="from_address_name">Store Name</label>
            <input class="form-control" type="text" name="from_address_name" value="{{ $store->name }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_location">Store Location</label>
            <input class="form-control" type="text" name="from_address_location" value="{{ $store->location }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_phone_no">Store phone no</label>
            <input class="form-control" type="text" name="from_address_phone_no" value="{{ $store->phone_no }}" readonly>

        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_name">Store city</label>
            <input class="form-control" type="text" name="from_address_city" value="{{ $store->city }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_name">Store zip</label>
            <input class="form-control" type="text" name="from_address_zip" value="{{ $store->zip }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_state">Store state</label>
            <input class="form-control" type="text" name="from_address_state" value="{{ $store->state }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Payment Method</label><br>
            {{-- <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="pay_wallet" value="wallet" required>
                <label class="form-check-label" for="pay_wallet">Pay Through Wallet</label>
            </div> --}}
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="pay_stripe" value="stripe" required>
                <label class="form-check-label" for="pay_stripe">Pay Through Stripe</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="pay_pal" value="paypal" required>
                <label class="form-check-label" for="pay_paypal">Pay Through Paypal</label>
            </div>
        </div>

        <!-- Add other store's address fields here -->

        <!-- Parcel information -->
        {{-- <label class="form-label" for="length">weight</label>
    <input type="text" name="length" required> --}}

        <!-- Add other parcel fields here -->

        <button type="submit" class="btn  btn-primary">Submit</button>
    </form>



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
