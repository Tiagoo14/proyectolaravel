@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold">🪟 Lista de Cortinas</h1>
        <a href="{{ route('cortinas.create') }}" class="btn btn-success shadow-sm">➕ Nueva Cortina</a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>Aula</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cortinas as $cortina)
                        <tr>
                            <td>{{ $cortina->id }}</td>
                            <td>{{ $cortina->aula->ubicacion ?? 'Sin aula' }}</td>
                            <td>
                                @if($cortina->estado == 'Abierta')
                                    <span class="badge bg-success">⬆️ Abierta</span>
                                @elseif($cortina->estado == 'Cerrada')
                                    <span class="badge bg-secondary">⬇️ Cerrada</span>
                                @else
                                    <span class="badge bg-danger">❌ Rota</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('cortinas.edit', $cortina->id) }}" class="btn btn-warning btn-sm">✏️</a>
                                <form action="{{ route('cortinas.destroy', $cortina->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar esta cortina?')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
