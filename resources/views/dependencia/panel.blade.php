@extends('layout.dependencia', ['dep' => $dep])

@section('content')
<h2>Panel de {{ $dep->nombre }}</h2>

<p>Bienvenido al panel de tu dependencia.</p>

<a href="{{ route('dependencia.lista', $dep->id) }}" class="btn btn-primary">Mis Archivos</a>
<a href="{{ route('dependencia.subir', $dep->id) }}" class="btn btn-success">Subir Archivo</a>

@endsection
