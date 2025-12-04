<?php


namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\User;

class PanelController extends Controller
{
    public function index()
    {
        // Count reales que sí existen
        $totalDependencias = Dependencia::count();

        // Como no existe Cargas, lo ponemos manual
        $totalCargas = 0;

        // Usuarios activos
        $usuariosActivos = User::where('estado', 'activo')->count();

        // No hay última actualización
        $ultimaActualizacion = null;

        return view('administrador.panel', compact(
            'totalDependencias',
            'totalCargas',
            'usuariosActivos',
            'ultimaActualizacion'
        ));
    }
}
