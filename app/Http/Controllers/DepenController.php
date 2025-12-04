<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia;
use Illuminate\Support\Facades\Storage;



class DepenController extends Controller
{
    // Panel principal de la dependencia
    public function panel($id)
    {
        $dep = Dependencia::findOrFail($id);
        return view('dependencia.panel', compact('dep'));
    }


    // Vista para subir archivos
    public function subir($id)
{
    $dep = Dependencia::findOrFail($id);
    return view('dependencia.subir', compact('dep'));
}


    // Vista de archivos subidos
    public function lista($id)
{
    $dep = Dependencia::findOrFail($id);

    $carpeta = "archivos_dependencias/$id";

    // Obtiene solo los archivos de ESA dependencia
    $archivos = Storage::files($carpeta);

    return view('dependencia.lista', compact('dep', 'archivos'));
}


    // Información del perfil
    public function perfil()
    {
        return view('dependencia.perfil');
    }

    public function save(Request $request, $id)
{
    $dep = Dependencia::findOrFail($id);

    // Aquí guardas el archivo
    $request->validate([
        'archivo' => 'required|file'
    ]);

    $depId = $dep->id;
$archivo = $request->file('archivo')->store("archivos_dependencias/$depId");

    return redirect()->back()->with('ok', 'Archivo subido correctamente');
}


public function subirSave(Request $request, $id)
{
    $dep = Dependencia::findOrFail($id);

    $request->validate([
        'archivo' => 'required|file',
    ]);

    // Guardar en carpeta separada por dependencia
    $request->file('archivo')->store("archivos_dependencias/$dep->id");

    return redirect()->back()->with('ok', 'Archivo subido correctamente');
}

}
