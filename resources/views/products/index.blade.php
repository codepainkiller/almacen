@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">

            <buttton class="btn btn-primary pull-right" data-toggle="modal" data-target="#createModal">Agregar Producto</buttton>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código <br></th>
                        <th>Nombre <br></th>
                        <th>Categoría <br></th>
                        <th>Stock</th>
                        <th>P. De Compra</th>
                        <th>P. De Venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>s/ {{ number_format($product->purchase_price, 2, ',', ' ') }}</td>
                            <td>s/ {{ number_format($product->sale_price, 2, ',', ' ') }}</td>
                            <td>
                                {{--
                                <a href="#" class="text-success">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                </a> --}}
                                <a href="#" class="text-danger" onclick="confirm({{ $product->id }})">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                                </a>

                            </td>
                        </tr>

         @endforeach
                <tbody>
                    <!-- Dynamic content-->
                </tbody>
            </table>
            <div class="text-center">
                {{ $products->render() }}
            </div>
        </div>
    </div>
</div>

<form id="destroy-form" action="{{ route('products.destroy', '_id') }}" method="POST" style="display: none;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>

@include('products.modals.create')

@stop

@section('js-content')
<script>
    function confirm(id) {

        swal({
            title: "¿Esta seguro?",
            text: "Se eliminará permanentemente!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar",
            closeOnConfirm: false
        },
        function(){
            var form = $('#destroy-form');
            var url = form.attr('action').replace('_id', id);
            form.attr('action', url);
            form.submit();
        });
    }
</script>
@stop
