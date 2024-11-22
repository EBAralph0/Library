<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupeEmprunt extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
