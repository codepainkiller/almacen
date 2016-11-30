<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['units', 'price', 'registered_by', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
