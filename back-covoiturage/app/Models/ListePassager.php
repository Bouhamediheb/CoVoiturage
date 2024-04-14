<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListePassager extends Model
{
    use HasFactory;

    protected $fillable = [
        'idTrajet',
        'idPassager',
    ];

    public function Trajet()
    {
        return $this->belongsTo(Trajet::class, "idTrajet");
    }

    public function Passager()
    {
        return $this->belongsTo(User::class, "idPassager");
    }
}
