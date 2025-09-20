<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        return response()->json(Classe::with(['eleves', 'professeurs'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|unique:classes',
            'nom' => 'required|string'
        ]);

        $classe = Classe::create($validated);
        return response()->json($classe, 201);
    }

    public function show(Classe $classe)
    {
        return response()->json($classe->load(['eleves', 'professeurs', 'evaluations']));
    }

    public function update(Request $request, Classe $classe)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string'
        ]);

        $classe->update($validated);
        return response()->json($classe);
    }

    public function destroy(Classe $classe)
    {
        $classe->delete();
        return response()->json(null, 204);
    }
}
