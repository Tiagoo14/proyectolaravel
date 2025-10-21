@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Reserva</h1>
    <p><strong>ID:</strong> {{ $reserva->id }}</p>
    <p><strong>Aula:</strong> {{ $reserva->aula->nombre }}</p>
    <p><strong>Docente:</strong> {{ $reserva->docente->nombre }} {{ $reserva->docente->apellido }}</p>
    <p><strong>Fecha:</strong> {{ $reserva->fecha }}</p>
    <p><strong>Hora Inicio:</strong> {{ $reserva->hora_inicio }}</p>
    <p><strong>Hora Fin:</strong> {{ $reserva->hora_fin }}</p>
    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
