@extends('layout.app')

@section('content')
<h2>Editar usuario</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}">
    </div>

    <div>
        <label>Apellido paterno</label>
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $usuario->apellido_paterno) }}">
    </div>

    <div>
        <label>Apellido materno</label>
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $usuario->apellido_materno) }}">
    </div>

    <div>
        <label>Usuario</label>
        <input type="text" name="usuario" value="{{ old('usuario', $usuario->usuario) }}">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}">
    </div>

    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}">
    </div>

    <div>
        <label>Dependencia</label>
        <select name="dependencia_id">
            @foreach ($dependencias as $dep)
                <option value="{{ $dep->id }}"
                    {{ $usuario->dependencia_id == $dep->id ? 'selected' : '' }}>
                    {{ $dep->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Estado</label>
        <select name="estado">
            <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>

    <br>

    <button type="submit">Actualizar</button>
    <a href="{{ route('admin.usuarios.index') }}">Cancelar</a>
</form>
@endsection
