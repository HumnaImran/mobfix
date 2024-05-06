@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Repair request</h1>
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
                                            {{-- <th>action</th> --}}

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

                                                {{-- <td>
                                                    <a href="{{ route('DeliverOrder', $order->id) }}" class="btn btn-primary btn-circle">
                                                       Deliver
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>
@endsection
