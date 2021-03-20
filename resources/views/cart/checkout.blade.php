@extends('layouts.master')

@section('content')
    <div class="container bg-light">

        <div class="container card">
            <div class="card-header">
                <h2><span class="fa fa-check"></span>Checkout</h2>
            </div>
            <div class="row card-body">
                <div class="mb-4 col-md-4 order-md-2">
                    <h4 class="mb-3 d-flex justify-content-between align-items-center">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ Count($cart) }}</span>
                    </h4>
                    <ul class="mb-3 list-group">
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
                                <h6 class="my-0">Subtotal</h6>
                                <small>Subtotal (SDG)</small>
                            </div>
                            <span class="text-success">{{ number_format($cart[0]->summary(), 0, '.', ',') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (SDG)</span>
                            <strong>{{ number_format($cart[0]->summary(), 0, '.', ',') }}</strong>
                        </li>
                    </ul>

                    <form class="p-2 card">
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
                    <form action="{{ route('orders.placed') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName">Name</label>
                                <input type="text" class="form-control" name="placed_by" placeholder=""
                                    value="{{ Auth::user()->name }}">
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com"
                                    value="{{ Auth::user()->email }}">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h4 class="mb-3">Payment</h4>

                        <div class="mb-3 ml-3 row">
                            <div class="custom-control custom-radio col">
                                <input name="payment_status" value="2" type="radio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio col">
                                <input name="payment_status" value="1" type="radio" class="custom-control-input">
                                <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" name="cc-name" placeholder="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" name="cc-number" placeholder="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="total_amount" value="{{ $cart[0]->summary() }}">
                        <input type="hidden" name="status" value="1">

                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" name="cc-expiration" placeholder="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" name="cc-cvv" placeholder="">
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
    </div>
@endsection
