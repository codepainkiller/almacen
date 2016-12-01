@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
                <span class="glyphicon glyphicon-apple"></span> Productos

                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createModal">
                    <span class="glyphicon glyphicon-save"></span> Registrar Producto
                </button>
            </h2>
            <p class="text-info">
                Este módulo es para tener un inventario de tu tienda.
                El<strong> Precio de Compra</strong> se actualiza según el <a href="/compras">Módulo de Compras</a>.
            </p>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive ">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio de Venta</th>
                            <th>Precio de Compra</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic content-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form id="destroy-form" action="{{ route('products.destroy', ':id') }}" method="POST" style="display: none;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>

@include('products.modals.create')
@include('products.modals.edit')

@stop

@section('js-content')
<script src="{{ asset('js/products.js') }}"></script>
@stop

@section('css-content')

@stop
