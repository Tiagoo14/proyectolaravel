@extends('layouts.app')

@section('title', 'Editar Horario')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">✏️ Editar Horario</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="dia" class="form-label">Día</label>
                    <input type="text" name="dia" id="dia" class="form-control" value="{{ old('dia', $horario->dia) }}" required>
                </div>

                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio', $horario->hora_inicio) }}" required>
                </div>

                <div class="mb-3">
                    <label for="hora_fin" class="form-label">Hora de Fin</label>
                    <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin', $horario->hora_fin) }}" required>
                </div>

                <button type="submit" class="btn btn-success">💾 Actualizar</button>
                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">↩️ Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
