@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Materia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materias.update', $materia) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control"
                   value="{{ old('codigo', $materia->codigo) }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   value="{{ old('nombre', $materia->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $materia->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" id="docente_id" class="form-select">
                <option value="">-- Sin asignar --</option>
                @foreach ($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ old('docente_id', $materia->docente_id) == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
