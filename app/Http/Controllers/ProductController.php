<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            return Product::findOrFail($id);
        }

        return redirect('products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->except('_token'));

        flash()->success('Registrado', 'El producto se guardó correctamente.');

        return redirect('/products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        flash()->success('Actualizado', 'El producto se actualizó correctamente.');

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        flash()->success('Eliminado', 'El producto ha sido eliminado.');

        return redirect()->back();
    }

    public function addStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->stock += $request->get('count');
        $product->save();

        return $product;
    }

    public function datatable()
    {
        $products = Product::with('category')->select('products.*');

        return Datatables::of($products)
            ->addColumn('actions', function($product) {
                return "
                <a href='#' class='text-warning' data-name='{$product->name}' data-id='{$product->id}'>
                    <span class='glyphicon glyphicon-plus-sign'></span> Añadir
                </a>
                <a href='#' class='text-success' data-id='{$product->id}'>
                    <span class='glyphicon glyphicon-pencil'></span> Editar
                </a>
                <a href='#' class='text-danger' data-id='{$product->id}'>
                    <span class='glyphicon glyphicon-trash'></span> Eliminar
                </a>";
            })
            ->editColumn('name', function($product) {
                return strtoupper($product->name);
            })
            ->editColumn('sale_price', function($product) {
                $format = number_format($product->sale_price, 2, ',', ' ');
                return "s/ <code class='bg-warning'>{$format}</code>";
            })
            ->editColumn('purchase_price', function($product) {
                $format = number_format($product->purchase_price, 2, ',', ' ');
                return "s/ {$format}";
            })
            ->make(true);
    }
}
