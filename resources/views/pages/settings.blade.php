@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <span class="glyphicon glyphicon-wrench"></span> Ajustes
                </h2>
                <p class="text-info">
                    Configuraciones de sistema.
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <form action="/ajustes" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group">
                        <label>Porcentaje de ganancia en precio de venta (PG)</label>
                        <div class="input-group">
                            <input name="percentage_gain" type="number" class="form-control" value="{{ $settings['percentage_gain'] }}" min="0" max="100">
                            <span class="input-group-addon">%</span>
                        </div>
                        <span class="text-info">precio_venta = precio_compra + (precio_compra x PG)/100</span>
                    </div>
                    <br><br>
                    <button class="btn btn-primary">Actualizar</button>

                </form>
            </div>
        </div>
    </div>
@stop
