<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::all();
        return view('candidatos.index', compact('candidatos'));
    }

    public function create()
    {
        return view('candidatos.create');
    }

    public static function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'nroCartelera' => 'required|integer',
            // Otros campos de validación relacionados con Candidato
        ]);

        $candidato = Candidato::create([
            'persona_id' => $request->persona_id,
            'nroCartelera' => $request->nroCartelera,
            // Otros campos relacionados con Candidato
        ]);

        return $candidato;
    }

    public function edit(Candidato $candidato)
    {
        return view('candidatos.edit', compact('candidato'));
    }

    public function update(Request $request, Candidato $candidato)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'nroCartelera' => 'required|integer',
            // Otros campos de validación relacionados con Candidato
        ]);

        $candidato->update([
            'persona_id' => $request->persona_id,
            'nroCartelera' => $request->nroCartelera,
            // Otros campos relacionados con Candidato
        ]);

        return redirect()->route('candidatos.index')->with('success', 'Candidato actualizado exitosamente.');
    }

    public function destroy(Candidato $candidato)
    {
        $candidato->delete();
        return redirect()->route('candidatos.index')->with('success', 'Candidato eliminado exitosamente.');
    }
}
