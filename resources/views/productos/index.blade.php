@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
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
                <button type="button" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
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