@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
<h1>Crear Producto</h1>
{{ Breadcrumbs::render('producto.nuevo') }}
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('producto.guardar') }}" method="POST">
            {{-- Quita la Protección CSRF para evitar el error 419 --}}
            @csrf

            <input type="hidden" name="id" value="{{ $producto->id }}">

            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" value="{{ $producto->codigo}}" name="codigo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{ $producto->nombre }}" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" value="{{ $producto->precio}}" name="precio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="impuesto">% Impuesto</label>
                <input type="number" step="0.01" value="{{ $producto->impuesto}}" name="impuesto" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="existencia">Existencia</label>
                <input type="number" value="{{ $producto->existencia}}" name="existencia" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop