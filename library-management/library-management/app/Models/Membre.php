<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'matricule'];

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}