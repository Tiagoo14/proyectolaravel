@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white text-center rounded-top">
                    <h2 class="mb-0">👁 Detalles del Aula</h2>
                </div>

                <div class="card-body p-4">
                    <p><strong>📍 Ubicación:</strong> {{ $aula->ubicacion }}</p>
                    <p><strong>👥 Capacidad:</strong> {{ $aula->capacidad }}</p>
                    <p><strong>⚡ Estado:</strong> 
                        @if($aula->estado == 'disponible')
                            <span class="badge bg-success">✅ Disponible</span>
                        @else
                            <span class="badge bg-danger">❌ Ocupada</span>
                        @endif
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('aulas.index') }}" class="btn btn-secondary shadow-sm">
                        ⬅️ Volver
                    </a>
                    <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-warning shadow-sm">
                        ✏️ Editar
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
