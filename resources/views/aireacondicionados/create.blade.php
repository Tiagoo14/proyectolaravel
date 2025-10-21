@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h2 class="mb-0">➕ Nuevo Aire Acondicionado</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('aireacondicionados.store') }}" method="POST">
                        @csrf

                        <!-- Aula -->
                        <div class="mb-3">
                            <label for="aula_id" class="form-label fw-bold">📍 Aula</label>
                            <select name="aula_id" id="aula_id" 
                                    class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach($aulas as $aula)
                                    <option value="{{ $aula->id }}">{{ $aula->ubicacion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label fw-bold">⚡ Estado</label>
                            <select name="estado" id="estado" 
                                    class="form-select rounded-3 shadow-sm" required>
                                <option value="Activo">✅ Activo</option>
                                <option value="Inactivo">❌ Inactivo</option>
                            </select>
                        </div>

                        <!-- Último mantenimiento -->
                        <div class="mb-3">
                            <label for="ultimo_mantenimiento" class="form-label fw-bold">🛠 Último mantenimiento</label>
                            <input type="date" name="ultimo_mantenimiento" id="ultimo_mantenimiento" 
                                   class="form-control rounded-3 shadow-sm">
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary shadow-sm">
                                ⬅️ Volver
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                💾 Guardar Aire
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
