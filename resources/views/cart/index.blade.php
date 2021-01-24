@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="">
            @if (Count($cart) == 0)
                <div class="text-center py-4">
                    <img width="300" class="repoonsive" src="{{ asset('assets/images/cart.svg') }}" alt="emptycart">
                    <div class="text-center">
                        <strong class="title text-center">Your cart is empty</strong>
                        <p class="description text-center"> You have items in your wishlist. To buy items from your
                            wishlist, move them to your cart.</p>
                        <a class="btn btn-primary" href="{{ route('home') }}"><span class="dyoqji-1 cxTMkg">Continue
                                Shopping</span></a>
                    </div>
                </div>
            @else
                <section class="shopping-cart">
                    <div class="container">
                        <div class="">
                            <h2>Shopping Cart</h2>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <div class="items">
                                        @foreach ($cart as $item)
                                            <div class="product">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="img-fluid mx-auto d-block image"
                                                            src="{{ asset($item->getProductDetails()->img_path) }}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="info">
                                                            <div class="row">
                                                                <div class="col-md-5 product-name">
                                                                    <div class="product-name">
                                                                        <a
                                                                            href="#">{{ $item->getProductDetails()->name }}</a>
                                                                        <div class="product-info">
                                                                            <div>Details: <span
                                                                                    class="value">{{ $item->getProductDetails()->details }}</span>
                                                                            </div>
                                                                            <div> <span class="value"></span></div>
                                                                            <div> <span class="value"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 quantity">
                                                                    <label for="quantity">Quantity:</label>
                                                                    <input id="quantity" type="number" value="1"
                                                                        class="form-control quantity-input">
                                                                </div>
                                                                <div class="col-md-3 price">
                                                                    <span>{{ '$' . $item->getProductDetails()->price }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="summary">
                                        <h3>Summary</h3>
                                        <div class="summary-item"><span class="text">Subtotal</span><span
                                                class="price"> {{'SGD' . $summary }}</span></div>
                                        <div class="summary-item"><span class="text">Discount</span><span class="price">SDG
                                                0</span></div>
                                        <div class="summary-item"><span class="text">Shipping</span><span class="price">SDG
                                                0</span></div>
                                        <div class="summary-item"><span class="text">Total</span><span
                                                class="price"> {{'SGD' . $summary }}</span></div>
                                        <a href="{{ route('checkout') }}"
                                            class="btn btn-primary btn-lg btn-block">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection
