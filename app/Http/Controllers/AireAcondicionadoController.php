<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\Aula;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        // Traemos los aires acondicionados con su aula para evitar el problema N+1
        $aires = AireAcondicionado::with('aula')->latest()->get();
        return view('aireacondicionados.index', compact('aires'));
    }

    public function create()
    {
        // Para el select de aulas en la vista de creación
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('aireacondicionados.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'capacidad_frio' => 'nullable|integer',
            'capacidad_calor' => 'nullable|integer',
            'descripcion' => 'nullable|string',
        ]);
    
        // Mapear los estados de texto a valores enteros
        $estadoMap = [
            'Encendido' => 1,
            'Apagado' => 0,
            'Roto' => 2,
        ];
    
        // Asignar el valor numérico
        $data['estado'] = $estadoMap[$data['estado']] ?? 0;

        AireAcondicionado::create($data);

        return redirect()->route('aireacondicionados.index')->with('ok', 'Aire creado correctamente.');
    }

    public function show(AireAcondicionado $aire)
    {
        $aire->load('aula');
        return view('aireacondicionados.show', compact('aire'));
    }

    public function edit(AireAcondicionado $aire)
    {
        $aulas = Aula::orderBy('ubicacion')->get(['id','ubicacion']);
        return view('aireacondicionados.edit', compact('aire','aulas'));
    }

    public function update(Request $request, AireAcondicionado $aire)
    {
        $data = $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|string|max:50',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'capacidad_frio' => 'nullable|integer',
            'capacidad_calor' => 'nullable|integer',
            'descripcion' => 'nullable|string',
        ]);
        
        // Mapear los estados de texto a valores enteros
        $estadoMap = [
            'Encendido' => 1,
            'Apagado' => 0,
            'Roto' => 2,
        ];
    
        // Asignar el valor numérico
        $data['estado'] = $estadoMap[$data['estado']] ?? 0;

        $aire->update($data);

        return redirect()->route('aireacondicionados.index')->with('ok', 'Aire actualizado.');
    }

    public function destroy(AireAcondicionado $aire)
    {
        $aire->delete();
        return redirect()->route('aireacondicionados.index')->with('ok', 'Aire eliminado.');
    }
}
