@extends('AdminPages.AdminMaster')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <div>
        <h1>All Repair request</h1>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>

                                <th>images</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($repairDetails as $repairDetail) --}}
                            <tr>
                                <td> {{ $repairDetail->id }} </td>

                                <td>{{ $repairDetail->first_name }} {{ $repairDetail->last_name }}</td>

                                <td>{{ $repairDetail->email }}</td>
                                <td>
                                    @foreach ($repairDetail->images as $image)
                                        <img style="width:5rem" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                                    @endforeach
                                </td>
                                <td style="color: green">{{ $repairDetail->status }}</td>
                                {{-- <td>{{ $repairDetail->post_code}}</td>
                                                <td>{{ $repairDetail->phone_no}}</td>
                                                <td>{{ $repairDetail->device_code}}</td>
                                                <td>{{ $repairDetail->info}}</td>
                                                <td>{{ $repairDetail->created_at}}</td> --}}
                                                @php
                                                $shipmentData = json_decode($repairDetail->shipmentdata, true);

                                                // Check if $shipmentData is not null and is an array
                                                if ($shipmentData !== null && is_array($shipmentData)) {
                                                    $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                                                } else {
                                                    // Handle the case when $shipmentData is null or not an array
                                                    $encodedTrackingCode = null; // or any default value or logic
                                                }
                                            @endphp
                                                {{-- @php
                                                $shipmentData = json_decode($repairDetail->shipmentdata, true);
                                                $encodedTrackingCode = base64_encode($shipmentData['traking_code']);
                                            @endphp --}}

                                <td>
                                    @if ($repairDetail->status === 'pending')
                                        <a href="#" data-toggle="modal"
                                            data-target="#offerPriceModal{{ $repairDetail->id }}">
                                            <button type="button" class="btn btn-primary btn-circle" {{ $repairDetail->status === 'price offered' ? 'disabled' : '' }}>
                                                Offer Price
                                            </button>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="offerPriceModal{{ $repairDetail->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Offer Price</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('submitOfferPrice', ['id' => $repairDetail->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="price">Enter Offer Price:</label>
                                                                <input type="text" class="form-control" id="price"
                                                                    name="price" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @elseif ($repairDetail->status === 'InProcess')
                                        <a href="https://track.easypost.com/{{ $encodedTrackingCode }}" class="btn btn-primary btn-circle">
                                            Track
                                        </a>
                                    @elseif ($repairDetail->price)
                                        @if ($repairDetail->status === 'vendor Received')
                                            <a
                                                href="{{ route('returnPhoneForm', ['repairDetail' => $repairDetail->id]) }}">
                                                <button type="button" class="btn btn-primary btn-circle">
                                                    Return Phone
                                                </button>
                                            </a>
                                        @elseif($repairDetail->status === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @elseif($repairDetail->status === 'customer accepted')
                                            <a href="{{ route('MobileReceived', ['repairDetail' => $repairDetail->id]) }}">
                                                <button type="button" class="btn btn-primary btn-circle">
                                                    Received
                                                </button>
                                            </a>
                                            @else
                                            <button type="button" class="btn btn-primary btn-circle" disabled >
                                                In process
                                            </button>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
