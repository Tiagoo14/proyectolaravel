<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::with('aula')->latest()->get();
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id', 'ubicacion']);
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
        ]);

        // Mapear los estados de texto a valores enteros
        $estadoMap = [
            'Encendido' => 1,
            'Apagado' => 0,
            'Roto' => 2,
        ];
        
        $data['estado'] = $estadoMap[$data['estado']] ?? 0;

        Foco::create($data);

        return redirect()->route('focos.index')->with('ok', 'Foco creado correctamente.');
    }

    public function show(Foco $foco)
    {
        $foco->load('aula');
        return view('focos.show', compact('foco'));
    }

    public function edit(Foco $foco)
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id', 'ubicacion']);
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
        ]);

        // Mapear los estados de texto a valores enteros
        $estadoMap = [
            'Encendido' => 1,
            'Apagado' => 0,
            'Roto' => 2,
        ];

        $data['estado'] = $estadoMap[$data['estado']] ?? 0;

        $foco->update($data);

        return redirect()->route('focos.index')->with('ok', 'Foco actualizado correctamente.');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index')->with('ok', 'Foco eliminado correctamente.');
    }
}
