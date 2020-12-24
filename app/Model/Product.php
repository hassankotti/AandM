<?php

namespace App\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;

class Product extends Model
{
    protected $fillable = ['name','details','price','img_path','category_id'];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public static function createProduct(Request $request){
        $product = new Product();
        $path = "";
        
        if ($request->hasFile('img_path')) {
            $image       = $request->file('img_path');
            $filename    = 'IMG-'.time().'.'.$request->file('img_path')->getClientOriginalExtension();
            $image->move(public_path().'/images/products/',$filename);
            $image_resize = Image::make(public_path().'/images/products/'.$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('/images/products/' .$filename));
            $path ='/images/products/'.$filename;     
        }
        
        $product->img_path = $path;
        // $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->details = $request->details;
        return $product->save();
    }

}
