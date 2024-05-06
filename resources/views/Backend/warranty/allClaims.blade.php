

@extends('AdminPages.AdminMaster')
@section('content')
       @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
<div  >
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
                    @foreach ($allclaims as $claim)
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

                            @if ($claim->status == 'pending' &&  $claim->claim_type == 'purchased_mobile')
                                <td>
                                    <form action="{{route('Approveclaim')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                        <button type="submit" class="btn btn-primary">Approve</button>
                                    </form>
                                </td>
                            @elseif( $claim->status == 'Deliver To' &&  $claim->claim_type == 'purchased_mobile')
                                <td>
                                    <form action="{{route('ReceivedAdminProduct')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                        <button type="submit" class="btn btn-primary">Received</button>
                                    </form>
                                </td>
                                @elseif( $claim->status == 'Approved' )
                                <td>

                                        <span style="color:red" >In process</span>

                                </td>
                                @elseif( $claim->status == 'Completed')
                                <td>

                                        <span style="color:green" >Completed</span>

                                </td>
                                @elseif( $claim->status == 'Received' &&  $claim->claim_type == 'purchased_mobile')
                                <td>
                                    <form action="{{route('deliverBackAdminProduct')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                        <button type="submit" class="btn btn-primary">Deliver back</button>
                                    </form>
                                </td>

                                @elseif ($claim->status == 'Deliver back' &&  $claim->claim_type == 'purchased_mobile')
                                    @php
                                    $shipmentData = json_decode($claim->shipment_data, true);
                                    $encodedTrackingCode = isset($shipmentData['traking_code']) ? base64_encode($shipmentData['traking_code']) : null;
                                @endphp


                                @isset($shipmentData['traking_link'])
                                    <td style="display: flex; flex-direction:column; justify-content:center; align-items:center;">
                                        <a href="{{ $shipmentData['traking_link'] }}" class="btn btn-primary me-2">
                                            Track product
                                        </a>
                                    </td>
                                    @else
                                    <td>Shipment data not available</td>
                                @endisset

@else
<td><span>In Process</span></td>

                                        @endif



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
