@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a href="checkout">Checkout</a></h6>
        </div>
    </div>
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Information Customer</h6>
                            <hr>
                            <div class="row checkout-form">
                                <input type="hidden" class="form-control" name="total_price" value="">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control firstname" name="fname"
                                        placeholder="Enter FirstName" value="{{ Auth::user()->name }}">
                                    <span id="fname_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control lastname" name="lname"
                                        placeholder="Enter LastName" value="{{ Auth::user()->lname }}">
                                    <span id="lname_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" name="email"
                                        placeholder="Enter Email" value="{{ Auth::user()->email }}">
                                    <span id="email_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" name="phone"
                                        placeholder="Enter Phone Numer" value="{{ Auth::user()->phone }}">
                                    <span id="phone_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" name="address1"
                                        placeholder="Enter Address 1" value="{{ Auth::user()->address1 }}">
                                    <span id="address1_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" name="address2"
                                        placeholder="Enter Address 2" value="{{ Auth::user()->address2 }}">
                                    <span id="address2_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" name="city" placeholder="Enter City"
                                        value="{{ Auth::user()->city }}">
                                    <span id="city_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">State</label>
                                    <input type="text" class="form-control state" name="state"
                                        placeholder="Enter State" value="{{ Auth::user()->state }}">
                                    <span id="state_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" name="country"
                                        placeholder="Enter Country" value="{{ Auth::user()->country }}">
                                    <span id="country_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Pincode</label>
                                    <input type="text" class="form-control pincode " name="pincode"
                                        placeholder="Enter Pincode" value="{{ Auth::user()->pincode }}">
                                    <span id="pincode_error" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            @if ($cartitems->count() > 0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @foreach ($cartitems as $item)
                                            @php $total += ($item->prod_qty *$item->products->selling_price) @endphp
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td class="text-center">{{ $item->prod_qty }}</td>
                                                <td>{{ number_format($item->products->selling_price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <div class="total_price">
                                        <h3 class="total">Grand Total: {{ number_format($total) }}</h3>
                                    </div>
                                </table>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-primary w-100 ">Place Order | COD</button>
                                <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with
                                    Razorpay</button>
                                <br>
                                <div class="mt-3">
                                    <div id="paypal-button-container"></div>
                                </div>
                            @else
                                <h2 class="text-center">No products in your cart</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AShjQjcFj2LY3yMtyl-jv6WegCgx6Djg2chG4Bb42MQDe8vbSubFVkUZQQnPWQS2ftbZHMOVWIcvEq5Q&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(
                        `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                        );
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
