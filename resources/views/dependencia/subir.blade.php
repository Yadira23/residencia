@extends('layout.dependencia')

@section('content')
<h2>Subir Archivo para {{ $dep->nombre }}</h2>

@if(session('ok'))
<div class="alert alert-success">{{ session('ok') }}</div>
@endif

<form action="{{ route('dependencia.subir.save', $dep->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Seleccionar archivo:</label>
    <input type="file" name="archivo" required>

    <button type="submit" class="btn btn-success mt-2">Subir</button>
</form>
@endsection
