@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <h4>Ingreso Total</h4>
                                <span class="price">s/ {{ $income }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <h4>Ganancia Total</h4>
                                <span class="price">s/ {{ $earnings }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
