@extends('layout.dependencia')

@section('content')
<h2>Archivos de {{ $dep->nombre }}</h2>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descargar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($archivos as $a)
        <tr>
            <td>{{ $a->nombre }}</td>
            <td>
                <a href="{{ asset('storage/'.$a->ruta) }}" download class="btn btn-info">Descargar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
