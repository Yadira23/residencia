<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // <--- AQUÍ ERA EL ERROR
        return view('administrador.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $dependencias = Dependencia::all();
        return view('administrador.usuarios.create', compact('dependencias'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'usuario' => 'required|unique:users,usuario',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'dependencia_id' => 'required|exists:dependencias,id',
            'estado' => 'required|in:activo,inactivo',
        ]);


        User::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'dependencia_id' => $request->dependencia_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $dependencias = Dependencia::all();

        return view('administrador.usuarios.edit', compact('usuario', 'dependencias'));
    }
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'usuario' => 'required|unique:users,usuario,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'dependencia_id' => 'required|exists:dependencias,id',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'dependencia_id' => $request->dependencia_id,
        ]);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
