<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;

class EmpruntController extends Controller
{
    //
    // Liste de tous les emprunts
    public function index()
    {
        try {
            $emprunts = Emprunt::with('livre', 'membre')->get();
            return response()->json($emprunts, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des emprunts'], 500);
        }
    }

    // Créer un nouvel emprunt
    public function store(Request $request)
    {
        $request->validate([
            'groupe_emprunt_id' => 'required|exists:groupe_emprunts,id', // Ajouter validation pour groupe_emprunt_id
            'livre_id' => 'required|exists:livres,id',
            'membre_id' => 'required|exists:membres,id',
            'date_heure_emprunt' => 'required|date',
            'date_limite_remise' => 'required|date|after:date_heure_emprunt',
        ]);

        try {
            $livre = Livre::findOrFail($request->livre_id);

            // Vérifier si le livre peut être emprunté
            if ($livre->quantite_restant_stock <= $livre->seuil_minimal_exemplaire) {
                return response()->json(['error' => 'Ce livre ne peut pas être emprunté car il est en dessous du seuil minimal'], 400);
            }

            // Décrémenter la quantité en stock
            $livre->quantite_restant_stock -= 1;
            $livre->save();

            // Créer l'emprunt
            $emprunt = Emprunt::create($request->all());
            return response()->json($emprunt, 201);
        } catch (\Exception $e) {
            // \Log::error('Erreur: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la création de l\'emprunt'], 500);
        }
    }


    // Afficher un emprunt spécifique
    public function show($id)
    {
        try {
            $emprunt = Emprunt::with('livre', 'membre')->findOrFail($id);
            return response()->json($emprunt, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération de l\'emprunt'], 500);
        }
    }

    // Mettre à jour un emprunt
    public function update(Request $request, $id)
    {
        try {
            $emprunt = Emprunt::findOrFail($id);
            $emprunt->update($request->all());
            return response()->json($emprunt, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour de l\'emprunt'], 500);
        }
    }

    // Supprimer un emprunt
    public function destroy($id)
    {
        try {
            $emprunt = Emprunt::findOrFail($id);
            $emprunt->delete();
            return response()->json(['message' => 'Emprunt supprimé avec succès'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Emprunt introuvable'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression de l\'emprunt'], 500);
        }
    }

    public function retournerEmprunt($id)
    {
        try {
            // Récupérer l'emprunt
            $emprunt = Emprunt::findOrFail($id);

            // Vérifier si l'emprunt est déjà retourné
            if ($emprunt->statut === true) {
                return response()->json(['message' => 'Cet emprunt est déjà retourné.'], 400);
            }

            // Mettre à jour le statut de l'emprunt
            $emprunt->statut = true;
            $emprunt->save();

            // Incrémenter la quantité en stock du livre
            $livre = Livre::findOrFail($emprunt->livre_id);
            $livre->quantite_restant_stock += 1;
            $livre->save();

            return response()->json(['message' => 'Livre retourné avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors du retour du livre'], 500);
        }
    }
}
