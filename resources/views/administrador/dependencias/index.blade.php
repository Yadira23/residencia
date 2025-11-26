@extends('layout.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Listado de Dependencias</h2>

    <a href="{{ route('admin.dependencias.create') }}" class="btn btn-primary mb-3">
        + Nueva Dependencia
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre de la Dependencia</th>
                <th>Sector</th>
                <th>Email</th>
                <th>Extensión</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dependencias as $dependencia)
                <tr>
                    <td>{{ $dependencia->id }}</td>
                    <td>{{ $dependencia->nombre }}</td>
                    <td>{{ $dependencia->sector }}</td>
                    <td>{{ $dependencia->email }}</td>
                    <td>{{ $dependencia->extension }}</td>
                    <td>{{ $dependencia->telefono }}</td>
                    <td>{{ $dependencia->direccion }}</td>

                    <td>
                        <a href="{{ route('admin.dependencias.edit', $dependencia) }}"
                           class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('admin.dependencias.destroy', $dependencia) }}" 
                              method="POST" 
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('¿Seguro que deseas eliminar?')" 
                                    class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
