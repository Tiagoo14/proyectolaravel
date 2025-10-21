@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Disponibilidad</h1>
    <form action="{{ route('disponibilidad.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control">
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Día de la Semana</label>
            <select name="dia_semana" class="form-control">
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miércoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Hora Inicio</label>
            <input type="time" name="hora_inicio" class="form-control">
        </div>
        <div class="mb-3">
            <label>Hora Fin</label>
            <input type="time" name="hora_fin" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
