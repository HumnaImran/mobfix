@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Store Request</h1>
                        <div class="card" >
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                        <thead>
                                        <tr>
                                            <th  style="padding-left:0 !important">ID</th>
                                            {{-- <th style="padding-left:0 !important">Vendor Name</th> --}}
                                            <th style="padding-left:0 !important">Store Name</th>
                                            <th style="padding-left:0 !important">Location</th>
                                            <th style="padding-left:0 !important">Phone Number</th>


                                            <th style="padding-left:0 !important">tax Payer Number</th>
                                            <th style="padding-left:0 !important">Business_License</th>
                                            <th style="padding-left:0 !important">Proof Of Identity</th>

                                            <th style="padding-left:0 !important">Status</th>
                                            <th style="padding-left:0 !important">Action</th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td> {{$store->id}} </td>

                                                <td>{{ $store->name }}</td>
                                                <td>{{ $store->location}}</td>
                                                <td>{{ $store->phone_no}}</td>

                                                <td>{{ $store->taxPayer_number}}</td>
                                                <td>
                                                    @if($store->businessLicense)
                                                    {{-- @dd($store->businessLicense) --}}
                                                        <a href="{{ asset('storage/' . $store->businessLicense) }}" target="_blank">View Business License</a>
                                                    @else
                                                        No business license provided
                                                    @endif
                                                </td>
                                                <!-- Display proof of identity picture -->
                                                <td>

                                                    @if($store->proofOfIdentity)
                                                        <img src="{{ asset('storage/' . $store->proofOfIdentity) }}" alt="Proof of Identity" style="max-width: 100px;">
                                                    @else
                                                        No proof of identity provided
                                                    @endif
                                                </td>
                                                <td>{{ $store->status}}</td>

                                                <td>
                                                    <a href="{{ route('statusUpdate', $store->id) }}" class="btn-accept btn btn-primary btn-circle" data-initial-status="{{ $store->status }}">
                                                        Approve
                                                    </a>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn-accept').each(function () {
                var button = $(this);
                var initialStatus = button.data('initial-status');

                // Update button text on page load based on the initial status
                updateButtonText(button, initialStatus);
            });

            $('.btn-accept').on('click', function () {
                var button = $(this);

                $.ajax({
                    url: button.attr('href'),
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            // Update the button text immediately
                            updateButtonText(button, response.updated_status);
                        }
                    }
                });

                return false; // Prevent the default link behavior
            });

            function updateButtonText(button, status) {
                if (status === 'approved') {
                    button.text('Approved');
                    button.removeClass('btn-primary').addClass('btn-success');
                    button.attr('disabled', 'disabled');
                }
            }
        });
    </script>


{{-- <script>
    $(document).ready(function () {
        $('.btn-accept').on('click', function () {
            var button = $(this);

            $.ajax({
                url: button.attr('href'),
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        button.text('Accepted');
                        button.removeClass('btn-primary').addClass('btn-success');
                        button.attr('disabled', 'disabled');
                    }
                }
            });

            return false;
        });
    });
</script> --}}


<!-- Add this inside the <head> section or at the end of your HTML body -->

<!-- Add this inside the <head> section or at the end of your HTML body -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




@endsection
