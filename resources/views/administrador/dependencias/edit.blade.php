@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Dependencia</h2>

    <form action="{{ route('admin.dependencias.update', $dependencia) }}" method="POST">
    @csrf
    @method('PUT')
    @include('administrador.dependencias.form')
    <button class="btn btn-success">Actualizar</button>
</form>

</div>
@endsection
