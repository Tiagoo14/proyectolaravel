@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Aire Acondicionado</h1>

    <p><strong>ID:</strong> {{ $aireacondicionado->id }}</p>
    <p><strong>Ubicación:</strong> {{ $aireacondicionado->ubicacion }}</p>
    <p><strong>Estado:</strong> {{ $aireacondicionado->estado }}</p>

    <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
