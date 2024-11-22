<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupe_emprunt_id', 'livre_id', 'membre_id',
        'date_heure_emprunt', 'date_limite_remise', 'statut'
    ];

    public function groupeEmprunt()
    {
        return $this->belongsTo(GroupeEmprunt::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
