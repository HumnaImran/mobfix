@extends('AdminPages.AdminMaster')
@section('content')

<div class="container">
    <form style="margin-left: 2rem; margin-top:2rem"
        action="{{ route('StoreAdminAddress', ['user_id' => auth()->user()->id])  }}" method="POST">
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

        {{-- <input type="hidden" name="cart_item_id" value="{{ $cartItem->id }}"> --}}
        <h2 style="text-align: center">Fill the Shippment Form</h2>
        <div class="form-group mb-3">
            <label class="form-label" for="to_address_name">Name</label>
            <input type="text" class="form-control" name="from_address_name" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_street1">Street 1</label>
            <input type="text" class="form-control" name="from_address_street1" required>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="from_address_city">City</label>
            <input class="form-control" type="text" name="from_address_city" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_state">State</label>
            <input class="form-control" type="text" name="from_address_state" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="from_address_zip">ZIP Code</label>
            <input class="form-control" type="text" name="from_address_zip" required>
        </div>


        <div class="form-group mb-3">
            <label class="form-label" for="from_address_phone">Phone</label>
            <input class="form-control" type="text" name="from_address_phone" required>
        </div>

            <input class="form-control" type="hidden" name="order_id" value="{{$order->id}}"  >




        <button type="submit" class="btn  btn-primary">Submit</button>
    </form>
</div>


@endsection
