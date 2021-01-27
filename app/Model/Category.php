<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'desc'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}