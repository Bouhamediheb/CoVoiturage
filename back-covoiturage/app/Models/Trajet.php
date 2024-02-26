<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'Trajet'; 

    protected $fillable = [
        'pointDepart',
        'pointArrive',
        'montant',
        'description',
        'nbPlaces',
        'dateDepart',
        'idVoiture',
        'idConducteur'
    ];

    public $timestamps = true;

    public function Voiture()
    {return $this->belongsTo(Voiture::class ,"idVoiture"); }

    public function Conducteur()
    {return $this->hasOne(User::class ,"idConducteur"); }
}
