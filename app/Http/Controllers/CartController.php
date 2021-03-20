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
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index', compact('cart'));
    }

    function store(Request $request)
    {



        if (Cart::where('product_id', $request->product_id)->exists()) {
            $cartDetails = Cart::where('product_id', $request->product_id)->first();
            $cartDetails->quantity = $cartDetails->quantity + 1;
            $cartDetails->sub_total = $cartDetails->price * $cartDetails->quantity;
            $cartDetails->update();
        } else {
            $cartDetails = new Cart();
            $cartDetails->user_id =  Auth::user()->id;
            $cartDetails->product_id = $request->product_id;
            $cartDetails->price = $request->price;
            $cartDetails->quantity = 1;
            $cartDetails->sub_total = $cartDetails->price;
            $cartDetails->save();
        }
        return redirect()->route('home');
    }


    public function add(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->quantity = $request->quantity;
        $cart->sub_total = $request->quantity * $cart->price;
        $cart->update();
        return redirect()->back();
    }


    function checkout(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.checkout', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->delete();
        return redirect()->route('cart')
            ->with('success', 'Item Deleted Successfully');
    }
}