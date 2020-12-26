<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if($user->isAdmin()){
            $products = Product::paginate(5);
            return view('admin.product.index',compact('products'));
        }

        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product = new Product();
       $path = "";

        $path = ImageHelper::ImageUpload($request,'img_path','/images/products/');

        $product->img_path = $path;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->save();

        return redirect()->route('product')
        ->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = new Product();
        $path = "";

        $path = ImageHelper::ImageUpload($request,'img_path','/images/products/');

        $product= Product::find($id);
        $product->name         = $request->name;
        $product->details      = $request->details;
        $product->price        = $request->price;
        $product->category_id  = $request->category_id;
        $product->img_path     = $path;

        $product->update();
        return redirect()->route('product')
        ->with('success','Product Updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product')
        ->with('success','Product Deleted Successfully');
    }
}