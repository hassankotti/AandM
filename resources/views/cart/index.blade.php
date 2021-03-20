@extends('layouts.master')
@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            @if (Count($cart) == 0)
                <div class="py-4 text-center">
                    <img width="300" class="repoonsive" src="{{ asset('assets/images/cart.svg') }}" alt="emptycart">
                    <div class="text-center">
                        <strong class="text-center title">Your cart is empty</strong>
                        <p class="text-center description"> You have items in your wishlist. To buy items from your
                            wishlist, move them to your cart.</p>
                        <a class="btn btn-primary" href="{{ route('home') }}"><span class="dyoqji-1 cxTMkg">Continue
                                Shopping</span></a>
                    </div>
                </div>
            @else
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title h2">
                                <i class="fa fa-shopping-cart"></i><span class="ml-2">Shopping Cart</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @foreach ($cart as $item)
                                        <div class="mb-3 border-0 card">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{ asset($item->getProductDetails()->img_path) }}"
                                                        class="card-img" alt="...">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <h5 class="card-text">{{ $item->getProductDetails()->name }}</h5>
                                                        <p class="card-text"><span
                                                                class="text-muted">{{ number_format($item->getProductDetails()->price, 0, '.', ',') . ' SDG' }}</span>
                                                        </p>
                                                        <div class="card-text">
                                                            <form id="quantity-change-form"
                                                                action="{{ route('cart.add') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="cart_id"
                                                                    value="{{ $item->id }}">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $item->product_id }}">
                                                                <input type="number" value="{{ $item->quantity }}"
                                                                    class="form-control quantity-input"
                                                                    onchange="event.preventDefault();
                                                                                                                            document.getElementById('quantity-change-form').submit();"
                                                                    name="quantity">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="pull-right">
                                                        <form action="{{ route('cart.destroy') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="cart_id"
                                                                value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-md-4 order-md-2">
                    <div class="card" style="width: 18rem;">
                        <ul class="mb-3 list-group list-group-flush">
                            <h4 class="p-4 d-flex justify-content-between align-items-center card-header">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill">{{ Count($cart) }}</span>
                            </h4>

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

                        <form class="p-2 card-footer">
                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg btn-block">Checkout</a>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
