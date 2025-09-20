<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        return response()->json(Bulletin::with(['eleve', 'resultatsMatiere.matiere'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|unique:bulletins',
            'periode' => 'required|integer',
            'date_generation' => 'required|date',
            'eleve_id' => 'required|exists:utilisateurs,id'
        ]);

        $bulletin = Bulletin::create($validated);
        return response()->json($bulletin, 201);
    }

    public function show(Bulletin $bulletin)
    {
        return response()->json($bulletin->load(['eleve', 'resultatsMatiere.matiere']));
    }

    public function update(Request $request, Bulletin $bulletin)
    {
        $validated = $request->validate([
            'periode' => 'sometimes|required|integer',
            'date_generation' => 'sometimes|required|date'
        ]);

        $bulletin->update($validated);
        return response()->json($bulletin);
    }

    public function destroy(Bulletin $bulletin)
    {
        $bulletin->delete();
        return response()->json(null, 204);
    }

    public function calculerMoyenne(Bulletin $bulletin)
    {
        $moyenne = $bulletin->calculeMoyenneGenerale();
        return response()->json(['moyenne' => $moyenne]);
    }
}
