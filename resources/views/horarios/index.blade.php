@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">🕒 Horarios</h1>
        <a href="{{ route('horarios.create') }}" class="btn btn-success shadow-sm">➕ Nuevo Horario</a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>📖 Materia</th>
                        <th>📍 Aula</th>
                        <th>📅 Día</th>
                        <th>⏰ Inicio</th>
                        <th>⏳ Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($horarios as $horario)
                        <tr>
                            <td class="text-center fw-bold">{{ $horario->id }}</td>
                            <td>{{ $horario->materia->nombre ?? '-' }}</td>
                            <td>{{ $horario->aula->ubicacion ?? '-' }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fin }}</td>
                            <td class="text-center">
                                <a href="{{ route('horarios.show', $horario->id) }}" class="btn btn-info btn-sm text-white">👁 Ver</a>
                                <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar horario?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">Sin horarios registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
