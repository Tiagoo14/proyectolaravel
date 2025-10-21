@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Aire Acondicionado</h1>

    <form action="{{ route('aireacondicionados.update', $aireacondicionado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $aireacondicionado->ubicacion }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="Activo" {{ $aireacondicionado->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $aireacondicionado->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="En Reparación" {{ $aireacondicionado->estado == 'En Reparación' ? 'selected' : '' }}>En Reparación</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
