@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success" data-toggle="modal" data-target="#registerModal">Registrar Venta</button>
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
                            <th>P. De Compra</th>
                            <th>P. De Venta</th>
                            <th>Cantidad</th>
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
