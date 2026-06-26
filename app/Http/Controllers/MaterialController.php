<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'idCategoria' => 'required|exists:categorias,idCategoria'
        ]);

        $material = Material::create([
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'idCategoria' => $request->idCategoria
        ]);

        return response()->json([
            'mensaje' => 'Material creado correctamente',
            'data' => $material
        ], 201);
    }

    public function update(Request $request, $codigo)
{
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'idCategoria' => 'required|exists:categorias,idCategoria'
    ]);

    $material = Material::find($codigo);

    if (!$material) {
        return response()->json([
            'mensaje' => 'Material no encontrado'
        ], 404);
    }

    $material->update([
        'descripcion' => $request->descripcion,
        'ubicacion' => $request->ubicacion,
        'idCategoria' => $request->idCategoria
    ]);

    return response()->json([
        'mensaje' => 'Material actualizado correctamente',
        'data' => $material
    ]);
}

public function index()
{
    $materiales = Material::with('categoria')->get();

    return response()->json($materiales);
}

}