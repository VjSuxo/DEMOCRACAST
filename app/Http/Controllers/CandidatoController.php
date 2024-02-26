<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function create()
    {
        return view('candidatos.create');
    }

    public static function store(Eleccion $eleccion, Request $request)
    {
       if($request->id){
            $consulta = new Request([
                'id' => $request->ci,
                'nombre' => $request->nombre,
                'apePaterno' => $request->ApPaterno,
                'apeMaterno' => $request->ApMaterno,
            ]);
       }
       else{
            $consulta = new Request([
                'nombre' => $request->nombre,
                'apePaterno' => $request->ApPaterno,
                'apeMaterno' => $request->ApMaterno,
            ]);
       }
       $persona = PersonaController::store($consulta);
       $consulta = new Request([
            'idPersona' => $persona->id,
       ]);
       $candidatoC = new AdminCandidatoController();
       $candidatoC->store($eleccion,$consulta);
    }

    public function edit()
    {
        return view('candidatos.edit', compact('candidato'));
    }

    public function update(Request $request, Request $candidato)
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

    public function destroy(Request $candidato)
    {
        $candidato->delete();
        return redirect()->route('candidatos.index')->with('success', 'Candidato eliminado exitosamente.');
    }
}
