<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id', 'user_id','quantity'];

    function user()
    {
        $this->belongsTo(App\Models\User::Class);
    }

    function product()
    {
        $this->hasMany(App\Models\product::Class);
    }

    function getProductDetails()
    {
        return Product::find($this->product_id);
    }
}