<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function index()
    {
        $dependencias = Dependencia::all();
        return view('administrador.dependencias.index', compact('dependencias'));
    }

    public function create()
    {
        return view('administrador.dependencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Dependencia::create($request->all());
        return redirect()->route('admin.dependencias.index');
    }

    public function edit(Dependencia $dependencia)
{
    return view('administrador.dependencias.edit', compact('dependencia'));
}

    public function update(Request $request, Dependencia $dependencia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $dependencia->update($request->all());
        return redirect()->route('admin.dependencias.index');
    }

    public function destroy(Dependencia $dependencia)
    {
        $dependencia->delete();
        return redirect()->route('admin.dependencias.index');
    }
}
