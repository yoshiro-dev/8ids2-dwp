<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function create()
    {
        $almacen = new Almacen(); 
        return view('almacen.create', compact('almacen'));
    }

    public function edit($id)
    {
        $almacen = Almacen::find($id); 
        return view('almacen.create', compact('almacen'));
    }

    public function delete($id)
    {
        $almacen = Almacen::find($id);
        $almacen->delete();
        return redirect()->route('almacen.index');
    }

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $almacenes = Almacen::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('codigo', 'LIKE', "%{$buscar}%")
                        ->orWhere('nombre', 'LIKE', "%{$buscar}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view("almacen.index", compact('almacenes', 'buscar'));
    }

    public function store(Request $request)
    {
        if ($request->id == 0) {
            $almacen = new Almacen();
        } else {
            $almacen = Almacen::find($request->id);
        }

        $almacen->codigo = $request->codigo;
        $almacen->nombre = $request->nombre;
        
        $almacen->save();

        return redirect()->route('almacen.index'); 
    }
}
