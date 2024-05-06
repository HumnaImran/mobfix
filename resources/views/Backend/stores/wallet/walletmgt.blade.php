@extends('profile.master')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="container py-3 mt-3 rounded-2  bg-white ">
    <table class="table  table-responsive  table-striped ">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <thead class="tABBLEHEADER">
            <th class="WalleT">Wallet</th>
            <th class="WalleT">Withdraw</th>
        </thead>
        <tbody>
            <tr>
                <td class="Walletbalance">Wallet Balance</td>
                <td></td>
            </tr>
            <tr>
                <td class="Balanced">$0.00</td>
                <td class="Balanced">$0.00</td>
            </tr>
            <tr>
                <td class="Walletbalance">Total Credit</td>
                <td class="Walletbalance">Total Deposit</td>
            </tr>
            <tr class="TRBG">
                <td class="Balanced">$0.00</td>
                <td class="Balanced">$0.00</td>
            </tr>
            <tr>
                <td class="Walletbalance">Recent Transaction</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-responsive ">
        <thead>
            <tr>
                <th scope="col" class="Walletbalance">S.No</th>
                <th scope="col" class="Walletbalance">Date</th>
                <th scope="col" class="Walletbalance">Amount</th>
                <th scope="col" class="Walletbalance">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="Walletbalance">No transaction has been done yet</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    <!-- Withdraw Request Button -->
    <div class="d-flex py-4 justify-content-end align-items-center pe-5">
        <a href="{{ route('connect.stripe') }}"> <button type="button" class="btn BTN" style="margin-right: 1rem">
                Connect to stripe
            </button></a>
        <button type="button" class="btn BTN" style="margin-right: 1rem" data-bs-toggle="modal"
            data-bs-target="#withdrawModal">
            Withdraw Request
        </button>
        <button type="button" class="btn BTN" data-bs-toggle="modal" data-bs-target="#depositModal">
            Deposit Request
        </button>
    </div>

    <!-- Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawModalLabel">Withdraw Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Place your withdrawal form here -->
                    <form method="POST" action="{{ route('withdraw') }}">
                        @csrf
                        <!-- Your form fields go here -->
                        <div class="form-group">
                            <label for="withdrawalAmount">Withdrawal Amount</label>
                            <input type="text" class="form-control" id="withdrawalAmount" name="withdrawalAmount">
                        </div>
                        <!-- Add more form fields as needed -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Place your deposit form here -->
                    <form method="POST" action="{{ route('deposit') }}">
                        @csrf
                        <!-- Your form fields go here -->
                        <div class="form-group">
                            <label for="depositAmount">Deposit Amount</label>
                            <input type="text" class="form-control" id="depositAmount" name="depositAmount">
                        </div>
                        <div class="form-group">
                            <label for="accountType">Account Type</label>
                            <select class="form-control" id="accountType" name="wallet">
                                <option value="personal">Personal</option>
                                <option value="business">Business</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server.
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form.
            form.submit();
        }
    </script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>





@endsection
