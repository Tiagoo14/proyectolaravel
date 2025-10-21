@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
       <h1 class="fw-bold">🗄️ Muebles</h1>
        <a href="{{ route('muebles.create') }}" class="btn btn-success shadow-sm">➕ Nuevo Mueble</a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            @if($muebles->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    ⚡ No hay muebles registrados aún. ¡Agregá el primero!
                </div>
            @else
                <table class="table table-hover align-middle">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Aula</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($muebles as $mueble)
                            <tr>
                                <td class="fw-bold">#{{ $mueble->id }}</td>
                                <td>{{ $mueble->aula->ubicacion ?? '📍 Sin aula' }}</td>
                                <td>{{ $mueble->tipo }}</td>
                                <td>
                                    @if($mueble->estado == 'Bueno')
                                        <span class="badge bg-success p-2">✅ Bueno</span>
                                    @elseif($mueble->estado == 'Regular')
                                        <span class="badge bg-warning text-dark p-2">⚠️ Regular</span>
                                    @else
                                        <span class="badge bg-danger p-2">❌ Malo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('muebles.edit', $mueble->id) }}" class="btn btn-warning btn-sm shadow-sm">✏️ Editar</a>
                                    <form action="{{ route('muebles.destroy', $mueble->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                onclick="return confirm('¿Eliminar este mueble?')">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
