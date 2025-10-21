<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docente;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::with('docente')->latest()->get();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $docentes = Docente::orderBy('nombre')->get(['id','nombre']);
        return view('materias.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo'     => 'required|string|max:20|unique:materias,codigo',
            'nombre'     => 'required|string|max:255',
            'descripcion'=> 'nullable|string',
            'docente_id' => 'required|exists:docentes,id', // 🔹 obligatorio
        ]);

        Materia::create($data);

        return redirect()->route('materias.index')->with('ok', 'Materia creada correctamente ✅');
    }

    public function show(Materia $materia)
    {
        $materia->load('docente');
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        $docentes = Docente::orderBy('nombre')->get(['id','nombre']);
        return view('materias.edit', compact('materia','docentes'));
    }

    public function update(Request $request, Materia $materia)
    {
        $data = $request->validate([
            'codigo'     => 'required|string|max:20|unique:materias,codigo,' . $materia->id,
            'nombre'     => 'required|string|max:255',
            'descripcion'=> 'nullable|string',
            'docente_id' => 'required|exists:docentes,id', // 🔹 obligatorio
        ]);

        $materia->update($data);

        return redirect()->route('materias.index')->with('ok', 'Materia actualizada correctamente ✅');
    }
}
