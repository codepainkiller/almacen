@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Producto</button>
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
                            <th>P. De Venta</th>
                            <th>P. De Compra</th>
                            <th>Stock</th>
                            <th>Ventas</th>
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
@include('products.modals.addStock')

@stop

@section('js-content')
<script src="{{ asset('js/products.js') }}"></script>
@stop

@section('css-content')

@stop
