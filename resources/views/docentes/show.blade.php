@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Docente</h1>
    <p><strong>ID:</strong> {{ $docente->id }}</p>
    <p><strong>Nombre:</strong> {{ $docente->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $docente->apellido }}</p>
    <p><strong>Email:</strong> {{ $docente->email }}</p>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
