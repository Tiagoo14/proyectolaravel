@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">📅 Lista de Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn btn-success shadow-sm">
            ➕ Nueva Reserva
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>📍 Aula</th>
                        <th>👤 Docente</th>
                        <th>📅 Fecha</th>
                        <th>⏰ Hora</th>
                        <th>⚡ Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservas as $reserva)
                        <tr>
                            <td class="text-center fw-bold">{{ $reserva->id }}</td>
                            <td>{{ $reserva->aula->ubicacion ?? 'N/A' }}</td>
                            <td>{{ $reserva->docente->nombre ?? 'N/A' }}</td>
                            <td class="text-center">{{ $reserva->fecha }}</td>
                            <td class="text-center">{{ $reserva->hora }}</td>
                            <td class="text-center">
                                @if($reserva->estado == 'activa')
                                    <span class="badge bg-success">✅ Activa</span>
                                @else
                                    <span class="badge bg-secondary">📌 Finalizada</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('reservas.show', $reserva->id) }}" 
                                   class="btn btn-info btn-sm shadow-sm text-white me-1">
                                    👁 Ver
                                </a>
                                <a href="{{ route('reservas.edit', $reserva->id) }}" 
                                   class="btn btn-warning btn-sm shadow-sm me-1">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('¿Seguro que quieres eliminar esta reserva?')">
                                        🗑 Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No hay reservas registradas todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
