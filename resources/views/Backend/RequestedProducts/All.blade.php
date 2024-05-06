@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Requested Products</h1>
                        <div class="card" >
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>order status</th>
                                            <th>Ordered At</th>
                                            <th>action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td> {{$order->id}} </td>

                                                <td>{{ $order->user->name }} </td>

                                                <td>{{ $order->user->email }}</td>
                                                <td>{{ $order->product->name}}</td>
                                                <td>{{ $order->quantity}}</td>
                                                <td>{{ $order->price}}</td>
                                                <td>{{ $order->status}}</td>
                                                <td>{{ $order->created_at}}</td>
                                                @php


    $shipmentData = json_decode($order->shipment_data, true);

    // Check if $shipmentData is not null before accessing its elements
    if ($shipmentData !== null) {
        $encodedTrackingCode = base64_encode($shipmentData['traking_code']);

    } else {
        // Handle the case where $shipmentData is null
        $encodedTrackingCode = null; // or any other appropriate default value
    }
@endphp

                                                <td>
                                                    @if($order->status === 'order_placed')
                                                        <a href="{{ route('DeliverOrder', $order->id) }}" class="btn btn-primary btn-circle">
                                                            Deliver
                                                        </a>
                                                    @elseif($order->status === 'DeliveredFromAdmin')
                                                    @isset($shipmentData['traking_link'])
                                                    <a href="{{$shipmentData['traking_link']}}"
                                                        class="btn btn-primary me-2">
                                                        Track
                                                    </a>
                                                    @endisset
                                                    @elseif($order->status === 'completed')
                                                   <span style="color:green">Completed</span>
                                                    @elseif($order->status === 'order_canceled')
                                                    <button class="btn btn-primary" disabled>Deliver</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>
@endsection
