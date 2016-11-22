@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">

            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createModal">Agregar Producto</button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>P. De Venta</th>
                        <th>P. De Compra</th>
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

<form id="destroy-form" action="{{ route('products.destroy', ':id') }}" method="POST" style="display: none;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>

@include('products.modals.create')
@include('products.modals.edit')

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
            var url = form.attr('action').replace(':id', id);
            form.attr('action', url);
            form.submit();
        });
    }

    $('table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        "processing": true,
        "serverSide": true,
        "ajax": "/api/products",
        "columns": [
            {data: 'id', name: 'products.id'},
            {data: 'name'},
            {data: 'sale_price'},
            {data: 'purchase_price'},
            {data: 'stock'},
            {data: 'category.name', name: 'category.name'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
    });

    $('tbody').on('click', '.text-success', function () {
        var id = $(this).data('id');
        var form = $('#editForm');
        var url = form.attr('action').replace(':id', id);
        form.attr('action', url);

        $.get('/products/' + id, function (product) {
            $('#name').val(product.name);
            $('#purchase_price').val(product.purchase_price);
            $('#stock').val(product.stock);
            $('#category_id').val(product.category_id);
            $('#sale_price').val(product.sale_price);

            $('#editModal').modal('show');
        });
    });

    $('tbody').on('click', '.text-danger', function () {
        confirm($(this).data('id'));
    });

</script>
@stop

@section('css-content')

@stop
