<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function datatable()
    {
        $products = Product::all();

        return Datatables::of($products)
            ->addColumn('subtotal', function($product) {
                return "s/ " . number_format($product->sales * $product->sale_price, 2, ',', ' ');
            })
            ->editColumn('sale_price', '{{"s/ " . number_format($sale_price, 2, ",", " ") }}')
            ->make(true);
    }
}
