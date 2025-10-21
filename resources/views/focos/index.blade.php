@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold">💡 Lista de Focos</h1>
        <a href="{{ route('focos.create') }}" class="btn btn-success shadow-sm">➕ Nuevo Foco</a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Aula</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($focos as $foco)
                        <tr>
                            <td>{{ $foco->id }}</td>
                            <td>{{ $foco->aula->ubicacion ?? 'Sin aula' }}</td>
                            <td>
                                @if($foco->estado == 'Encendido')
                                    <span class="badge bg-success">💡 Encendido</span>
                                @elseif($foco->estado == 'Apagado')
                                    <span class="badge bg-secondary">🌑 Apagado</span>
                                @else
                                    <span class="badge bg-danger">❌ Roto</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('focos.edit', $foco->id) }}" class="btn btn-warning btn-sm">✏️</a>
                                <form action="{{ route('focos.destroy', $foco->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este foco?')">🗑️</button>
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
