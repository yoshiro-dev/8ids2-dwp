<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
// Comando creado para corregir error de Auth
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/producto/nuevo', [ProductosController::class, 'create'])->name('producto.nuevo');
Route::post('/producto/guardar', [ProductosController::class, 'store'])->name('producto.guardar');
Route::get('productos', [ProductosController::class, 'index'])->name('producto.index');