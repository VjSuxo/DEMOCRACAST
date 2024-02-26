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
            EleccionCandidatoController::store($consulta);
           // return $eleccionC;
           Alert::success('Candidato Agregado', 'Candidato agregado exitosamente.');

            return redirect()->route('admin.editarElecciones',[$eleccion->id])->with('success', 'Candidato agregado exitosamente.');
        }
      Alert::error('Error', 'Candidato existente.');

        return redirect()->route('admin.editarElecciones',[$eleccion->id])->with('error', 'Candidato existente.');
    }

    function storePersona(Eleccion $eleccion, Request $request){
        if($request->id){
            $consulta = new Request([
                'id' => $request->ci,
                'nombre' => $request->nombre,
                'apePaterno' => $request->apePaterno,
                'apeMaterno' => $request->apeMaterno,
            ]);
       }
       else{

            $consulta = new Request([
                'nombre' => $request->nombre,
                'apePaterno' => $request->apePaterno,
                'apeMaterno' => $request->apeMaterno,
            ]);
       }
       $persona = PersonaController::store($consulta);
       $consulta = new Request([
            'idPersona' => $persona->id,
       ]);
       $this->store($eleccion,$consulta);
       return redirect()->back();
    }


    function destroyCandidato(Request $request){
        $registro = EleccionCandidato::where('eleccion_id', $request->eleccionId)
        ->where('persona_id', $request->personaId)
        ->first();

        if ($registro) {
            $registro->delete();
            echo "Se ha eliminado el registro correctamente.";
        } else {
            echo "No se encontró el registro con los IDs proporcionados.";
        }
        return redirect()->back();
    }



}
