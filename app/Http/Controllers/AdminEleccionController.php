<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EleccionController;
use App\Models\Eleccion;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Persona;

class AdminEleccionController extends Controller
{
    function index(){
        return view('/admin/crearEleccion');
    }

    function indexEdit(Eleccion $eleccion){
        $user = User::get();
        $candidato = Persona::get();
        return view('/admin/editarEleccion',['users'=>$user,'candidatos'=>$candidato,'eleccion'=>$eleccion]);
    }

    function store(Request $request){
        Alert::success('Success Title', 'Success Message');
        $eleccion = EleccionController::store($request);
        return redirect()->route('admin.editarElecciones', ['eleccion' => $eleccion->id]);
    }



}

