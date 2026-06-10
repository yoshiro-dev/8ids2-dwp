<?php

use App\Http\Controllers\ProductosController;

use App\Http\Controllers\AlmacenController;

use Illuminate\Support\Facades\Route;
// Comando creado para corregir error de Auth
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/producto/nuevo', [ProductosController::class, 'create'])->name('producto.nuevo');
Route::get('producto/editar/{id}', [ProductosController::class, 'edit'])->name('producto.editar');
Route::post('/producto/guardar', [ProductosController::class, 'store'])->name('producto.guardar');
Route::delete('producto/eliminar/{id}', [ProductosController::class, 'delete'])->name('producto.eliminar');
Route::get('productos', [ProductosController::class, 'index'])->name('producto.index');

Route::get('almacen/nuevo', [AlmacenController::class, 'create'])->name('almacen.nuevo');
Route::get('almacen/editar/{id}', [AlmacenController::class, 'edit'])->name('almacen.editar');
Route::post('almacen/guardar', [AlmacenController::class, 'store'])->name('almacen.guardar');
Route::delete('almacen/eliminar/{id}', [AlmacenController::class, 'delete'])->name('almacen.eliminar');
Route::get('almacen', [AlmacenController::class, 'index'])->name('almacen.index');

if (app()->environment('local')) {
    Route::get('/error/{code}', function ($code) {
        $code = (int) $code;
        $allowedCodes = [401, 402, 403, 404, 419, 429, 500, 503];

        if (! in_array($code, $allowedCodes)) {
            abort(404);
        }

        abort($code);
    });
}
