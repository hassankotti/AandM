@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($myCart==null)
        <div class="text-center py-4">
            <img width="300" class="repoonsive" src="{{ asset('assets/images/cart.svg') }}" alt="emptycart">
            <div class="text-center">
                <strong class="title text-center">Your cart is empty</strong>
                <p class="description text-center"> You have items in your wishlist. To buy items from your wishlist, move them to your cart.</p>
                <button class="btn btn-primary"><span class="dyoqji-1 cxTMkg"><span>Continue Shopping</span></span></button>
            </div>
        </div>
        @else
        <div class="sc-3y0r0f-1 dHAraC">
            <div class="sc-3y0r0f-2 ivlKsH">
                <div class="sc-3y0r0f-0 fnGRId"><strong class="title">Cart</strong><p> (1 items)</p></div>
                <a class="sc-7vj7do-0 ftlAjW" href="/uae-en/product/N41178624A/p?o=b6fb04385a3c667d"><img src="https://a.nooncdn.com/t_desktop-thumbnail-v1/v1603701853/N41178624A_1.jpg" alt="product-image" class="sc-72xyyi-4 bRTmOJ"></a>
            </div>
            <div class="sc-72xyyi-5 bcmzJi"><span class="pane-title">Lenovo</span><h1 class="sc-72xyyi-16 jodXNL">100e Chromebook Laptop With 11.6-Inch Display, AMD A4 Processor/Chrome OS/4GB RAM/32GB eMMC/Integrated AMD Radeon R4 Graphics Black</h1>
                <div class="sc-72xyyi-23 bqomzI">
                <div class="sc-72xyyi-6 jsecOb"><p class="sc-72xyyi-7 kwqftk">Order in the next <strong>19 hrs 4 mins</strong> and receive it by <span class="sc-72xyyi-8 dKLryg">Mon, 28 Dec</span></p></div></div><div class="sc-72xyyi-18 lchhvQ">Sold by <strong>noon</strong></div>
                <div class="sc-72xyyi-19 fsaUOj"><img src="https://a.nooncdn.com/s/app/com/noon/icons/warranty.svg" alt="warranty" class="warranty"><span>1 year warranty</span>
                </div><div class="sc-72xyyi-17 hYAVzv">
                    <img src="https://a.nooncdn.com/s/app/com/noon/icons/non_returnable.svg" alt="non_returnable" class="non_returnable"><span>This item cannot be exchanged or returned</span>
                </div>
                <div class="sc-72xyyi-9 ktmQuE">
                    <div class="sc-72xyyi-12 jRJZFy">
                        <button class="sc-72xyyi-11 htxDpB">
                            <img src="https://a.nooncdn.com/s/app/com/noon/icons/wishlist.svg" alt="cart" class="sc-72xyyi-15 dpjmit"><span class="sc-72xyyi-21 dOaixY">Move to Wishlist</span></button>
                            <button class="sc-72xyyi-11 htxDpB">
                                <img src="https://a.nooncdn.com/s/app/com/noon/icons/trash.svg" alt="remove-item" class="sc-72xyyi-15 dpjmit"><span class="sc-72xyyi-21 dOaixY">Remove</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="sc-72xyyi-24 djzgUz">
            <div class="sc-72xyyi-10 fTRFDc"><span class="sc-72xyyi-20 cAoVXG"><span>AED</span><b>829</b></span>
            </div>
            <div class="sc-72xyyi-13 bksPDW"><span class="sc-72xyyi-14 bPDovU"><div class=" css-2b097c-container">
                <div class=" css-37osca"><div class=" css-1kukzrs">
                    <div class=" css-12c5cnc">1</div>
                    <input id="react-select-4-input" readonly="" tabindex="0" aria-autocomplete="list" class="css-62g3xt-dummyInput" value="">
                </div>
            </div>
        </div>
    </div>
</div></span></div>
<div class="sc-72xyyi-22 gIbvbt">
                            </div><div class="sc-3y0r0f-6 gezuZp"><button type="button" class="ripple" aria-label="Secure Checkout">Continue Shopping</button></div>
            @foreach($myCart as $item)
            <div class="panel">
                   <div class="panel-body">
                        {{ $item->total }}
                   </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
