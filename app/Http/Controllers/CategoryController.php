<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            return Category::findOrFail($id);
        }

        return redirect('categorias');
    }

    public function store(Request $request)
    {
        Category::create($request->except('_token'));

        flash()->success('Registrado', 'La categoría se guardó correctamente.');

        return redirect('categorias');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        flash()->success('Actualizado', 'La categoría se actualizo correctamente.');

        return redirect('categorias');
    }

    public function destroy($id)
    {
        $updatedRows = Product::where('category_id', $id)->update(['category_id' => 1]);

        if ($updatedRows) {
            Category::findOrFail($id)->delete();

            flash()->success('Eliminado', 'La categoría ha sido eliminada.');
        } else {
            flash()->overlay('No permitido', 'No se pudo eliminar, existen productos asociados a esta categoría', 'error');
        }

        return redirect('categorias');
    }
}
