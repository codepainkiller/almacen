@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Crear Categoría</button>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="@if($loop->first) active @endif">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($loop->first)
                                            <span class='text-muted'><span class='glyphicon glyphicon-pencil'></span> Editar</span>
                                            <span class='text-muted'><span class='glyphicon glyphicon-trash'></span> Eliminar</span>
                                        @else
                                            <a href='#' class='text-success' data-id='{{ $category->id }}'>
                                                <span class='glyphicon glyphicon-pencil'></span> Editar
                                            </a>
                                            <a href='#' class='text-danger' data-id='{{ $category->id }}'>
                                                <span class='glyphicon glyphicon-trash'></span> Eliminar
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="destroy-form" action="{{ route('categorias.destroy', ':id') }}" method="POST" style="display: none;">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>

    @include('categories.modals.create')
    @include('categories.modals.edit')

@stop

@section('js-content')
    <script src="{{ asset('js/categories.js') }}"></script>
@stop

@section('css-content')

@stop
