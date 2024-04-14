<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Trajet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'pointDepart',
        'pointArrive',
        'montant',
        'description',
        'nbPlaces',
        'dateDepart',
        'idVoiture',
        'idConducteur',
        'etat'
    ];

    public $timestamps = true;

    public function Voiture()
    {
        return $this->belongsTo(Voiture::class, "idVoiture");
    }

    public function Conducteur()
    {
        return $this->hasOne(User::class, "idConducteur");
    }
}