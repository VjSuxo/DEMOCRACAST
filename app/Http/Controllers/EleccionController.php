<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;

class EleccionController extends Controller
{
    public static function store(Request $request)
    {
        $request->validate([
            'nombreEle' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $eleccion = Eleccion::create([
            'nombreEle' => $request->nombreEle,
            'fechaInicio' => $request->fechaInicio,
            'estado' => 'activo',
            'descripcion' => $request->descripcion,
        ]);
        return $eleccion;
    }

    public function edit(Eleccion $eleccion)
    {
        return view('elecciones.edit', compact('eleccion'));
    }

    public function update(Request $request, Eleccion $eleccion)
    {
        $request->validate([
            'nombreEle' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInicio',
            'estado' => 'required|in:activa,inactiva',
            'descripcion' => 'nullable|string',
            // Otros campos de validación relacionados con Eleccion
        ]);

        $eleccion->update([
            'nombreEle' => $request->nombreEle,
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'estado' => $request->estado,
            'descripcion' => $request->descripcion,
            // Otros campos relacionados con Eleccion
        ]);

        return redirect()->route('elecciones.index')->with('success', 'Eleccion actualizada exitosamente.');
    }

    public function destroy(Eleccion $eleccion)
    {
        $eleccion->delete();
        return redirect()->route('elecciones.index')->with('success', 'Eleccion eliminada exitosamente.');
    }
}
