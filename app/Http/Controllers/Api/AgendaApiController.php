<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Http\JsonResponse;
class AgendaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function apiIndex()
    {
        $contactos = Agenda::all();
        return response()->json($contactos);
    }
public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'fecha_nacimiento' => 'required|date',
        ]);

        $contacto = Agenda::create($request->only('nombre', 'telefono', 'fecha_nacimiento'));
        return response()->json($contacto, 201);
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
        $contacto = Agenda::findOrFail($id);
        $contacto->delete();

        return response()->json(['message' => 'Contacto eliminado correctamente'], 200);
    }
}
