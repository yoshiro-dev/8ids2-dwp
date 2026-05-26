<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function create()
    {
        return view('productos.create');
    }

        public function index()
    {
        return view('productos.index');
    }

    public function store(Request $request)
    {
        $producto = new Producto();

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->impuesto = $request->impuesto; 
        $producto->existencia = $request->existencia;
        
        $producto->save();

        return "Producto creado correctamente!!";
        
    }
}
