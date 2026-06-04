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

    public function index()
    {
        $almacenes = Almacen::all();
        return view("almacen.index", compact('almacenes'));
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