@extends('layouts.app')

@section('content')
    <div class="container bg-light">

        <div class="container card">
            <div class="card-header">
                <h2><span class="fa fa fa-check"></span>Checkout</h2>
            </div>
            <div class="row card-body">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($cart as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item->getProductDetails()->name }}</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">{{ $item->quantity }}</span>
                        </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">-$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (SDG)</span>
                            <strong>{{ $cart[0]->summary() }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="" action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Name</label>
                                <input type="text" class="form-control" name="placed_by" placeholder="" value="{{ Auth::user()->name }}" required="">
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com" value="{{ Auth::user()->email }}">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h4 class="mb-3">Payment</h4>

                        <div class="row mb-3 ml-3">
                            <div class="custom-control custom-radio col">
                                <input name="payment_status" value="1" type="radio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio col">
                                <input  name="payment_status" value="1" type="radio" class="custom-control-input">
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio col">
                                <input  name="payment_status" value="1" type="radio" class="custom-control-input">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" name="cc-name" placeholder="" required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" name="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="total_amount" value="{{ $cart[0]->summary() }}">
                        <input type="hidden" name="status" value="1">

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" name="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" name="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block " type="submit">Place Order</button>
                    </form>
                </div>
            </div>

        </div>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';

                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

        </script>


    </div>
@endsection
