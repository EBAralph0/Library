<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livre;
use Illuminate\Support\Facades\Validator;

class LivreController extends Controller
{
    //
    // Liste de tous les livres
    public function index()
    {
        try {
            $livres = Livre::all();
            return response()->json($livres, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des livres.'], 500);
        }
    }

    // Afficher un livre spécifique
    public function show($id)
    {
        try {
            $livre = Livre::findOrFail($id);
            return response()->json($livre, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Livre introuvable.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération du livre.'], 500);
        }
    }

    // Créer un nouveau livre
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'date_publication' => 'required|date',
            'resume' => 'required|string',
            'pages' => 'required|integer|min:1',
            'nombres_exemplaire_total' => 'required|integer|min:1',
            'quantite_restant_stock' => 'required|integer|min:0',
            'seuil_minimal_exemplaire' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            $livre = Livre::create($request->all());
            return response()->json($livre, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la création du livre.'], 500);
        }
    }

    // Mettre à jour un livre
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'sometimes|string|max:255',
            'auteur' => 'sometimes|string|max:255',
            'date_publication' => 'sometimes|date',
            'resume' => 'sometimes|string',
            'pages' => 'sometimes|integer|min:1',
            'nombres_exemplaire_total' => 'sometimes|integer|min:1',
            'quantite_restant_stock' => 'sometimes|integer|min:0',
            'seuil_minimal_exemplaire' => 'sometimes|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            $livre = Livre::findOrFail($id);
            $livre->update($request->all());
            return response()->json($livre, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Livre introuvable.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour du livre.'], 500);
        }
    }

    // Supprimer un livre
    public function destroy($id)
    {
        try {
            $livre = Livre::findOrFail($id);
            $livre->delete();
            return response()->json(['message' => 'Livre supprimé avec succès.'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Livre introuvable.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du livre.'], 500);
        }
    }
}
