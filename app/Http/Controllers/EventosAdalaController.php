<?php

namespace App\Http\Controllers;

use App\Models\EventosAdala;
use App\Models\Imagen;
use Illuminate\Http\Request;

class EventosAdalaController extends Controller
{
    public function index()
    {
        $eventos = EventosAdala::paginate(5);

        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $request->fecha_inicio) {
                        if (strtotime($value) < strtotime($request->fecha_inicio)) {
                            $fail('La fecha de fin no puede ser anterior a la fecha de inicio.');
                        }
                    }
                },
            ],
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => [
                'nullable',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $request->hora_inicio) {
                        $horaInicio = strtotime($request->hora_inicio);
                        $horaFin = strtotime($value);
                        if ($horaFin < $horaInicio) {
                            $fail('La hora de fin no puede ser anterior a la hora de inicio.');
                        }
                    }
                },
            ],
            'participantes_maximos' => 'required|integer|min:1',
            'participantes_actuales' => 'nullable|integer|min:0',
            'cartel' => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",

        ]);

        $evento = new EventosAdala($request->all());

        if ($request->hasFile('cartel')) {
            $image = $request->file('cartel');
            $fileName = $request->nombre_evento . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/carteles'), $fileName);
            $path = 'img/carteles/' . $fileName;
        }
        $imagen = [
            'categoria_id' => 4,
            'nombre_imagen' => $fileName,
            'ruta' => $path,
            'created_at' => now(),
            'updated_at' => now(),

        ];
        $NuevaImagen = new Imagen($imagen);
        $NuevaImagen->save();
        $evento->cartel = $NuevaImagen->id;
        $evento->save();

        return redirect()->route('eventos')->with('success', 'Evento creado exitosamente.');
    }
    public function show($id)
    {
        $evento = EventosAdala::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function update(Request $request, EventosAdala $evento)
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $request->fecha_inicio) {
                        if (strtotime($value) < strtotime($request->fecha_inicio)) {
                            $fail('La fecha de fin no puede ser anterior a la fecha de inicio.');
                        }
                    }
                },
            ],
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => [
                'nullable',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $request->hora_inicio) {
                        $horaInicio = strtotime($request->hora_inicio);
                        $horaFin = strtotime($value);
                        if ($horaFin < $horaInicio) {
                            $fail('La hora de fin no puede ser anterior a la hora de inicio.');
                        }
                    }
                },
            ],
            'participantes_maximos' => 'required|integer|min:1',
            'participantes_actuales' => 'nullable|integer|min:0',
            'cartel' => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $evento->update($request->all());
        if ($request->hasFile('cartel')) {
            $image = $request->file('cartel');
            $fileName = $request->nombre_evento . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/carteles'), $fileName);
            $path = 'img/carteles/' . $fileName;
            $imagen = [
                'categoria_id' => 4,
                'nombre_imagen' => $fileName,
                'ruta' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $NuevaImagen = new Imagen($imagen);
            $NuevaImagen->save();
            $evento->cartel = $NuevaImagen->id;
        }
        $evento->save();
        return redirect()->route('eventos')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $evento = EventosAdala::findOrFail($id);
        $evento->activo = false;
        $evento->save();
        return redirect()->route('eventos')->with('success', 'Evento borrado exitosamente.');
    }

    public function recuperar(EventosAdala $evento)
    {
        $evento->activo = true;
        $evento->save();
        return redirect()->route('eventos')->with('success', 'Evento recuperado exitosamente.');
    }
}
