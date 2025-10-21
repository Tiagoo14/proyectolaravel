<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Aula;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Muestra una lista de todos los horarios.
     */
    public function index()
    {
        $horarios = Horario::with('aula')->get();
        return view('horarios.index', compact('horarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo horario.
     */
    public function create()
    {
        $aulas = Aula::all();
        return view('horarios.create', compact('aulas'));
    }

    /**
     * Guarda el nuevo horario en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        Horario::create($validated);

        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
    }

    /**
     * Muestra un horario específico.
     */
    public function show(Horario $horario)
    {
        // La variable $horario ya tiene el registro gracias a Route Model Binding.
        return view('horarios.show', compact('horario'));
    }

    /**
     * Muestra el formulario para editar un horario existente.
     * * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        $aulas = Aula::all(); // Obtenemos todas las aulas para el selector en el formulario
        return view('horarios.edit', compact('horario', 'aulas'));
    }

    /**
     * Actualiza el horario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        $validated = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $horario->update($validated);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    /**
     * Elimina un horario de la base de datos.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}