@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold mb-4 text-center">📄 Detalle de Uso de Aire Acondicionado</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> #{{ $historial_uso_aire_acondicionado->id }}</p>
            <p><strong>Aire Acondicionado:</strong> {{ $historial_uso_aire_acondicionado->aireAcondicionado->ubicacion ?? 'Sin ubicación' }}</p>
            <p><strong>Acción:</strong>
                @if($historial_uso_aire_acondicionado->accion === 'encender')
                    <span class="badge bg-success">Encendido</span>
                @else
                    <span class="badge bg-danger">Apagado</span>
                @endif
            </p>
            <p><strong>Fecha:</strong> {{ $historial_uso_aire_acondicionado->fecha }}</p>
            <p><strong>Responsable:</strong> {{ $historial_uso_aire_acondicionado->responsable ?? '—' }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('historial_uso_aire_acondicionados.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('historial_uso_aire_acondicionados.edit', $historial_uso_aire_acondicionado->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection
