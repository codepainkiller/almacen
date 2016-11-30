@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <span class="glyphicon glyphicon-usd"></span> Ventas
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#registerModal">
                        <span class="glyphicon glyphicon-save"></span> Registrar Venta
                    </button>
                </h2>

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
                            <th>P. de Compra</th>
                            <th>P. de Venta</th>
                            <th>Unidades</th>
                            <th>Ingreso</th>
                            <th>Ganancia</th>
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

    @include('sales.modals.register')

@stop

@section('js-content')
    <script src="{{ asset('js/sales.js') }}"></script>
@stop

@section('css-content')

@stop
