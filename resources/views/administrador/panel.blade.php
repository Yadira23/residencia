@extends('layout.app')
@section('titulo', 'Inicio')
@section('contenido')
<div class="content-body" style="padding: 30px;">

    <h2 style="margin-bottom: 25px;">Panel del Administrador</h2>

    <div class="stats-grid" id="statsGrid" 
        style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">

        <!-- Total Dependencias -->
        <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center;">
            <div class="stat-value" style="font-size: 30px; font-weight: bold;">
                {{ $totalDependencias }}
            </div>
            <div class="stat-label" style="font-size: 16px; color: #555;">Total Dependencias</div>
        </div>

        <!-- Total de Cargas -->
        <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center;">
            <div class="stat-value" style="font-size: 30px; font-weight: bold;">
                {{ $totalCargas }}
            </div>
            <div class="stat-label" style="font-size: 16px; color: #555;">Total de Cargas</div>
        </div>

        <!-- Última Actualización -->
        <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center;">
            <div class="stat-value" style="font-size: 30px; font-weight: bold;">
             {{ $ultimaActualizacion ? $ultimaActualizacion : 'Sin registros' }}
            </div>
            <div class="stat-label" style="font-size: 16px; color: #555;">Última Actualización</div>
        </div>

        <!-- Usuarios Activos -->
        <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center;">
           <div class="stat-card">
    <div class="stat-value">{{ $usuariosActivos }}</div>
    <div class="stat-label">Usuarios Activos</div>
</div>

        </div>

    </div>
</div>
@endsection
