@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Docente</h1>
    <form action="{{ route('docentes.update', $docente) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $docente->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" value="{{ $docente->apellido }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $docente->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Especialidad</label>
            <input type="text" name="especialidad" value="{{ $docente->especialidad }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
