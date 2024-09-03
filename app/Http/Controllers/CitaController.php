<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
{
    $citas = Cita::all(); // Obteniendo todas las citas
    return view('citas.index', compact('citas'));
}


    public function create()
    {
        $servicios = Servicio::all();
        $usuarios = User::all();
        return view('citas.create', compact('servicios', 'usuarios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha_hora' => 'required|date',
            'estado' => 'required|in:pendiente,completada,cancelada',
        ]);

        Cita::create($validatedData);
        return redirect()->route('citas.index')->with('success', 'Cita creada con éxito.');
    }

    public function edit(Cita $cita)
    {
        $servicios = Servicio::all();
        $usuarios = User::all();
        return view('citas.edit', compact('cita', 'servicios', 'usuarios'));
    }

    public function update(Request $request, Cita $cita)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha_hora' => 'required|date',
            'estado' => 'required|in:pendiente,completada,cancelada',
        ]);

        $cita->update($validatedData);
        return redirect()->route('citas.index')->with('success', 'Cita actualizada con éxito.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada con éxito.');
    }
}

