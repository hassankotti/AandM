<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','details','price','img_path','category_id'];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
}
