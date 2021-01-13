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
        $cart = Cart::all();
        //dd($cart);
        return view('cart.index', compact('cart'));
    }

    function store(Request $request)
    {
        $cartDetails = new Cart();
        $cartDetails->user_id =  Auth::user()->id;
        $cartDetails->product_id = $request->product_id;
        dd($request->product_id);
        $cartDetails->save();
        $cart = Cart::all();
        return view('cart.index', compact('cart'));
    }
}