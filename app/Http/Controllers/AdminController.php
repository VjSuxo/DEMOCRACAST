<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\User;

class AdminController extends Controller
{
    function adminHome() {
        return view("/admin/index");
    }

    function adminElecciones(){
        $eleccion = Eleccion::get();
        return view("/admin/gestionElecciones",['elecciones'=>$eleccion]);
    }

    function adminUsuarios(){
        $personas = Persona::get();
        $usuario  = User::get();
        return view("/admin/gestionUsuarios",['personas' => $personas,'usuarios' => $usuario]);
    }

    function adminGCandidatos(Eleccion $eleccion){
        $persona = Persona::get();
        return view("/admin/agregarcandidatos",['personas'=>$persona,'eleccion'=>$eleccion]);
    }


}
