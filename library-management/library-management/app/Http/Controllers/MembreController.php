<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membre;


class MembreController extends Controller
{
    //
    public function index()
    {
        try {
            $livres = Membre::all();
            return response()->json($livres, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des membres.'], 500);
        }
    }
}
