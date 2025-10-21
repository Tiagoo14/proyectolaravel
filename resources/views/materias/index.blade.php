@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">📚 Lista de Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-success shadow-sm">
            ➕ Nueva Materia
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>📖 Nombre</th>
                        <th>📝 Descripción</th>
                        <th>👤 Docente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materias as $materia)
                        <tr>
                            <td class="text-center fw-bold">{{ $materia->id }}</td>
                            <td>{{ $materia->nombre }}</td>
                            <td>{{ $materia->descripcion }}</td>
                            <td>{{ $materia->docente->nombre ?? 'Sin asignar' }}</td>
                            <td class="text-center">
                                <a href="{{ route('materias.show', $materia->id) }}" 
                                   class="btn btn-info btn-sm shadow-sm text-white me-1">
                                    👁 Ver
                                </a>
                                <a href="{{ route('materias.edit', $materia->id) }}" 
                                   class="btn btn-warning btn-sm shadow-sm me-1">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('materias.destroy', $materia->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('¿Seguro que quieres eliminar esta materia?')">
                                        🗑 Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No hay materias registradas todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
