<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable = ['product_id', 'user_id','quantity','price','sub_total'];

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

    function summary()
    {
        $user_id = Auth::user()->id;
        $summary = 0;
        $summary = Cart::where('user_id',$user_id)->sum('sub_total');
        return $summary;

    }
    function truncate()
    {
        //DB::delete('delete carts where user_id = ?', Auth::user()->id);
    }
}