<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $ordersdetails = OrderDetails::all();

        return view('admin.orders.index', compact('orders', 'ordersdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $request->all();
        $order_id = Order::create($order)->id;
        $carts =Cart::where('user_id',Auth::user()->id)->get();

        foreach ($carts as $key => $cart) {
            $orderdetails = new OrderDetails();
            $orderdetails->order_id= $order_id;
            $orderdetails->sub_total=$cart->price;
            $orderdetails->product_id=$cart->product_id;
            $orderdetails->quantity=$cart->quantity;
            $orderdetails->save();
        }
        Cart::where('user_id',Auth::user()->id)->delete();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}