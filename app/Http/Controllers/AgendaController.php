<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Agenda;
use function PHPUnit\Framework\returnArgument;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('Agenda.Agenda_index',compact('agenda'));
       // return response()->json(Agenda::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
        ]);

        Agenda::create($request->only('nombre', 'telefono', 'fecha_nacimiento'));
        return response()->json(['message' => 'Contacto creado correctamente'], 201);
    }

    public function update(Request $request, $id)
{
    $contacto = Agenda::findOrFail($id);

    $validated = $request->validate([
        'nombre' => 'sometimes|required|string|max:255',
        'telefono' => 'sometimes|required|string|max:10',
        'fecha_nacimiento' => 'sometimes|required|date',
    ]);

    $contacto->update($validated);

    return response()->json($contacto, 200);
}


    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return response()->json(['message' => 'Contacto eliminado correctamente']);
    }
}
