<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupeEmprunt;

class GroupeEmpruntController extends Controller
{
    //
    // Liste de tous les groupes d'emprunt
    public function index()
    {
        try {
            $groupes = GroupeEmprunt::all();
            return response()->json($groupes, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des groupes d\'emprunt'], 500);
        }
    }

    // Créer un nouveau groupe d'emprunt
    public function store(Request $request)
    {
        try {
            $groupe = GroupeEmprunt::create($request->all());
            return response()->json($groupe, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la création du groupe d\'emprunt'], 500);
        }
    }

    // Afficher un groupe d'emprunt spécifique
    public function show($id)
    {
        try {
            $groupe = GroupeEmprunt::findOrFail($id);
            return response()->json($groupe, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Groupe d\'emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération du groupe d\'emprunt'], 500);
        }
    }

    // Mettre à jour un groupe d'emprunt
    public function update(Request $request, $id)
    {
        try {
            $groupe = GroupeEmprunt::findOrFail($id);
            $groupe->update($request->all());
            return response()->json($groupe, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Groupe d\'emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour du groupe d\'emprunt'], 500);
        }
    }

    // Supprimer un groupe d'emprunt
    public function destroy($id)
    {
        try {
            $groupe = GroupeEmprunt::findOrFail($id);
            $groupe->delete();
            return response()->json(['message' => 'Groupe d\'emprunt supprimé avec succès'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Groupe d\'emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du groupe d\'emprunt'], 500);
        }
    }
}
