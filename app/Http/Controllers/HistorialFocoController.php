<?php

namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use App\Models\Foco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    // Mostrar lista de historial
    public function index()
    {
        $historiales = HistorialFoco::with('foco')->latest()->get();
        return view('historialfocos.index', compact('historiales'));
    }

    // Formulario para crear nuevo registro
    public function create()
    {
        $focos = Foco::all();
        return view('historialfocos.create', compact('focos'));
    }

    // Guardar un nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'foco_id' => 'required|exists:focos,id',
            'accion' => 'required|in:encendido,apagado',
            'fecha' => 'required|date',
            'responsable' => 'nullable|string|max:255',
        ]);

        HistorialFoco::create($request->all());

        return redirect()->route('historialfocos.index')->with('success', 'Registro agregado correctamente.');
    }

    // Mostrar un registro individual
    public function show(HistorialFoco $historialfoco)
    {
        return view('historialfocos.show', compact('historialfoco'));
    }

    // Formulario para editar
    public function edit(HistorialFoco $historialfoco)
    {
        $focos = Foco::all();
        return view('historialfocos.edit', compact('historialfoco', 'focos'));
    }

    // Actualizar registro
    public function update(Request $request, HistorialFoco $historialfoco)
    {
        $request->validate([
            'foco_id' => 'required|exists:focos,id',
            'accion' => 'required|in:encendido,apagado',
            'fecha' => 'required|date',
            'responsable' => 'nullable|string|max:255',
        ]);

        $historialfoco->update($request->all());

        return redirect()->route('historialfocos.index')->with('success', 'Registro actualizado correctamente.');
    }

    // Eliminar registro
    public function destroy(HistorialFoco $historialfoco)
    {
        $historialfoco->delete();
        return redirect()->route('historialfocos.index')->with('success', 'Registro eliminado correctamente.');
    }
}
