<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Http\Controllers\PhotoControler;
use App\Http\Controllers\PersonaController;
use App\Models\Persona;
use App\Models\User;

class AdminPersonaController extends Controller
{
    public function store(Request $request)
    {

        if($request->file('fotoP')){
            $ruta = PhotoControler::save($request);
        }
        else{
           $ruta = "public\img\user\usuario.png";
        }

        $consulta = new Request([
            'id' => $request->ci,
            'nombre' => $request->nombre,
            'apePaterno' => $request->ApPaterno,
            'apeMaterno' => $request->ApMaterno,
            'foto' => $ruta,
        ]);
        PersonaController::store($consulta);
        $correo = $request->nombre . $request->ApPaterno . "@democracast.com";
        $consulta = new Request([
            'id' => $request->ci,
            'name' => $request->nombre . $request->ApPaterno,
            'email' => $correo,
            'password' => $request->password,
            'role' => $request->rol,
        ]);
        UserController::store($consulta);

        return redirect()->back();
    }


    public function destroy(Persona $persona)
    {
        $usuario = User::find($persona->id);
        PersonaController::destroy($persona);
        UserController::destroy($usuario);
        return redirect()->back();
    }
}
