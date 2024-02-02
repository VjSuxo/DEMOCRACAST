<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PhotoControler extends Controller
{
    public static function save(Request $request)
    {
        $ruta = storage_path() . '\app\public\photoPerfil/' . $request->ci. '.png';
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('fotoP'));
        $image->resize(500, 500);
        $image->toPng()->save($ruta);
        return $ruta;
    }
}
