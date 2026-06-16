<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function create()
    {
        $producto = new Producto(); 
        return view('productos.create', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::find($id); 
        return view('productos.create', compact('producto'));
    }

    public function delete($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }

    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));
        $termino = '%' . mb_strtolower($buscar, 'UTF-8') . '%';

        $productos = Producto::query()
            ->when($buscar !== '', function ($query) use ($termino) {
                $query->where(function ($q) use ($termino) {
                    $q->whereRaw('LOWER(codigo) LIKE ?', [$termino])
                        ->orWhereRaw('LOWER(nombre) LIKE ?', [$termino]);
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();
        
        return view("productos.index", compact('productos', 'buscar'));
    }

    public function store(Request $request)
    {
        if ($request->id == 0) {
            $producto = new Producto();
        } else {
            $producto = Producto::find($request->id);
        }

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->impuesto = $request->impuesto; 
        $producto->existencia = $request->existencia;
        
        $producto->save();

        return redirect()->route('producto.index'); 
    }
}
