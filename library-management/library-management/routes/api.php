<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\GroupeEmpruntController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\MembreController;


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/livres', [LivreController::class, 'index']);
    Route::get('/livres/{id}', [LivreController::class, 'show']);
    Route::post('/livres', [LivreController::class, 'store']);
    Route::put('/livres/{id}', [LivreController::class, 'update']);
    Route::delete('/livres/{id}', [LivreController::class, 'destroy']);

    // Routes pour GroupeEmprunt
    Route::get('/groupe-emprunts', [GroupeEmpruntController::class, 'index']);
    Route::post('/groupe-emprunts', [GroupeEmpruntController::class, 'store']);
    Route::get('/groupe-emprunts/{id}', [GroupeEmpruntController::class, 'show']);
    Route::put('/groupe-emprunts/{id}', [GroupeEmpruntController::class, 'update']);
    Route::delete('/groupe-emprunts/{id}', [GroupeEmpruntController::class, 'destroy']);

    // Routes pour Emprunt
    Route::get('/emprunts', [EmpruntController::class, 'index']);
    Route::post('/emprunts', [EmpruntController::class, 'store']);
    Route::get('/emprunts/{id}', [EmpruntController::class, 'show']);
    Route::put('/emprunts/{id}', [EmpruntController::class, 'update']);
    Route::delete('/emprunts/{id}', [EmpruntController::class, 'destroy']);
    Route::put('/emprunts/{id}/retourner', [EmpruntController::class, 'retournerEmprunt']);


    //Routes pour le membres
    Route::get('/membres', [MembreController::class, 'index']);

});
