<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = "cart_products";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
