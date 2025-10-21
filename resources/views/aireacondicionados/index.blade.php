@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">❄️ Aires Acondicionados</h1>
        <a href="{{ route('aireacondicionados.create') }}" class="btn btn-success shadow-sm">➕ Nuevo Aire</a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>📍 Aula</th>
                        <th>⚡ Estado</th>
                        <th>🛠 Último Mantenimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aires as $aire)
                        <tr>
                            <td class="text-center fw-bold">{{ $aire->id }}</td>
                            <td>{{ $aire->aula->ubicacion ?? '-' }}</td>
                            <td>
                                @if($aire->estado == 'Activo')
                                    <span class="badge bg-success">✅ Activo</span>
                                @else
                                    <span class="badge bg-danger">❌ Inactivo</span>
                                @endif
                            </td>
                            <td>{{ $aire->ultimo_mantenimiento ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('aireacondicionados.show', $aire->id) }}" class="btn btn-info btn-sm text-white">👁 Ver</a>
                                <a href="{{ route('aireacondicionados.edit', $aire->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('aireacondicionados.destroy', $aire->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar aire?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Sin aires acondicionados registrados</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
