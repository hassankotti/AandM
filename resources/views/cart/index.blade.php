@extends('layouts.master')
@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
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
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title h2">
                            <i class="fa fa-shopping-cart"></i><span class="ml-2">Shopping Cart</span>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="conatiner">
                                        @foreach ($cart as $item)
                                        <div class="card mb-3  border-0" style="max-width: 540px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{  asset($item->getProductDetails()->img_path)  }}" class="card-img" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-text">{{ $item->getProductDetails()->name }}</h5>
                                                        <p class="card-text"><span class="text-muted">{{   $item->getProductDetails()->price.' SDG' }}</span></p>
                                                        <div class="card-text">
                                                            <input id="quantity" type="number" value="1"class="form-control quantity-input">
                                                        </div>
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
                    <div class="col-md-12 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <h3 class="card-title">Summary</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Subtotal {{ $cart[0]->summary() }}</li>
                                <li class="list-group-item">Total {{ $cart[0]->summary() }}</li>
                            </ul>
                            <div class="card-footer">
                                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg btn-block">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
