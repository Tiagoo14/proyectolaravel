@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Disponibilidad</h1>
    <p><strong>ID:</strong> {{ $disponibilidad->id }}</p>
    <p><strong>Docente:</strong> {{ $disponibilidad->docente->nombre }} {{ $disponibilidad->docente->apellido }}</p>
    <p><strong>Día:</strong> {{ $disponibilidad->dia_semana }}</p>
    <p><strong>Hora Inicio:</strong> {{ $disponibilidad->hora_inicio }}</p>
    <p><strong>Hora Fin:</strong> {{ $disponibilidad->hora_fin }}</p>
    <a href="{{ route('disponibilidad.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
