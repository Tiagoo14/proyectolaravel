@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white text-center rounded-top">
                    <h2 class="mb-0">🪟 Nueva Cortina</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('cortinas.store') }}" method="POST">
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
                            <label for="estado" class="form-label fw-bold">🎛 Estado</label>
                            <select name="estado" id="estado" 
                                    class="form-select rounded-3 shadow-sm" required>
                                <option value="Abierta">⬆️ Abierta</option>
                                <option value="Cerrada">⬇️ Cerrada</option>
                                <option value="Rota">❌ Rota</option>
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cortinas.index') }}" class="btn btn-secondary shadow-sm">⬅️ Volver</a>
                            <button type="submit" class="btn btn-success shadow-sm">💾 Guardar Cortina</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
