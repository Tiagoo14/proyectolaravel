<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        
        $disponibilidades = Disponibilidad::all();
        dd($disponibilidades);
        return view('disponibilidad.index', compact('disponibilidades'));
    }

    public function create()
    {
        return view('disponibilidades.create');
    }

    public function store(Request $request)
    {
        Disponibilidad::create($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada correctamente');
    }

    public function show(Disponibilidad $disponibilidad)
    {
        return view('disponibilidades.show', compact('disponibilidad'));
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        return view('disponibilidades.edit', compact('disponibilidad'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $disponibilidad->update($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada correctamente');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada correctamente');
    }
}
