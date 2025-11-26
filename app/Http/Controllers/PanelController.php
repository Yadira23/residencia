<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\Administrador; // o User, según tu proyecto

class PanelController extends Controller
{
    public function index()
    {
        // Count reales que sí existen
        $totalDependencias = Dependencia::count();

        // Como no existe Cargas, lo ponemos manual
        $totalCargas = 0;

        // Usuarios activos
        $usuariosActivos = Administrador::count(); // o Administrador::where('activo',1)->count();

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
