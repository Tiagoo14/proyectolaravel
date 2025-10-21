@extends('layouts.app')

@section('title', 'Detalle del Horario')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">📖 Detalle del Horario</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $horario->id }}</p>
            <p><strong>Día:</strong> {{ $horario->dia }}</p>
            <p><strong>Hora Inicio:</strong> {{ $horario->hora_inicio }}</p>
            <p><strong>Hora Fin:</strong> {{ $horario->hora_fin }}</p>

            <div class="mt-4">
                <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning">✏️ Editar</a>

                <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este horario?')">🗑️ Eliminar</button>
                </form>

                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">↩️ Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
