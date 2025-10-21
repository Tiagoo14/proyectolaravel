@extends('layouts.app')

@section('content')
    <h1>Editar Mueble</h1>

    <form action="{{ route('muebles.update', $mueble->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" value="{{ $mueble->tipo }}" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" value="{{ $mueble->ubicacion }}" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control">
                <option value="Disponible" {{ $mueble->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Ocupado" {{ $mueble->estado == 'Ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="Dañado" {{ $mueble->estado == 'Dañado' ? 'selected' : '' }}>Dañado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('muebles.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection
