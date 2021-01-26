<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'sub_total', 'product_id', 'quantity'];

    function Order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    function Product()
    {
        return $this->hasMany(Product::class,'order_id');
    }
}