@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-4 text-center">Historial de Focos</h1>

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('historialfocos.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="bi bi-plus-lg me-2"></i> Nuevo Registro
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Foco</th>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                    <th>Responsable</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($historiales as $registro)
                                    <tr>
                                        <td>{{ $registro->id }}</td>
                                        <td>{{ $registro->foco->nombre ?? 'Desconocido' }}</td>
                                        <td>
                                            @if($registro->accion == 'encendido')
                                                <span class="badge bg-success">Encendido</span>
                                            @else
                                                <span class="badge bg-danger">Apagado</span>
                                            @endif
                                        </td>
                                        <td>{{ $registro->fecha }}</td>
                                        <td>{{ $registro->responsable ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('historialfocos.show', $registro->id) }}" class="btn btn-sm btn-info text-white" title="Ver">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('historialfocos.edit', $registro->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('historialfocos.destroy', $registro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No hay registros en el historial de focos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
