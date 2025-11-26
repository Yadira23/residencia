@extends('layout.app')

@section('titulo', 'Usuarios')

@section('contenido')
<div class="container-fluid">

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="mb-3">Gestión de Usuarios</h3>

    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">
        + Nuevo Usuario
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Dependencia</th>
                <th>Estado</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($usuarios as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</td>
                <td>{{ $user->usuario }}</td>

                <td>
                    {{ $user->dependencia ? $user->dependencia->nombre : 'Sin asignar' }}
                </td>

                <td>
                    <span class="badge bg-{{ $user->estado == 'activo' ? 'success' : 'secondary' }}">
                        {{ ucfirst($user->estado) }}
                    </span>
                </td>

                <td>{{ $user->telefono }}</td>
                <td>{{ $user->email }}</td>

                <td>
                    <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('admin.usuarios.destroy', $user) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Eliminar este usuario?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        No hay usuarios registrados aún.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
