    @extends('adminlte::page')

    @section('title', 'Lista de Almacenes')

    @section('content_header')
    <h1>Lista de Almacenes</h1>
    {{ Breadcrumbs::render('almacen.index') }}
    @stop

    @section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($almacenes as $almacen)
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
            @endforeach
        </tbody>
    </table>
    @stop

    @section('css')
    @stop

    @section('js')
    @stop