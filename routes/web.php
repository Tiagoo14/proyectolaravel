<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\HistorialFocoController;
use App\Http\Controllers\HistorialUsoAireAcondicionadoController;

// Página inicial personalizada
Route::get('/', function () {
    return view('home'); // nuestra vista principal
});

// Rutas RESTful para todos los controladores
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
Route::resource('historialusoaireacondicionados', HistorialUsoAireAcondicionadoController::class);
Route::resource('historialfocos', HistorialFocoController::class);

Route::get('/pokemons', function () {
    return view('pokemons');
});
