@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold mb-4 text-center">🧊 Historial de Uso de Aire Acondicionado</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('historial_uso_aire_acondicionados.create') }}" class="btn btn-success">
            ➕ Nuevo Registro
        </a>
    </div>

    @if($historiales->isEmpty())
        <div class="alert alert-info text-center">
            ⚡ No hay registros todavía.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-3">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Aire Acondicionado</th>
                            <th>Acción</th>
                            <th>Fecha</th>
                            <th>Responsable</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historiales as $h)
                            <tr>
                                <td>#{{ $h->id }}</td>
                                <td>{{ $h->aireAcondicionado->ubicacion ?? 'Sin ubicación' }}</td>
                                <td>
                                    @if($h->accion === 'encender')
                                        <span class="badge bg-success">Encendido</span>
                                    @else
                                        <span class="badge bg-danger">Apagado</span>
                                    @endif
                                </td>
                                <td>{{ $h->fecha }}</td>
                                <td>{{ $h->responsable ?? '—' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('historial_uso_aire_acondicionados.edit', $h->id) }}" class="btn btn-primary btn-sm">
                                        ✏️
                                    </a>
                                    <form action="{{ route('historial_uso_aire_acondicionados.destroy', $h->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este registro?')">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
