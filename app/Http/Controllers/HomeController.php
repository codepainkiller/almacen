<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $income = $products->reduce(function($carry, $product) {
            return $carry + ($product->sale_price * $product->sales);
        });

        $earnings = $products->reduce(function($carry, $product) {
            return $carry + ($product->sales * ($product->sale_price -$product->purchase_price));
        });

        return view('home', compact('income', 'earnings'));
    }
}
