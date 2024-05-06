@extends('userPages.master')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --fadedBlack-color: #737373;
            --lightGrey-color: #bfbfbf;
            --black-color: #000;
            --darkcheck-color: #393939;
            --yellowcheck-color: #fce287;
            --greencheck-color: #c8fbc3;

        }

        .ss {
            color: var(--fadedBlack-color);
            font-size: 18px;
        }

        /* .orderhead{
                font-size: 20px;
            } */

        .onck {
            /* gap: 10px
                ; */
            width: 50%;
            margin-top: -8px;
            margin-left: 1rem;
            gap: 3px;
            width: fit-content;
            height: 56px;
            border: 1px solid #8EA49C;
        }

        .btjs {
            /* padding-block: 5px; */
            padding-inline: 10px;

            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            border: none;
            background: transparent;
            color: #666358;
        }


        .custom-table-border {
            border: 1px solid white;
            border-radius: .3rem;

        }

        .stars-text {
            color: var(--lightGrey-color);
            font-weight: 400;
        }

        .color-text {
            color: var(--fadedBlack-color);
        }

        .product-heading {
            font-size: 14px;
            font-weight: 400;
        }

        /* Remove default styles for checkboxes */
        .inp-check-dark {
            -webkit-appearance: none;
            /* Safari/Chrome */
            -moz-appearance: none;
            /* Firefox */
            appearance: none;
            /* Standard */
            border-radius: 50%;
            width: 25px;
            /* Set the width of the checkbox */
            height: 25px;
            /* Set the height of the checkbox */
            background-color: var(--darkcheck-color);
            /* Set the background color */
            cursor: pointer;
            /* Add a pointer cursor */
            position: relative;

        }

        /* Remove default styles for checkboxes */
        .inp-check-yellow {
            -webkit-appearance: none;
            /* Safari/Chrome */
            -moz-appearance: none;
            /* Firefox */
            appearance: none;
            /* Standard */
            border-radius: 50%;
            width: 25px;
            /* Set the width of the checkbox */
            height: 25px;
            /* Set the height of the checkbox */
            background-color: var(--yellowcheck-color);
            /* Set the background color */
            cursor: pointer;
            /* Add a pointer cursor */
            position: relative;

        }

        /* Remove default styles for checkboxes */
        .inp-check-green {
            -webkit-appearance: none;
            /* Safari/Chrome */
            -moz-appearance: none;
            /* Firefox */
            appearance: none;
            /* Standard */
            border-radius: 50%;
            width: 25px;
            /* Set the width of the checkbox */
            height: 25px;
            /* Set the height of the checkbox */
            background-color: var(--greencheck-color);
            /* Set the background color */
            cursor: pointer;
            /* Add a pointer cursor */
            position: relative;

        }

        /* Add custom styles for checked state */
        .inp-check:checked {
            background-color: #4CAF50;
            /* Change background color when checked */
            border: none;
            /* Change border color when checked */
            border-radius: 50%;
        }

        /* Add tick mark when checked */
        .inp-check-dark:checked::before {
            content: '\2713';
            /* Unicode character for a checkmark */
            color: white;
            /* Set the color of the checkmark */
            font-size: 16px;
            /* Set the font size of the checkmark */
            position: absolute;
            /* Position absolute to overlay the tick on top of the checkbox */
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Center the tick */
        }

        /* Add tick mark when checked */
        .inp-check-yellow:checked::before {
            content: '\2713';
            /* Unicode character for a checkmark */
            color: white;
            /* Set the color of the checkmark */
            font-size: 16px;
            /* Set the font size of the checkmark */
            position: absolute;
            /* Position absolute to overlay the tick on top of the checkbox */
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Center the tick */
        }

        /* Add tick mark when checked */
        .inp-check-green:checked::before {
            content: '\2713';
            /* Unicode character for a checkmark */
            color: white;
            /* Set the color of the checkmark */
            font-size: 16px;
            /* Set the font size of the checkmark */
            position: absolute;
            /* Position absolute to overlay the tick on top of the checkbox */
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Center the tick */
        }

        .confirm-btn {
            background-color: #525fe1;
            color: #fff;
        }
    </style>




    <main style="margin-top: 2rem; margin-bottom:3rem">
        <div class="container-fluid p-3">
            <div class="row ">
                <div class="col-12 col-md-8  ">
                    <div class="table-responsive">
                        <table class="table table-hover w-100  ">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
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
                            <thead class="">

                                <tr class=" ">
                                    <th class=" pb-5 border border-0 " scope="col">
                                        <h4 class="ss">Product</h4>
                                    </th>
                                    <th class=" pb-5 border border-0" scope="col">
                                        <h4 class="ss">Price</h4>
                                    </th>
                                    <th class=" pb-5 border border-0 px-5" scope="col">
                                        <h4 class="ss">Quantity</h4>
                                    </th>
                                    <th class=" pb-5 border border-0" scope="col">
                                        <h4 class="ss"> Total</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $index => $cartItem)
                                    <tr id="row-{{ $index }}">
                                        <th scope="row" class=" py-3">
                                            <div class="d-flex  tableimgsetting">

                                                @if ($cartItem->product->images->isNotEmpty())
                                                    <img src="{{ url('storage/' . $cartItem->product->images->first()->image) }}"
                                                        class="img-fluid me-4" alt="Card Image"
                                                        style="width:50px;height:70px">
                                                @else
                                                    <img src="{{ asset('path/to/default/image.jpg') }}"
                                                        class="img-fluid me-4" alt="Default Image"
                                                        style="width:50px;height:70px">
                                                @endif
                                                <div class="d-flex mx-3 ">

                                                    <div class="product-img">
                                                        <img src="{{asset('./assets/img/product-cover-5.png')}}" alt=""
                                                            class="product-img-tag ">
                                                    </div>

                                                    <div class="product-details">
                                                        <p class="product-heading mb-0"> {{ $cartItem->product->name }}</p>
                                                        {{-- <span class="stars-text" style="width: 100%;">4.00</span>


                                                        <span><svg width="10" height="10" viewBox="0 0 21 21"
                                                                fill="#000" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.5252 15.0395L14.4687 17.5428C14.9772 17.8635 15.6032 17.3863 15.4545 16.7996L14.3122 12.3094C14.2813 12.1849 14.2862 12.0543 14.3263 11.9325C14.3665 11.8107 14.4402 11.7027 14.5391 11.621L18.0757 8.67183C18.5373 8.28852 18.3026 7.51407 17.7001 7.47496L13.0837 7.17769C12.9578 7.17037 12.8367 7.12651 12.7353 7.0515C12.6338 6.97648 12.5564 6.87354 12.5126 6.75527L10.7912 2.42148C10.7456 2.29624 10.6626 2.18805 10.5534 2.1116C10.4443 2.03515 10.3142 1.99414 10.1809 1.99414C10.0476 1.99414 9.91754 2.03515 9.80836 2.1116C9.69918 2.18805 9.61617 2.29624 9.57061 2.42148L7.84925 6.75527C7.80538 6.87354 7.728 6.97648 7.62656 7.0515C7.52512 7.12651 7.40403 7.17037 7.27807 7.17769L2.6617 7.47496C2.05923 7.51407 1.82449 8.28852 2.28613 8.67183L5.82274 11.621C5.92159 11.7027 5.99533 11.8107 6.03548 11.9325C6.07562 12.0543 6.08054 12.1849 6.04965 12.3094L4.99336 16.4711C4.8134 17.1751 5.56454 17.7462 6.16701 17.3629L9.83663 15.0395C9.93954 14.9741 10.059 14.9394 10.1809 14.9394C10.3029 14.9394 10.4223 14.9741 10.5252 15.0395Z"
                                                                    fill="#bfbfbf" />
                                                            </svg>

                                                        </span> --}}

                                                        <br>
                                                        <div class="checks-container d-flex ">
                                                            <div class="color-text">
                                                                <p class="color-text">Color:</p>
                                                            </div>
                                                            <div class="checkboxes">
                                                                <input type="checkbox" class="inp-check-dark ms-3">
                                                                <input type="checkbox" class="inp-check-yellow ms-3">
                                                                <input type="checkbox" class="inp-check-green ms-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </th>


                                        <td class="py-5" id="subtotal-{{ $index }}"
                                            data-price="{{ $cartItem->price }}">{{ $cartItem->price }}</td>
                                        <td class="py-5 px-2">
                                            <span
                                                class=" rounded py-1 px-1 d-flex justify-content-center onck h-50 w-lg-50 w-md-100 w-sm-100 ">
                                                <div class="bi-1">
                                                    <button class="btn button1"
                                                        onclick="decrementQuantity(event, {{ $index }},{{ $cartItem->id }})">-</button>
                                                    <span class="quantity" id="quantity-{{ $index }}">1</span>
                                                    <button class="btn"
                                                        onclick="incrementQuantity(event, {{ $index }},{{ $cartItem->id }})">+</button>
                                                </div>
                                            </span>
                                        </td>
                                        <td class="py-5 fw-bold " id="total-price-{{ $index }}"
                                            data-price="{{ $cartItem->price }}">{{ $cartItem->price }}</td>
                                        <td class="py-5 px-3">
                                            <a href="" class=""><img src="{{asset('./assets/img/Mask group.svg')}}"
                                                    alt="" class="delete-icon"></a>
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <!-- <th scope="row" class=" py-3">


                                            </th> -->


                                    {{-- <td class="py-3 d-flex ">
                                        <div class="gift-checkbox d-flex ">
                                            <input type="checkbox" class="">
                                            <p class=" mb-0 ms-3">Gift packing</p>
                                        </div>
                                        <div class="gift-checkbox d-flex ms-5">
                                            <input type="checkbox" class="">
                                            <p class=" mb-0 ms-3">Express shipping</p>
                                        </div>
                                    </td> --}}
                                    <td class="py-2 px-3">
                                        <p class="subtotal-p"></p>


                                    </td>


                                    <td class="py-3 ">Subtotal:</td>
                                    <td class="py-3 fw-bold  pe-3 " id="subtotal">{{ $totalPrice }}</td>
                                    <td class="py-3 fw-bold  pe-3 "></td>
                                </tr>






                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-12 col-md-4">

                    <h4 class=" mt-4 mt-md-1 border-bottom pb-4 "> Your Order</h4>
                    <div class="table-responsive custom-table-border mt-4 ">
                        <table class=" table table-borderless  ">

                            <tbody class=" ">
                                <tr class=" ">
                                    <td class="text-start  ">subtotal</td>
                                    <td class="   text-end  " id="subtotal">{{ $totalPrice }}</td>

                                </tr>
                                {{-- <tr class=" ">
                                    <td class=" text-start ">Discount </td>
                                    <td class="   text-end   " id="discount">0.00</td>
                                </tr> --}}
                                <tr class=" ">
                                    <td class=" text-start ">Shipping and Processing </td>
                                    <td class="   text-end  " id="shipping">200.00</td>
                                </tr>

                                <tr class="border-top border-bottom  py-3">
                                    <td class=" py-3 fw-bold  text-start  ">Total</td>
                                    <td class="text-end fw-bold py-3" id="total">{{ $totalPrice + 200}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
<div class="container">
        <form style="margin-left: 2rem; margin-top:2rem"
            action="{{ route('StoreUserAddress', ['user_id' => auth()->user()->id])  }}" method="POST">
            @csrf
            {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(auth()->user()->cart)
            <input type="hidden" name="cart_item_id" value="{{ auth()->user()->cart->id }}">
        @else


        <input type="hidden" name="cart_item_id" value="">
        @endif
            <h2 style="text-align: center">Fill the Shippment Form</h2>
            <div class="form-group mb-3">
                <label class="form-label" for="to_address_name">Name</label>
                <input type="text" class="form-control" name="to_address_name" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="to_address_street1">Street 1</label>
                <input type="text" class="form-control" name="to_address_street1" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="to_address_city">City</label>
                <input class="form-control" type="text" name="to_address_city" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="to_address_state">State</label>
                <input class="form-control" type="text" name="to_address_state" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="to_address_zip">ZIP Code</label>
                <input class="form-control" type="text" name="to_address_zip" required>
            </div>


            <div class="form-group mb-3">
                <label class="form-label" for="to_address_phone">Phone</label>
                <input class="form-control" type="text" name="to_address_phone" required>
                <small class="form-text text-muted">Please enter the phone number in the format +92 (387) 816-5037</small>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Payment Method</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="pay_wallet" value="wallet" required>
                    <label class="form-check-label" for="pay_wallet">Pay Through Wallet</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="pay_stripe" value="stripe" required>
                    <label class="form-check-label" for="pay_stripe">Pay Through Stripe</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="pay_pal" value="paypal" required>
                    <label class="form-check-label" for="pay_paypal">Pay Through Paypal</label>
                </div>
            </div>



            <button type="submit" class="btn  btn-primary">Submit</button>
        </form>

        {{-- <form id="paymentForm" action="{{ route('payment') }}" method="POST">
            @csrf
            <!-- Hidden input field to hold the selected payment method -->
            <input type="hidden" name="payment_method" id="paymentMethod" value="">

            <!-- Radio button converted to a form button -->
            <button type="submit" class="btn btn-primary" onclick="selectPaymentMethod('paypal')">Pay Through Paypal</button>
        </form> --}}
</div>

        {{-- <div class="paymentbtn d-flex justify-content-end me-4 mt-4">

            <a href="{{ route('saveplan', ['cart_item_id' => $cartItem->id]) }}" class="btn confirm-btn">
                Confirm Payment
            </a> --}}


    </main>



    <script>
        // var currentNumber = 0;

        // function updateNumberDisplay() {
        //     document.getElementById('number-display').innerText = currentNumber;
        // }

        // function increaseNumber() {
        //     currentNumber++;
        //     updateNumberDisplay();
        // }

        // function decreaseNumber() {

        //     currentNumber--;

        //     updateNumberDisplay();


        // }

        // function resetNumber() {
        //     currentNumber = 0;
        //     updateNumberDisplay();
        // }




        // function incrementQuantity(event) {
        //     event.stopPropagation(); // Prevent the event from propagating and closing the dropdown
        //     const quantityElement = event.currentTarget.parentElement.querySelector('.quantity');
        //     let quantity = parseInt(quantityElement.textContent);
        //     quantity++;
        //     quantityElement.textContent = quantity;
        // }

        // function decrementQuantity(event) {
        //     event.stopPropagation(); // Prevent the event from propagating and closing the dropdown
        //     const quantityElement = event.currentTarget.parentElement.querySelector('.quantity');
        //     let quantity = parseInt(quantityElement.textContent);
        //     if (quantity > 1) {
        //         quantity--;
        //         quantityElement.textContent = quantity;
        //     }
        // }


        function decrementQuantity(event, index, cartid) {
            var quantityElement = document.getElementById('quantity-' + index);
            var quantity = parseInt(quantityElement.innerText);
            if (quantity > 1) {
                quantity--;
                quantityElement.innerText = quantity;
                updateSubtotal();
                updateTotalPrice(index);
                calculateTotal();
                updateQuantityAndTotal(cartid, quantity);
            }
        }

        function incrementQuantity(event, index, cartid) {
            var quantityElement = document.getElementById('quantity-' + index);
            var quantity = parseInt(quantityElement.innerText);
            quantity++;
            quantityElement.innerText = quantity;
            updateSubtotal();
            updateTotalPrice(index);
            calculateTotal();
            updateQuantityAndTotal(cartid, quantity);
        }

        function updateSubtotal() {
            var total = 0;
            var rows = document.querySelectorAll('[id^="row-"]');
            rows.forEach(row => {
                var quantity = parseInt(row.querySelector('.quantity').innerText);
                var price = parseFloat(row.querySelector('.fw-bold').getAttribute('data-price'));
                total += quantity * price;
            });
            document.getElementById('subtotal').innerText = total.toFixed(2); // Update subtotal
        }

        function updateTotalPrice(index) {
            var quantity = parseInt(document.getElementById('quantity-' + index).innerText);
            var price = parseFloat(document.getElementById('subtotal-' + index).getAttribute('data-price'));
            var totalPrice = quantity * price;
            document.getElementById('total-price-' + index).innerText = totalPrice.toFixed(2); // Update total price
        }

        function calculateTotal() {
            var subtotal = parseFloat(document.getElementById('subtotal').innerText);
            var discount = parseFloat(document.getElementById('discount').innerText);
            var shipping = parseFloat(document.getElementById('shipping').innerText);
            var total = subtotal - discount + shipping;

            document.getElementById('total').innerText = '$' + total.toFixed(2);
        }





        function updateQuantityAndTotal(cartid, quantity) {
            // Get the CSRF token value from the meta tag
            var csrfToken = '{{ csrf_token() }}';

            // Send AJAX request to update quantity in the cart table
            $.ajax({
                url: '/updateQuantity', // Replace with your route URL
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                },
                data: {
                    cart_item_id: cartid,
                    quantity: quantity
                },
                success: function(response) {
                    // Update the subtotal and total price
                    var subtotal = response.subtotal;
                    var totalPrice = response.totalPrice;
                    $('#subtotal').text(subtotal.toFixed(2));
                    $('#total-price').text(totalPrice.toFixed(2));
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        }

        //         function updateSubtotal() {
        //     var total = 0;
        //     var rows = document.querySelectorAll('[id^="row-"]');
        //     rows.forEach(row => {
        //         var quantity = parseInt(row.querySelector('.quantity').innerText);
        //         var price = parseFloat(row.querySelector('.fw-bold').getAttribute('data-price'));
        //         total += quantity * price;
        //     });
        //     document.getElementById('subtotal').innerText = total.toFixed(2); // Update subtotal
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
@endsection
