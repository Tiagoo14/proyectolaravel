@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Aula</label>
            <select name="aula_id" class="form-control">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $reserva->aula_id == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control">
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $reserva->docente_id == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }} {{ $docente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $reserva->fecha }}">
        </div>
        <div class="mb-3">
            <label>Hora Inicio</label>
            <input type="time" name="hora_inicio" class="form-control" value="{{ $reserva->hora_inicio }}">
        </div>
        <div class="mb-3">
            <label>Hora Fin</label>
            <input type="time" name="hora_fin" class="form-control" value="{{ $reserva->hora_fin }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
