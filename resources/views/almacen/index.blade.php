@extends('adminlte::page')

@section('title', 'Lista de Almacenes')

@section('content_header')
<h1>Lista de Almacenes</h1>
{{ Breadcrumbs::render('almacen.index') }}
@stop

@section('content')
<form action="{{ route('almacen.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="buscar"
            class="form-control"
            value="{{ $buscar ?? '' }}"
            placeholder="Buscar por codigo o nombre">

        <button type="submit" class="btn btn-primary">Buscar</button>

        @if(!empty($buscar))
            <a href="{{ route('almacen.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        @endif
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($almacenes as $almacen)
        <tr>
            <th scope="row">{{ $almacen->id }}</th>
            <td>{{ $almacen->codigo }}</td>
            <td>{{ $almacen->nombre }}</td>
            <td>
                <a href="{{ route('almacen.editar', $almacen->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('almacen.eliminar', $almacen->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">
                @if(!empty($buscar))
                    No se encontraron almacenes para "{{ $buscar }}".
                @else
                    No hay almacenes registrados.
                @endif
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $almacenes->links() }}
@stop

@section('css')
@stop

@section('js')
@stop
