@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h2 class="mb-0">➕ Nueva Materia</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('materias.store') }}" method="POST">
                        @csrf

                        <!-- Código -->
                        <div class="mb-3">
                            <label for="codigo" class="form-label fw-bold">🔢 Código</label>
                            <input type="text" name="codigo" id="codigo" 
                                   class="form-control rounded-3 shadow-sm" 
                                   value="{{ old('codigo') }}" required>
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">📖 Nombre</label>
                            <input type="text" name="nombre" id="nombre" 
                                   class="form-control rounded-3 shadow-sm" 
                                   value="{{ old('nombre') }}" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label fw-bold">📝 Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="3" 
                                      class="form-control rounded-3 shadow-sm">{{ old('descripcion') }}</textarea>
                        </div>

                        <!-- Docente -->
                    <div class="mb-3">
                       <label for="docente_id" class="form-label fw-bold">👩‍🏫 Docente</label>
                       <select name="docente_id" id="docente_id" 
                             class="form-select rounded-3 shadow-sm" required>
                            <option value="">-- Seleccionar --</option>
                         @foreach($docentes as $docente)
                         <option value="{{ $docente->id }}" 
                         {{ old('docente_id') == $docente->id ? 'selected' : '' }}>
                         {{ $docente->apellido }}, {{ $docente->nombre }}
                        </option>
                        @endforeach
                        </select>
                    </div>


                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('materias.index') }}" class="btn btn-secondary shadow-sm">
                                ⬅️ Volver
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                💾 Guardar Materia
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
