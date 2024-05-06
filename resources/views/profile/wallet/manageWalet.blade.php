@extends('profile.master')
@section('content')

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .Privacytext {
        font-family: Segoe UI;
        font-size: 35px;
        font-weight: 600;
        line-height: 53px;
        text-align: left;
        color: black;
    }

    .ParagraphText {
        background-color: #f3f1f1;
    }

    .Text-privacy {
        color: black;
        font-family: Segoe UI;
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;

    }

    .WalleT {
        font-family: Segoe UI;
        font-size: 30px;
        font-weight: 600;
        line-height: 30px;
        letter-spacing: 0px;
        text-align: left;

    }

    .Walletbalance {
        font-family: Segoe UI;
        font-size: 16px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
    }

    .Balanced {
        font-family: Segoe UI;
        font-size: 20px;
        font-weight: 600;
        line-height: 32px;
        letter-spacing: 0px;
        text-align: left;

    }

    .TableBody {
        background-color: #f3f1f1;
    }

    .Tableborder {
        border: 2px solid white !important;
    }

    .tABBLEHEADER {
        border: 1px solid #f3f1f1 !important;
        border-top: 10px;
    }

    .BTN {
        background-color: #F6A92C !important;
        color: white !important;
        border-radius: 10px;
    }

    /* faqs css*/
    .FAQSsection2 {
        background-color: #f3f1f1;
        border-radius: 12px;

    }

    .BAKSections {
        position: absolute;
        top: 80%;
        left: 15%;
        width: 70%;
    }

    @media(max-width:520px) {
        .BAKSections {
            top: 60%;
            width: 80%;
            left: 10%;
        }
    }

    @media(max-width:397px) {
        .BAKSections {
            top: 40%;
            width: 90%;
            left: 5%;
        }
    }

    @media(max-width:992px) {
        .SecTions4 {
            margin-top: 40% !important;
        }
    }

    @media(max-width:857px) {
        .SecTions4 {
            margin-top: 50% !important;
        }
    }

    @media(max-width:767px) {
        .SecTions4 {
            margin-top: 60% !important;
        }

        .PrivacyTEXT {
            font-size: 25px;
        }
    }

    @media(max-width:660px) {
        .SecTions4 {
            margin-top: 80% !important;
        }
    }

    @media(max-width:600px) {
        .SecTions4 {
            margin-top: 90% !important;
        }
    }

    @media(max-width:550px) {
        .SecTions4 {
            margin-top: 100% !important;
        }
    }

    @media(max-width:440px) {
        .SecTions4 {
            margin-top: 120% !important;
        }
    }

    @media(max-width:360px) {
        .SecTions4 {
            margin-top: 140% !important;
        }

        .PrivacyTEXT {
            font-size: 16px;
        }
    }

    .SecTions4 {
        margin-top: 20%;
        margin-bottom: 5%;
    }

    .PrivacyTEXT {
        font-family: Segoe UI;
        font-size: 35px;
        font-weight: 600;
        /* line-height: 20px; */
        text-align: left;
        color: black;
    }

    .accordion-button {
        font-size: 20px;
        font-weight: 600;
        color: black;
    }

    /* news css */
    .mainSections {
        background-image: url('../img/Rectangle\ 1128.png');
        background-repeat: no-repeat;
        background-size: cover;
        width: 100% !important;
        height: 60vh !important;
        background-position: 100% 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .mainSections h2 {
        font-family: Segoe UI;
        font-size: 35px;
        font-weight: 700;
        line-height: 64px;
        letter-spacing: 0em;
        color: white;

    }

    .REVIES {
        color: #F6A92C;
    }

    .Privacyhiden {
        font-family: Segoe UI;
        font-size: 24px;
        font-weight: 600;
        line-height: 32px;
        letter-spacing: 0em;
        text-align: left;
        color: black;

    }
</style>
<script src="https://js.stripe.com/v3/"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

    <link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Begin Page Content -->
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
    <div>

                <div class="container py-3 mt-3 rounded-2  bg-white ">
                    <table class="table    table-striped " s>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
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
                                <td class="Balanced">${{$totalBalance}}</td>
                                <td class="Balanced">$0.00</td>
                            </tr>
                            <tr>
                                <td class="Walletbalance">Total Credit</td>
                                <td class="Walletbalance">Total Debit</td>
                            </tr>
                            <tr class="TRBG">
                                <td class="Balanced">${{$totalDeposits}}</td>
                                <td class="Balanced">${{$totalCredits}}</td>
                            </tr>
                            <tr>
                                <td class="Walletbalance">Recent Transaction</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table s ">
                        <thead>
                            <tr>
                                <th scope="col" class="Walletbalance" style="font-weight: 600">Wallet Type</th>
                                <th scope="col" class="Walletbalance"  style="font-weight: 600">Value</th>
                                <th scope="col" class="Walletbalance"  style="font-weight: 600">Type</th>
                                <th scope="col" class="Walletbalance"  style="font-weight: 600">Status</th>
                                {{-- <th scope="col" class="Walletbalpshopance">Product Name</th> --}}
                                <th scope="col" class="Walletbalance"  style="font-weight: 600">Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forEach($transactions as $transaction)
                            <tr>

                                <td>{{ $transaction->wallet_name }}</td>
                                <td>{{ $transaction->value }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->status}}</td>
                                <td>{{ $transaction->created_at }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <!-- Withdraw Request Button -->
                    <div class="d-flex py-4 justify-content-end align-items-center pe-5">
                        {{-- <a href="{{ route('connect.stripe') }}"> <button type="button" class="btn BTN" style="margin-right: 1rem">
                                Connect to stripe
                            </button></a> --}}
                            <a class="btn BTN btn-primary" href="{{route('connectstripe')}}" style="margin-right: 1rem" >
                                Connect To Stripe
                                </a>
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
                                    <form method="POST" action="/create-checkout-session">
                                        @csrf
                                        <!-- Your form fields go here -->
                                        <div class="form-group">
                                            <label for="depositAmount">Deposit Amount</label>
                                            <input type="text" class="form-control" id="depositAmount" name="amount">
                                        </div>
                                        <div class="form-group">
                                            <label for="accountType">Account Type</label>
                                            <select class="form-control" id="accountType" name="wallet">
                                                <option value="Personal">Personal</option>
                                                <option value="Business">Business</option>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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






                    <!-- Bootstrap JavaScript Bundle with Popper -->
                    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-lwagkP4Foy4bXRWf+aJEjOaNpbT/iE2y4P3yDyXdXDT1Bb9jhUls0h/ebhF9bPGU" crossorigin="anonymous"></script> --}}

                    {{-- <div class="d-flex py-4  justify-content-end  align-items-center pe-5  ">
                        <button type="button" class="btn BTN  ">Deposit Request</button>
                    </div> --}}

                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>


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






        <!-- Bootstrap JavaScript Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-lwagkP4Foy4bXRWf+aJEjOaNpbT/iE2y4P3yDyXdXDT1Bb9jhUls0h/ebhF9bPGU" crossorigin="anonymous"></script> --}}

        {{-- <div class="d-flex py-4  justify-content-end  align-items-center pe-5  ">
            <button type="button" class="btn BTN  ">Deposit Request</button>
        </div> --}}

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>




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





