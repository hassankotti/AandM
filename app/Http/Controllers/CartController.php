<?php

namespace App\Http\Controllers;

use App\Model\Cart;
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
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        return view('cart.index', compact('cart'));
    }

    function store(Request $request)
    {
        $qty = 1;
        $cartDetails = new Cart();
        $cartDetails->user_id =  Auth::user()->id;
        $cartDetails->product_id = $request->product_id;
        $cartDetails->price = $request->price;

        $cartDetails->sub_total = $cartDetails->price * $qty;

        $cartDetails->save();
        return redirect()->route('home');
    }

    function checkout(Request $request)
    {
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        return view('cart.checkout',compact('cart'));
    }
}