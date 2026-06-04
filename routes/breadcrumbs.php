<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('home'));
});

// Productos 
Breadcrumbs::for('producto.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Productos', route('producto.index'));
});

// Productos > Nuevo
Breadcrumbs::for('producto.nuevo', function (BreadcrumbTrail $trail) {
    $trail->parent('producto.index');
    $trail->push('Nuevo', route('producto.nuevo'));
});

// Productos > Editar
Breadcrumbs::for('producto.editar', function (BreadcrumbTrail $trail, $producto) {
    $trail->parent('producto.index');
    $trail->push($producto->nombre, route('almacen.editar', $producto));
});

// Almacén
Breadcrumbs::for('almacen.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Almacén', route('almacen.index'));
});

// Almacén > Nuevo
Breadcrumbs::for('almacen.nuevo', function (BreadcrumbTrail $trail) {
    $trail->parent('almacen.index');
    $trail->push('Nuevo', route('almacen.nuevo'));
});

// Almacén > Editar
Breadcrumbs::for('almacen.editar', function (BreadcrumbTrail $trail, $almacen) {
    $trail->parent('almacen.index');
    $trail->push($almacen->nombre, route('almacen.editar', $almacen));
});