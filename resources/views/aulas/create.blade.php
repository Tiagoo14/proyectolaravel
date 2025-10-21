@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h2 class="mb-0">➕ Nueva Aula</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('aulas.store') }}" method="POST">
                        @csrf

                        <!-- Ubicación -->
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label fw-bold">📍 Ubicación</label>
                            <input type="text" name="ubicacion" id="ubicacion" 
                                   class="form-control rounded-3 shadow-sm" 
                                   placeholder="Ej: Planta Baja - Sala 1" required>
                        </div>

                        <!-- Capacidad -->
                        <div class="mb-3">
                            <label for="capacidad" class="form-label fw-bold">👥 Capacidad</label>
                            <input type="number" name="capacidad" id="capacidad" 
                                   class="form-control rounded-3 shadow-sm" 
                                   placeholder="Ej: 30" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label fw-bold">⚡ Estado</label>
                            <select name="estado" id="estado" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Seleccionar --</option>
                                <option value="disponible">✅ Disponible</option>
                                <option value="ocupada">❌ Ocupada</option>
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('aulas.index') }}" class="btn btn-secondary shadow-sm">
                                ⬅️ Volver
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                💾 Guardar Aula
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
