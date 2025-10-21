@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h2 class="mb-0">➕ Nueva Reserva</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('reservas.store') }}" method="POST">
                        @csrf

                        <!-- Aula -->
                        <div class="mb-3">
                            <label for="aula_id" class="form-label fw-bold">📍 Aula</label>
                            <select name="aula_id" id="aula_id" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach($aulas as $aula)
                                    <option value="{{ $aula->id }}">{{ $aula->ubicacion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Docente -->
                        <div class="mb-3">
                            <label for="docente_id" class="form-label fw-bold">👤 Docente</label>
                            <select name="docente_id" id="docente_id" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Materia -->
                        <div class="mb-3">
                            <label for="materia_id" class="form-label fw-bold">📘 Materia</label>
                            <select name="materia_id" id="materia_id" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha de reserva -->
                        <div class="mb-3">
                            <label for="fecha_reserva" class="form-label fw-bold">📅 Fecha</label>
                            <input type="date" name="fecha_reserva" id="fecha_reserva" 
                                   class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <!-- Hora inicio -->
                        <div class="mb-3">
                            <label for="hora_inicio" class="form-label fw-bold">🕑 Hora de inicio</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" 
                                   class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <!-- Hora fin -->
                        <div class="mb-3">
                            <label for="hora_fin" class="form-label fw-bold">🕓 Hora de fin</label>
                            <input type="time" name="hora_fin" id="hora_fin" 
                                   class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label fw-bold">⚡ Estado</label>
                            <select name="estado" id="estado" class="form-select rounded-3 shadow-sm" required>
                                <option value="pendiente">⏳ Pendiente</option>
                                <option value="confirmada">✅ Confirmada</option>
                                <option value="cancelada">❌ Cancelada</option>
                            </select>
                        </div>

                        <!-- Observaciones -->
                        <div class="mb-3">
                            <label for="observaciones" class="form-label fw-bold">📝 Observaciones</label>
                            <textarea name="observaciones" id="observaciones" rows="3" 
                                      class="form-control rounded-3 shadow-sm"></textarea>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('reservas.index') }}" class="btn btn-secondary shadow-sm">
                                ⬅️ Volver
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                💾 Guardar Reserva
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
