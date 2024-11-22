<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'auteur', 'date_publication', 'resume', 'pages',
        'nombres_exemplaire_total', 'quantite_restant_stock', 'seuil_minimal_exemplaire'
    ];

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
