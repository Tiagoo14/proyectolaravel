<?php

namespace App\Http\Controllers;

use App\Models\HistorialUsoAireAcondicionado;
use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class HistorialUsoAireAcondicionadoController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $historiales = HistorialUsoAireAcondicionado::with('aireAcondicionado')
                        ->orderBy('fecha', 'desc')
                        ->get();

        return view('historial_uso_aire_acondicionados.index', compact('historiales'));
    }

    // Mostrar formulario para crear nuevo registro
    public function create()
    {
        $aires = AireAcondicionado::all();
        return view('historial_uso_aire_acondicionados.create', compact('aires'));
    }

    // Guardar nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'aire_acondicionado_id' => 'required|exists:aire_acondicionados,id',
            'accion' => 'required|string|in:encender,apagar',
            'fecha' => 'required|date',
            'responsable' => 'nullable|string|max:255',
        ]);

        HistorialUsoAireAcondicionado::create($request->all());

        return redirect()->route('historial_uso_aire_acondicionados.index')
                         ->with('success', 'Historial creado correctamente');
    }

    // Mostrar formulario para editar registro existente
    public function edit(HistorialUsoAireAcondicionado $historial_uso_aire_acondicionado)
    {
        $aires = AireAcondicionado::all();
        return view('historial_uso_aire_acondicionados.edit', compact('historial_uso_aire_acondicionado', 'aires'));
    }

    // Actualizar registro
    public function update(Request $request, HistorialUsoAireAcondicionado $historial_uso_aire_acondicionado)
    {
        $request->validate([
            'aire_acondicionado_id' => 'required|exists:aire_acondicionados,id',
            'accion' => 'required|string|in:encender,apagar',
            'fecha' => 'required|date',
            'responsable' => 'nullable|string|max:255',
        ]);

        $historial_uso_aire_acondicionado->update($request->all());

        return redirect()->route('historial_uso_aire_acondicionados.index')
                         ->with('success', 'Historial actualizado correctamente');
    }

    // Eliminar registro
    public function destroy(HistorialUsoAireAcondicionado $historial_uso_aire_acondicionado)
    {
        $historial_uso_aire_acondicionado->delete();

        return redirect()->route('historial_uso_aire_acondicionados.index')
                         ->with('success', 'Historial eliminado correctamente');
    }
}
