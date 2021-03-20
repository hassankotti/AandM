<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HigherOrderTapProxy;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [4215, 5312, 6251, 7841, 9821, 14984];
        $products = Product::all();
        $categories = Category::all();
        $users = User::all();
        $orders = Order::all();
        return view('admin.dashboard', compact('data', 'products', 'categories', 'users','orders'));
    }
}
