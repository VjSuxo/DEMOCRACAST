<?php
namespace App\Http\Controllers;

use App\Models\Eleccion;
use App\Models\EleccionCandidato;
use Illuminate\Http\Request;

class enlaceVotacionController extends Controller{

    public function index(Eleccion $eleccion){
        return view("/user/voto",['eleccion'=>$eleccion]);
    }

    function indexLista() {
        $eleccion = Eleccion::get();
        return view('/user/listaElecciones',['elecciones'=>$eleccion]);
    }


}
