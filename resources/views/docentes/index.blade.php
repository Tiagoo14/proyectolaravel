@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">📚 Listado de Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-lg btn-success shadow">
            ➕ Nuevo Docente
        </a>
    </div>

    @if($docentes->isEmpty())
        <div class="alert alert-info text-center shadow">
            😕 No hay docentes cargados todavía.  
            <a href="{{ route('docentes.create') }}" class="alert-link">Agrega el primero aquí</a>.
        </div>
    @else
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>👤 Nombre</th>
                            <th>👥 Apellido</th>
                            <th>📧 Email</th>
                            <th>⚙️ Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $docente)
                            <tr>
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->nombre }}</td>
                                <td>{{ $docente->apellido }}</td>
                                <td>{{ $docente->email }}</td>
                                <td>
                                    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm shadow">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Seguro que quieres eliminar este docente?')">
                                            🗑️ Eliminar
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
