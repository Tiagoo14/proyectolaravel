@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold mb-4 text-center">✏️ Editar Uso de Aire Acondicionado</h1>

    <form action="{{ route('historial_uso_aire_acondicionados.update', $historial_uso_aire_acondicionado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="aire_acondicionado_id">Aire Acondicionado</label>
            <select name="aire_acondicionado_id" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($aires as $aire)
                    <option value="{{ $aire->id }}"
                        {{ $aire->id == $historial_uso_aire_acondicionado->aire_acondicionado_id ? 'selected' : '' }}>
                        {{ $aire->ubicacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control"
                   value="{{ $historial_uso_aire_acondicionado->fecha }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="accion">Acción</label>
            <select name="accion" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="encender" {{ $historial_uso_aire_acondicionado->accion == 'encender' ? 'selected' : '' }}>Encender</option>
                <option value="apagar" {{ $historial_uso_aire_acondicionado->accion == 'apagar' ? 'selected' : '' }}>Apagar</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="responsable">Responsable</label>
            <input type="text" name="responsable" class="form-control"
                   value="{{ $historial_uso_aire_acondicionado->responsable }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('historial_uso_aire_acondicionados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
