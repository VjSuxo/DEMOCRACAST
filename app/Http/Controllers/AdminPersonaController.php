<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Http\Controllers\PhotoControler;
use App\Http\Controllers\PersonaController;

class AdminPersonaController extends Controller
{
    public function store(Request $request)
    {
        $ruta = PhotoControler::save($request);
        $consulta = new Request([
            'id' => $request->ci,
            'nombre' => $request->nombre,
            'apePaterno' => $request->ApPaterno,
            'apeMaterno' => $request->ApMaterno,
            'foto' => $ruta,
        ]);

        PersonaController::store($consulta);

        return redirect()->back();
    }


    private function FunctionName(Request $request)
    {
        
    }
}
