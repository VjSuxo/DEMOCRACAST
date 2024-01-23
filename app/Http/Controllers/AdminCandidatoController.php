<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CandidatoController;
use App\Models\Eleccion;
use App\Models\EleccionCandidato;
use App\Models\Persona;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCandidatoController extends Controller
{
    function store(Eleccion $eleccion, Request $request){
        //Buscamos la eleccion en la tabla ELECCIONCANDIDATO
        $eleccionC = EleccionCandidato::where('eleccion_id',$eleccion->id)
        ->where('persona_id',$request->idPersona)
        ->first();
        if(!$eleccionC){

            $cantidad = EleccionCandidato::where('eleccion_id',$eleccion->id)->count();
            $consulta = new Request([
                'eleccion_id' => $eleccion->id,
                'persona_id' => $request->idPersona,
                'nroCartelera' => $cantidad,
            ]);

            $eleccionC = EleccionCandidatoController::store($consulta);

            Alert::success('Candidato Agregado', 'Candidato agregado exitosamente.');

            return redirect()->route('admin.editarElecciones',[$eleccion->id])->with('success', 'Candidato agregado exitosamente.');
        }
        Alert::error('Error', 'Candidato existente.');

        return redirect()->route('admin.editarElecciones',[$eleccion->id])->with('error', 'Candidato existente.');
    }
}
