<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categoreis = Category::all();
        $categorey = Category::where('name','=', $request->q)->get();
        dd($categorey->id);
        $products = Product::where('category_id','=', $categorey->id);
        return view('index', compact('categoreis', 'products'));
    }
}