@extends('adminlte::page')

@section('title', 'Lista de Productos')

@section('content_header')
<h1>Lista de Productos</h1>
{{ Breadcrumbs::render('producto.index') }}
@stop

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Existencia</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <th scope="row">{{ $producto->id }}</th>
            <td>{{ $producto->codigo }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->existencia }}</td>
            <td>
                <a href="{{ route('producto.editar', $producto->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('producto.eliminar', $producto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop