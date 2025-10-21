@extends('layouts.app')

@section('content')
    <h1>Detalle del Mueble</h1>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $mueble->id }}</p>
            <p><strong>Tipo:</strong> {{ $mueble->tipo }}</p>
            <p><strong>Ubicación:</strong> {{ $mueble->ubicacion }}</p>
            <p><strong>Estado:</strong> {{ $mueble->estado }}</p>
        </div>
    </div>

    <a href="{{ route('muebles.index') }}" class="btn btn-secondary mt-3">Volver</a>
    <a href="{{ route('muebles.edit', $mueble->id) }}" class="btn btn-warning mt-3">Editar</a>
@endsection
