<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use App\Models\Aula;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index()
    {
        $cortinas = Cortina::with('aula')->latest()->get();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado'  => 'required|string|max:50',
        ]);

        Cortina::create($data);

        return redirect()->route('cortinas.index')->with('ok', 'Cortina creada correctamente.');
    }

    public function show(Cortina $cortina)
    {
        $cortina->load('aula');
        return view('cortinas.show', compact('cortina'));
    }

    public function edit(Cortina $cortina)
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    public function update(Request $request, Cortina $cortina)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado'  => 'required|string|max:50',
        ]);

        $cortina->update($data);

        return redirect()->route('cortinas.index')->with('ok', 'Cortina actualizada.');
    }

    public function destroy(Cortina $cortina)
    {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('ok', 'Cortina eliminada.');
    }
}
