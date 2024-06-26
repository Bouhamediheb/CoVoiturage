<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentaire',
        'note',
        'idUser'

    ];
    public $timestamps = true;

    public function IdUser()
    {
        return $this->belongsTo(User::class, "idUser");
    }
}