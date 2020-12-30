<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $fillable = ['product_id','user_id'];

    function user()
    {
        $this->belongsTo(App\Models\User::Class);
    }

    function product()
    {
        $this->hasMany(App\Models\product::Class);
    }

    static function getall()
    {
        $cart = CartDetails::all();
        
        return $cart;
    }
}
