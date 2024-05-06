@extends('AdminPages.AdminMaster')
@section('content')
    <div>
        <h1>Your Customers</h1>
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
                                <th style="padding-left:0 !important">Customer ID</th>
                                {{-- <th style="padding-left:0 !important">Vendor Name</th> --}}

                                <th style="padding-left:0 !important">Customer Name</th>
                                <th style="padding-left:0 !important">Customer Email</th>
                                {{-- <th style="padding-left:0 !important">Phone_no</th>
                                            <th style="padding-left:0 !important">Location</th>

                                            <th style="padding-left:0 !important">tax Payer Number</th>
                                            <th style="padding-left:0 !important">City</th> --}}



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($storeCustomers as $storeCustomer)
                                <tr>
                                    <td> {{ $storeCustomer->id }} </td>

                                    <td>{{ $storeCustomer->user->name }}</td>
                                    <td>{{ $storeCustomer->user->email }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-accept').each(function() {
                var button = $(this);
                var initialStatus = button.data('initial-status');

                // Update button text on page load based on the initial status
                updateButtonText(button, initialStatus);
            });

            $('.btn-accept').on('click', function() {
                var button = $(this);

                $.ajax({
                    url: button.attr('href'),
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
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
