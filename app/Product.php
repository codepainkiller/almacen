<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'stock', 'purchase_price', 'sale_price', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
