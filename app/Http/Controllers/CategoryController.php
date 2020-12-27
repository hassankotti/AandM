<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Helpers\ImageHelper;
use  App\Model\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('check_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $category = new Category();
       $path = "";

        $path = ImageHelper::ImageUpload($request,'img_path','/images/categories/');

        $category->img_path = $path;
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();

        return redirect()->route('category')
            ->with('success','Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        //dd($category);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = new Category();
        $path = "";

        $path = ImageHelper::ImageUpload($request,'img_path','/images/categories/');

        $category= Category::find($id);
        $category->name         = $request->name;
        $category->desc      = $request->desc;
        $category->img_path     = $path;

        $category->update();
        return redirect()->route('category')
        ->with('success','category Updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('Category')
        ->with('success','Category Deleted Successfully');
    }
}