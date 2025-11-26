<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = Administrador::orderBy('id','desc')->paginate(10);
        return view('administrador.index', compact('administradores'));
    }

    public function create()
    {
        return view('administrador.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:administradors,email',
            'telefono' => 'nullable|string|max:50',
        ]);

        Administrador::create($data);

        return redirect()->route('administradors.index')->with('success', 'Administrador creado.');
    }

    public function show(Administrador $administrador)
    {
        return view('administrador.show', compact('administrador'));
    }

    public function edit(Administrador $administrador)
    {
        return view('administrador.edit', compact('administrador'));
    }

    public function update(Request $request, Administrador $administrador)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:administradors,email,'.$administrador->id,
            'telefono' => 'nullable|string|max:50',
        ]);

        $administrador->update($data);

        return redirect()->route('administradors.index')->with('success', 'Administrador actualizado.');
    }

    public function destroy(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('administradors.index')->with('success', 'Administrador eliminado.');
    }
}
