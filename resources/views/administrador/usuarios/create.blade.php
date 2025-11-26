@extends('layout.app')

@section('titulo', 'Crear Usuario')

@section('contenido')

<div class="container">

    <form action="{{ route('admin.usuarios.store') }}" method="POST">
        @csrf

        <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre">
        <input type="text" name="apellido_paterno" class="form-control mb-2" placeholder="Apellido Paterno">
        <input type="text" name="apellido_materno" class="form-control mb-2" placeholder="Apellido Materno">

        <input type="text" name="usuario" class="form-control mb-2" placeholder="Usuario">
        <input type="email" name="email" class="form-control mb-2" placeholder="Correo">
        <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono">
        <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña">

        <select name="dependencia_id" class="form-control mb-2">
            @foreach($dependencias as $d)
                <option value="{{ $d->id }}">{{ $d->nombre }}</option>
            @endforeach
        </select>

        <select name="estado" class="form-control mb-2">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <button class="btn btn-success">Guardar</button>
    </form>

</div>

@endsection
