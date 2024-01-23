<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EleccionCandidato;

class EleccionCandidatoController extends Controller
{
    public static function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'eleccion_id' => 'required|exists:elecciones,id',
            'persona_id' => 'required|exists:personas,id',
        ]);

        // Crear un nuevo registro en la tabla eleccion_candidato
        $eleccionCandidato = EleccionCandidato::create([
            'eleccion_id' => $request->eleccion_id,
            'persona_id' => $request->persona_id,
            'nroCartelera' => $request->nroCartelera,
        ]);

        // Puedes agregar lógica adicional según tus necesidades

        return $eleccionCandidato;
    }

    public static function update(Request $request, EleccionCandidato $eleccionCandidato)
    {
        // Validar la solicitud
        $request->validate([
            'eleccion_id' => 'required|exists:elecciones,id',
            'persona_id' => 'required|exists:candidatos,id',
        ]);

        // Actualizar el registro en la tabla eleccion_candidato
        $eleccionCandidato->update([
            'eleccion_id' => $request->eleccion_id,
            'persona_id' => $request->candidato_id,
        ]);

        // Puedes agregar lógica adicional según tus necesidades

        return response()->json(['message' => 'Registro actualizado exitosamente']);
    }

    public static function destroy(EleccionCandidato $eleccionCandidato)
    {
        // Eliminar el registro de la tabla eleccion_candidato
        $eleccionCandidato->delete();

        // Puedes agregar lógica adicional según tus necesidades

        return response()->json(['message' => 'Registro eliminado exitosamente']);
    }
}
