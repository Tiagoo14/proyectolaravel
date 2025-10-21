<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Aula;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Mostrar listado de reservas
     */
    public function index()
    {
        $reservas = Reserva::with(['aula', 'docente', 'materia'])->latest()->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $aulas = Aula::all();
        $docentes = Docente::all();
        $materias = Materia::all();

        return view('reservas.create', compact('aulas', 'docentes', 'materias'));
    }

    /**
     * Guardar nueva reserva
     */
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'fecha_reserva' => 'required|date',
            'hora_inicio'   => 'required|date_format:H:i',
            'hora_fin'      => 'required|date_format:H:i|after:hora_inicio',
            'aula_id'       => 'required|exists:aulas,id',
            'docente_id'    => 'required|exists:docentes,id',
            'materia_id'    => 'required|exists:materias,id',
            'estado'        => 'required|in:pendiente,confirmada,cancelada',
            'observaciones' => 'nullable|string|max:500',
        ]);

        // Crear reserva
        Reserva::create($validated);

        return redirect()->route('reservas.index')->with('success', '✅ Reserva creada correctamente.');
    }

    /**
     * Mostrar una reserva en detalle
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Reserva $reserva)
    {
        $aulas = Aula::all();
        $docentes = Docente::all();
        $materias = Materia::all();

        return view('reservas.edit', compact('reserva', 'aulas', 'docentes', 'materias'));
    }

    /**
     * Actualizar reserva
     */
    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'fecha_reserva' => 'required|date',
            'hora_inicio'   => 'required|date_format:H:i',
            'hora_fin'      => 'required|date_format:H:i|after:hora_inicio',
            'aula_id'       => 'required|exists:aulas,id',
            'docente_id'    => 'required|exists:docentes,id',
            'materia_id'    => 'required|exists:materias,id',
            'estado'        => 'required|in:pendiente,confirmada,cancelada',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.index')->with('success', '✏️ Reserva actualizada correctamente.');
    }

    /**
     * Eliminar reserva
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', '🗑️ Reserva eliminada correctamente.');
    }
}
