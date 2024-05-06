@extends('AdminPages.AdminMaster')
@section('content')


<form style="margin-left: 2rem; margin-top:2rem"
        action="{{ route('easyPostVendor', ['repairDetails_id' => $repairDetail->id]) }}" method="POST">
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
        <h2>View the Shippment Details</h2>
        <div class="form-group mb-3">
            <label class="form-label" for="from_address_name">Store Name</label>
            <input type="text" class="form-control" name="from_address_name" value="{{ $store->name }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_location">Store Street 1</label>
            <input type="text" class="form-control" name="from_address_location" value="{{ $store->location }}" readonly>
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="from_address_city">Store City</label>
            <input class="form-control" type="text" name="from_address_city" value="{{ $store->city }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_state">Store State</label>
            <input class="form-control" type="text" name="from_address_state" value="{{ $store->state }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_zip">Store ZIP Code</label>
            <input class="form-control" type="text" name="from_address_zip" value="{{ $store->zip }}" readonly>
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="from_address_phone_no">Store Phone</label>
            <input class="form-control" type="text" name="from_address_phone_no"  value="{{ $store->phone_no }}" readonly>
        </div>

        {{-- <div class="form-group mb-3">
    <label class="form-label" for="to_address_email">Email</label>
    <input class="form-control" type="email" name="to_address_email" required></div> --}}


        <!-- Store's address fields -->
        <div class="form-group mb-3">
            <label class="form-label" for="to_address_name">Customer Name</label>
            <input class="form-control" type="text" name="to_address_name" value="{{ $repairDetail->first_name }} {{ $repairDetail->last_name }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_street1">Customer Location</label>
            <input class="form-control" type="text" name="to_address_street1" value="{{ $repairDetail->location }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_phone_no">Customer phone no</label>
            <input class="form-control" type="text" name="to_address_phone_no" value="{{ $repairDetail->phone_no }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_city">Customer city</label>
            <input class="form-control" type="text" name="to_address_city" value="{{ $repairDetail->city }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_zip">Customer zip</label>
            <input class="form-control" type="text" name="to_address_zip" value="{{ $repairDetail->post_code }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="to_address_state">Customer state</label>
            <input class="form-control" type="text" name="to_address_state" value="{{ $repairDetail->state }}" readonly>
        </div>

        <!-- Add other store's address fields here -->

        <!-- Parcel information -->
        {{-- <label class="form-label" for="length">weight</label>
    <input type="text" name="length" required> --}}

        <!-- Add other parcel fields here -->

        <button type="submit" class="btn  btn-primary">Submit</button>
    </form>





@endsection
