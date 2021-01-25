<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['order_id', 'sub_total', 'product_id', 'quantity'];
}