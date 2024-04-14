<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;


    protected $fillable = [
        'marque',
        'modele',
        'annee',
        'matricule',
        'climatisation',
        'animaux',
        'fumeur',
        'baggage',
        'bebe',
        'idConducteur '
    ];

    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo(User::class, "idConducteur");
    }
}