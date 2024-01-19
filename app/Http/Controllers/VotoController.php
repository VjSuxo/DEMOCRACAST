<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{
    public function index()
    {
        $votos = Voto::all();
        return view('votos.index', compact('votos'));
    }

    public function create()
    {
        return view('votos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'eleccion_id' => 'required|exists:elecciones,id',
            'opcion' => 'required|string',
            'hora' => 'required|date',
            // Otros campos de validación relacionados con Voto
        ]);

        Voto::create([
            'user_id' => $request->user_id,
            'eleccion_id' => $request->eleccion_id,
            'opcion' => $request->opcion,
            'hora' => $request->hora,
            // Otros campos relacionados con Voto
        ]);

        return redirect()->route('votos.index')->with('success', 'Voto creado exitosamente.');
    }

    public function edit(Voto $voto)
    {
        return view('votos.edit', compact('voto'));
    }

    public function update(Request $request, Voto $voto)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'eleccion_id' => 'required|exists:elecciones,id',
            'opcion' => 'required|string',
            'hora' => 'required|date',
            // Otros campos de validación relacionados con Voto
        ]);

        $voto->update([
            'user_id' => $request->user_id,
            'eleccion_id' => $request->eleccion_id,
            'opcion' => $request->opcion,
            'hora' => $request->hora,
            // Otros campos relacionados con Voto
        ]);

        return redirect()->route('votos.index')->with('success', 'Voto actualizado exitosamente.');
    }

    public function destroy(Voto $voto)
    {
        $voto->delete();
        return redirect()->route('votos.index')->with('success', 'Voto eliminado exitosamente.');
    }
}

