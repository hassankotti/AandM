<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_amount', 'placed_by', 'payment_status', 'status', 'address'];

    function OrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}