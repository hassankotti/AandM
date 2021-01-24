<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $cart = Cart::all();
        dd($cart);

        /*$summary = Cart::selectRaw('sum(sub_total) as summary')
            ->groupBy('user_id')
            ->get();*/
        //return view('cart.index', compact('cart', 'summary'));
    }

    function store(Request $request)
    {
        $qty = 1;
        $cartDetails = new Cart();
        $cartDetails->user_id =  Auth::user()->id;
        $cartDetails->product_id = $request->product_id;
        $cartDetails->price = $request->price;
        
        $cartDetails->sub_total = $cartDetails->price * $qty;
        dd($cartDetails);

        $cartDetails->save();
        $cart = Cart::all();
        return view('cart.index', compact('cart'));
    }

    function checkout(Request $request)
    {
        return view('cart.checkout');
    }
}