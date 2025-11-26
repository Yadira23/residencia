@extends('layout.app')

@section('title','Administradores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Administradores</h1>
  <a href="{{ route('administradors.create') }}" class="btn btn-primary">Nuevo Administrador</a>
</div>

<table class="table table-striped">
  <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th></tr></thead>
  <tbody>
    @foreach($administradores as $adm)
    <tr>
      <td>{{ $adm->id }}</td>
      <td>{{ $adm->nombre }} {{ $adm->apellido }}</td>
      <td>{{ $adm->email }}</td>
      <td>{{ $adm->telefono }}</td>
      <td>
        <a href="{{ route('administradors.show', $adm) }}" class="btn btn-sm btn-info">Ver</a>
        <a href="{{ route('administradors.edit', $adm) }}" class="btn btn-sm btn-warning">Editar</a>
        <form action="{{ route('administradors.destroy', $adm) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $administradores->links() }}

@endsection
