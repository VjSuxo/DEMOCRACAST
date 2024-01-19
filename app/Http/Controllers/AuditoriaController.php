<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index()
    {
        $auditorias = Auditoria::all();
        return view('auditorias.index', compact('auditorias'));
    }

    public function create()
    {
        return view('auditorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string',
            // Otros campos de validación relacionados con Auditoria
        ]);

        Auditoria::create([
            'user_id' => $request->user_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
            // Otros campos relacionados con Auditoria
        ]);

        return redirect()->route('auditorias.index')->with('success', 'Auditoria creada exitosamente.');
    }

    public function edit(Auditoria $auditoria)
    {
        return view('auditorias.edit', compact('auditoria'));
    }

    public function update(Request $request, Auditoria $auditoria)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string',
            // Otros campos de validación relacionados con Auditoria
        ]);

        $auditoria->update([
            'user_id' => $request->user_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
            // Otros campos relacionados con Auditoria
        ]);

        return redirect()->route('auditorias.index')->with('success', 'Auditoria actualizada exitosamente.');
    }

    public function destroy(Auditoria $auditoria)
    {
        $auditoria->delete();
        return redirect()->route('auditorias.index')->with('success', 'Auditoria eliminada exitosamente.');
    }
}
