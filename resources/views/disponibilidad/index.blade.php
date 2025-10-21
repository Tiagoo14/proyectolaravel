@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Disponibilidades</h1>
    <a href="{{ route('disponibilidades.create') }}" class="btn btn-primary mb-3">Nueva Disponibilidad</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Docente</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disponibilidades as $disponibilidad)
            <tr>
                <td>{{ $disponibilidad->id }}</td>
                <td>{{ $disponibilidad->docente->nombre }} {{ $disponibilidad->docente->apellido }}</td>
                <td>{{ $disponibilidad->dia_semana }}</td>
                <td>{{ $disponibilidad->hora_inicio }}</td>
                <td>{{ $disponibilidad->hora_fin }}</td>
                <td>
                    <a href="{{ route('disponibilidades.show', $disponibilidad->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('disponibilidades.edit', $disponibilidad->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('disponibilidades.destroy', $disponibilidad->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar disponibilidad?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
