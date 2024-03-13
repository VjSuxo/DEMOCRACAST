<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EleccionCandidato;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VotacionController extends Controller
{
    function votarCandidato(Eleccion $eleccion, Persona $persona)
    {
        $eleccionC = EleccionCandidato::where('eleccion_id', $eleccion->id)
            ->where('persona_id', $persona->id)
            ->first();

        if ($eleccionC) {
            // El registro existe, incrementamos 'cantVotos'
            $eleccionC->increment('cantVotos');

            // También puedes actualizar la relación en el modelo 'Eleccion'
            $eleccion->refresh(); // Refresca la relación para obtener los cambios
            $eleccion->update(['cantVotos' => $eleccionC->cantVotos]);

            Alert::success('Gracias por participar', 'Voto registrado');
            return redirect()->route('elecciones', [$eleccion->id]);
        } else {
            Alert::error('Error Title', 'Candidato no encontrado.');
            return redirect()->route('elecciones', [$eleccion->id]);
        }
    }

}
