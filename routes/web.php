<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AulaController,
    ReservaController,
    DocenteController,
    MateriaController,
    DisponibilidadController,
    HorarioController,
    AireAcondicionadoController,
    FocoController,
    CortinaController,
    MuebleController,
    HistorialFocoController,
    HistorialUsoAireAcondicionadoController
};

Route::get('/', function () {
    return view('home');
});

Route::resource('aulas', AulaController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('materias', MateriaController::class);
Route::resource('disponibilidades', DisponibilidadController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('aireacondicionados', AireAcondicionadoController::class);
Route::resource('focos', FocoController::class);
Route::resource('cortinas', CortinaController::class);
Route::resource('muebles', MuebleController::class);

// 👇 Esta es la línea que necesitas, y ya la tienes
Route::resource('historial_uso_aireacondicionados', HistorialUsoAireAcondicionadoController::class);

// 👇 Esta también la tienes
Route::resource('historialfocos', HistorialFocoController::class);

Route::get('/pokemons', fn() => view('pokemons'));