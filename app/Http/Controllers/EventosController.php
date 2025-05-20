<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{
    public function index()
    {
        return view('eventos.index');
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function show(Evento $evento)
    {
        $id = $evento->id;
        return view('eventos.show', compact('evento'));
    }


    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }


    public function store(Request $request)
    {
        // Validate and store the event data
        $request->validate(
            [
                'nombre_evento' => 'required|string|max:255',
                'descripcion' => 'required|string|max:1000',
                'fecha_inicio' => 'required',
                'hora_inicio' => 'required',
                'participantes_maximos' => 'required|numberic|min:1',
            ]
        );
        $evento = Evento::create([
            'nombre_evento' => $request->nombre_evento,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'hora_inicio' => $request->hora_inicio,
            'participantes_maximos' => $request->participantes_maximos,
        ]);
        // Redirect or return a response
        return redirect()->route('verEvento',compact($evento));
    }
    public function update(Request $request, Evento $evento)
    {
        // Validate and update the event data
        $request->validate(
            [
                'nombre_evento' => 'required|string|max:255',
                'descripcion' => 'required|string|max:1000',
                'fecha_inicio' => 'required',
                'hora_inicio' => 'required',
                'participantes_maximos' => 'required|numberic|min:1',
            ]
        );
        $evento->update($request->all());
        // Save the event data
        $evento->save();
        // Redirect or return a response
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente.');
    }
}
