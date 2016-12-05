<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $purchases = Purchase::orderBy('created_at', 'desc')->with('product')->get();

        return view('purchases.index', compact('purchases'));
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            return Purchase::with('product')->findOrFail($id);
        }

        return redirect('compras');
    }

    public function store(Request $request)
    {
        $product = Product::find($request->get('product_id'));

        if ($product) {
            $product->stock += $request->get('units');
            $product->purchase_price = $request->get('price');
            $product->save();

            $request->offsetSet('registered_by', auth()->user()->name);
            Purchase::create($request->all());

            flash()->success('Registrado', 'Las nuevas unidades fueros agregadas al almacén.');
        } else {
            flash()->error('Error', 'Revise los datos ingresados e intente nuevamente.');
        }

        return redirect('compras');
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        if ($purchase) {
            $product = $purchase->product;

            $purchase->delete();
            $lastPurchase = Purchase::where('product_id', $purchase->product_id)->first();

            if ($lastPurchase) {
                $product->purchase_price = $lastPurchase->price;
            } else {
                $product->purchase_price = 0;
            }

            $product->stock -= $purchase->units;
            $product->save();

            flash()->success('Eliminado', 'La compra ha sido eliminada.');
        } else {
            flash()->error('Error', 'No se pudo procesar la solicitud.');
        }

        return redirect('compras');
    }
}
