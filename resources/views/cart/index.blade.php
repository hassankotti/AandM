@extends('layouts.master')
@section('content')
<div class="container">
    <div class="">
        @if(Count($Cart)==0)
        <div class="text-center py-4">
            <img width="300" class="repoonsive" src="{{ asset('assets/images/cart.svg') }}" alt="emptycart">
            <div class="text-center">
                <strong class="title text-center">Your cart is empty</strong>
                <p class="description text-center"> You have items in your wishlist. To buy items from your wishlist, move them to your cart.</p>
                <a class="btn btn-primary" href="{{ route('home') }}"><span class="dyoqji-1 cxTMkg">Continue Shopping</span></a>
            </div>
        </div>
        @else
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
                              @foreach($Cart as $item)
				 				<div class="product"> 
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="assets/img/image.jpg">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#">Lorem Ipsum dolor</a>
								 							<div class="product-info">
									 							<div>Display: <span class="value">5 inch</span></div>
									 							<div>RAM: <span class="value">4GB</span></div>
									 							<div>Memory: <span class="value">32GB</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value="1" class="form-control quantity-input">
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>$120</span>
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
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
        @endif
    </div>
</div>
@endsection
