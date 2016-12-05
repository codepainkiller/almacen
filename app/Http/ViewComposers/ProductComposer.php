<?php

namespace App\Http\ViewComposers;


use App\Product;
use Illuminate\View\View;

class ProductComposer
{
    protected $products;

    public function __construct()
    {
        $this->products = Product::orderBy('name')->get();
    }

    public function compose(View $view)
    {
        $view->with('products', $this->products);
    }
}