@extends('adminlte::page')

@section('title', 'Lista de Productos')

@section('content_header')
<h1>Lista de Productos</h1>
{{ Breadcrumbs::render('producto.index') }}
@stop

@section('content')
<form action="{{ route('producto.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="buscar"
            class="form-control"
            value="{{ $buscar ?? '' }}"
            placeholder="Buscar por codigo o nombre">

        <button type="submit" class="btn btn-primary">Buscar</button>

        @if(!empty($buscar))
            <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        @endif
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Existencia</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
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
        @empty
        <tr>
            <td colspan="6" class="text-center">
                @if(!empty($buscar))
                    No se encontraron productos para "{{ $buscar }}".
                @else
                    No hay productos registrados.
                @endif
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@if($productos->hasPages())
    <div class="mt-3">
        {{ $productos->onEachSide(1)->links() }}
    </div>
@endif
@stop

@section('css')
@stop

@section('js')
@stop
