@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Disponibilidad</h1>
    <form action="{{ route('disponibilidades.update', $disponibilidad->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control">
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $disponibilidad->docente_id == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }} {{ $docente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Día de la Semana</label>
            <select name="dia_semana" class="form-control">
                <option {{ $disponibilidad->dia_semana == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                <option {{ $disponibilidad->dia_semana == 'Martes' ? 'selected' : '' }}>Martes</option>
                <option {{ $disponibilidad->dia_semana == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                <option {{ $disponibilidad->dia_semana == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                <option {{ $disponibilidad->dia_semana == 'Viernes' ? 'selected' : '' }}>Viernes</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Hora Inicio</label>
            <input type="time" name="hora_inicio" class="form-control" value="{{ $disponibilidad->hora_inicio }}">
        </div>
        <div class="mb-3">
            <label>Hora Fin</label>
            <input type="time" name="hora_fin" class="form-control" value="{{ $disponibilidad->hora_fin }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
