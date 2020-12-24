<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
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
        $products = Product::paginate(5);
        return view('admin.product.index',compact('products'));
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
        $status = Product::createProduct($request);

        return redirect()->route('product')
        ->with('success', $status ? 'Product added successfully...' : 'Error');
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
        
        if ($request->hasFile('img_path')) {
            $image       = $request->file('img_path');
            
            $filename    = $image->getClientOriginalName();
    
            //Fullsize
            $image->move(public_path().'/images/products/',$filename);
    
            $image_resize = Image::make(public_path().'/images/products/'.$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('/images/products/' .$filename));
            //dd($image);
            $path =public_path().'/images/products/'.$filename;
                       
        }
        
 
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
