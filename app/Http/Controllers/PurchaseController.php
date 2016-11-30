<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('created_at', 'desc')->with('product')->paginate(20);

        return view('purchases.index', compact('purchases'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->get('product_id'));

        if ($product) {
            $product->stock += $request->get('units');
            $product->save();

            $request->offsetSet('registered_by', auth()->user()->name);
            Purchase::create($request->all());

            flash()->success('Registrado', 'Las nuevas unidades fueros agregadas al almacén.');
        } else {
            flash()->error('Error', 'Revise los datos ingresados e intente nuevamente.');
        }

        return redirect('compras');
    }
}
