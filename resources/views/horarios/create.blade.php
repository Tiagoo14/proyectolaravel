@extends('layouts.app')

@section('title', 'Crear Horario')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">➕ Crear Nuevo Horario</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- ✅ Muestra errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('horarios.store') }}" method="POST">
                @csrf

                {{-- ✅ Selector de Aula (OBLIGATORIO) --}}
                <div class="mb-3">
                    <label for="aula_id" class="form-label">Aula</label>
                    <select name="aula_id" id="aula_id" class="form-control" required>
                        <option value="">Selecciona un aula</option>
                        @foreach ($aulas as $aula)
                            <option value="{{ $aula->id }}">{{ $aula->ubicacion }} (Capacidad: {{ $aula->capacidad }})</option>
                        @endforeach
                    </select>
                    @error('aula_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ✅ Selector de Día (no input de texto) --}}
                <div class="mb-3">
                    <label for="dia" class="form-label">Día</label>
                    <select name="dia" id="dia" class="form-control" required>
                        <option value="">Selecciona un día</option>
                        <option value="lunes">Lunes</option>
                        <option value="martes">Martes</option>
                        <option value="miercoles">Miércoles</option>
                        <option value="jueves">Jueves</option>
                        <option value="viernes">Viernes</option>
                        <option value="sabado">Sábado</option>
                        <option value="domingo">Domingo</option>
                    </select>
                    @error('dia')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ✅ Hora de Inicio --}}
                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
                    @error('hora_inicio')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ✅ Hora de Fin --}}
                <div class="mb-3">
                    <label for="hora_fin" class="form-label">Hora de Fin</label>
                    <input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
                    @error('hora_fin')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">✅ Guardar</button>
                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">↩️ Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection