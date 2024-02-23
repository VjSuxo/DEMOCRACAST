<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public static function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apePaterno' => 'required|string|max:255',
            'apeMaterno' => 'required|string|max:255',
        ]);

        Persona::create([
            'id'=>$request->id,
            'nombre' => $request->nombre,
            'apePaterno' => $request->apePaterno,
            'apeMaterno' => $request->apeMaterno,
            'foto' => $request->foto,
        ]);

    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apePaterno' => 'required|string|max:255',
            'apeMaterno' => 'required|string|max:255',
        ]);

        $persona->update([
            'nombre' => $request->nombre,
            'apePaterno' => $request->apePaterno,
            'apeMaterno' => $request->apeMaterno,
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    public static function destroy(Persona $persona)
    {
        $persona->delete();
    }
}
