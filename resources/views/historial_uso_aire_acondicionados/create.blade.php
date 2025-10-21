@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold mb-4 text-center">➕ Registrar Uso de Aire Acondicionado</h1>

    <form action="{{ route('historial_uso_aire_acondicionados.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="aire_acondicionado_id">Aire Acondicionado</label>
            <select name="aire_acondicionado_id" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($aires as $aire)
                    <option value="{{ $aire->id }}">{{ $aire->ubicacion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="accion">Acción</label>
            <select name="accion" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="encender">Encender</option>
                <option value="apagar">Apagar</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="responsable">Responsable</label>
            <input type="text" name="responsable" class="form-control" placeholder="Opcional">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('historial_uso_aire_acondicionados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
