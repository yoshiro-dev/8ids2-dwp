<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();

        return response()->json([
            'error' => '',
            'productos' => $productos,
        ]);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'error' => 'No existe el producto',
                'producto' => null,
            ], 404);
        }

        return response()->json([
            'error' => '',
            'producto' => $producto,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
            'nombre' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'impuesto' => 'nullable|numeric|min:0',
            'existencia' => 'required|integer|min:0',
        ]);

        $producto = Producto::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'impuesto' => $request->impuesto ?? 0,
            'existencia' => $request->existencia,
        ]);

        return response()->json([
            'error' => '',
            'mensaje' => 'Producto creado',
            'producto' => $producto,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'error' => 'No existe el producto',
                'producto' => null,
            ], 404);
        }

        $request->validate([
            'codigo' => 'sometimes|required|string',
            'nombre' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric|min:0',
            'impuesto' => 'nullable|numeric|min:0',
            'existencia' => 'sometimes|required|integer|min:0',
        ]);

        $producto->fill($request->only(['codigo', 'nombre', 'precio', 'impuesto', 'existencia']));
        $producto->save();

        return response()->json([
            'error' => '',
            'mensaje' => 'Producto actualizado',
            'producto' => $producto,
        ]);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'error' => 'No existe el producto',
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'error' => '',
            'mensaje' => 'Producto eliminado',
        ]);
    }
}
