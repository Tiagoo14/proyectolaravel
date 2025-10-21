@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h2 class="mb-0">➕ Nuevo Docente</h2>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('docentes.store') }}" method="POST">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">👤 Nombre</label>
                            <input type="text" name="nombre" id="nombre" 
                                   class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-bold">👤 Apellido</label>
                            <input type="text" name="apellido" id="apellido" 
                                   class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">📧 Email</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control rounded-3 shadow-sm">
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('docentes.index') }}" class="btn btn-secondary shadow-sm">
                                ⬅️ Volver
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                💾 Guardar Docente
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
