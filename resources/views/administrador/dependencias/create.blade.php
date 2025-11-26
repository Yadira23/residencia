@extends('layout.app')

@section('content')
<div class="container">
    <h2>Nueva Dependencia</h2>

    <form action="{{ route('admin.dependencias.store') }}" method="POST">
    @csrf
    @include('administrador.dependencias.form')
    <button class="btn btn-primary">Guardar</button>
</form>

</div>
@endsection
