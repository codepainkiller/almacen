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
            ->addColumn('income', function($product) {
                return 's/ '.number_format($product->sales * $product->sale_price, 2, ',', ' ');
            })
            ->addColumn('earnings', function($product) {
                $earnings = $product->sales * ($product->sale_price - $product->purchase_price);
                return 's/ ' . number_format($earnings, 2, ',', ' ');
            })
            ->editColumn('sale_price', '{{"s/ " . number_format($sale_price, 2, ",", " ") }}')
            ->editColumn('purchase_price', '{{"s/ " . number_format($purchase_price, 2, ",", " ") }}')
            ->make(true);
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $count = $request->get('count');

        if ($product) {
            if ($product->stock < $count) {
                return response()->json([
                    'code' => 412,
                    'message' => "Existen {$product->stock} unidades en el almacén"
                ]);
            }

            $product->stock -= $count;
            $product->sales += $count;
            $product->save();

            return response()->json([
                'code' => 202,
                'message' => 'Venta registrada exitosamente.'
            ]);
        }

        return response()->json([
            'code' => 404,
            'message' => 'No se encontró el producto, porfavor intente nuevamente.'
        ]);
    }

    public function listProducts()
    {
        return Product::all();
    }
}
