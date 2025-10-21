@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Materia</h1>
    <p><strong>ID:</strong> {{ $materia->id }}</p>
    <p><strong>Nombre:</strong> {{ $materia->nombre }}</p>
    <p><strong>Código:</strong> {{ $materia->codigo }}</p>
    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
