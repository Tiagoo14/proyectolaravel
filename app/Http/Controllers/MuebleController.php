<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Models\Aula;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        $muebles = Mueble::with('aula')->latest()->get();
        return view('muebles.index', compact('muebles'));
    }

    public function create()
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('muebles.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo'    => 'required|string|max:100',
            'estado'  => 'required|string|max:50',
        ]);

        Mueble::create($data);

        return redirect()->route('muebles.index')->with('ok', 'Mueble creado correctamente.');
    }

    public function show(Mueble $mueble)
    {
        $mueble->load('aula');
        return view('muebles.show', compact('mueble'));
    }

    public function edit(Mueble $mueble)
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('muebles.edit', compact('mueble', 'aulas'));
    }

    public function update(Request $request, Mueble $mueble)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo'    => 'required|string|max:100',
            'estado'  => 'required|string|max:50',
        ]);

        $mueble->update($data);

        return redirect()->route('muebles.index')->with('ok', 'Mueble actualizado.');
    }

    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('ok', 'Mueble eliminado.');
    }
}
