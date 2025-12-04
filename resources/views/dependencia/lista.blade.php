@extends('layout.dependencia', ['dep' => $dep])

@section('content')
<h2>Archivos de {{ $dep->nombre }}</h2>

@if(count($archivos) == 0)
    <p>No hay archivos subidos.</p>
@endif

<ul>
@foreach($archivos as $file)
    <li>
        <a href="{{ asset('storage/' . $file) }}" target="_blank">
            {{ basename($file) }}
        </a>
    </li>
@endforeach
</ul>

@endsection
