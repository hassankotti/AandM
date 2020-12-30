<?php

namespace App\Http\Controllers;

use App\Model\CartDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Product;

class CartDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $Cart = CartDetails::all();
        return view('cart.index',compact('Cart'));
    }

    function store(Request $request)
    {
        $cartDetails = new CartDetails();
        $cartDetails->user_id =  Auth::user()->id;
        $cartDetails->product_id = $request->product_id;
        //dd($cartDetails);
        $cartDetails->save();
        $cart = CartDetails::all();
        return view('cart.index',compact('cart'));
    }
}
