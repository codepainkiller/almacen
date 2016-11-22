@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

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
                            <th>Cantidad</th>
                            <th>Subtotal</th>
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

@stop

@section('js-content')
    <script src="{{ asset('js/sales.js') }}"></script>
@stop

@section('css-content')

@stop
