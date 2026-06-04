@extends('adminlte::page')

@section('title', 'Crear Almacén')

@section('content_header')
<h1>Crear Almacén</h1>
{{ Breadcrumbs::render('almacen.nuevo') }}
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('almacen.guardar') }}" method="POST">
            {{-- Quita la Protección CSRF para evitar el error 419 --}}
            @csrf

            <input type="hidden" name="id" value="{{ $almacen->id }}">

            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" value="{{ $almacen->codigo}}" name="codigo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{ $almacen->nombre }}" name="nombre" class="form-control" required>
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