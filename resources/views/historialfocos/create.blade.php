@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold mb-4 text-center">💡 Nuevo Registro de Foco</h1>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('historialfocos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foco</label>
                    <select name="foco_id" class="form-control" required>
                        <option value="">Seleccione un foco</option>
                        @foreach($focos as $foco)
                            <option value="{{ $foco->id }}">{{ $foco->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Acción</label>
                    <select name="accion" class="form-control" required>
                        <option value="encendido">Encender</option>
                        <option value="apagado">Apagar</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Fecha</label>
                    <input type="date" name="fecha" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Responsable (opcional)</label>
                    <input type="text" name="responsable" class="form-control" placeholder="Nombre del responsable">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success shadow-sm px-4">💾 Guardar</button>
                    <a href="{{ route('historialfocos.index') }}" class="btn btn-secondary shadow-sm px-4">↩️ Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
