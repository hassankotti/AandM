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
}
