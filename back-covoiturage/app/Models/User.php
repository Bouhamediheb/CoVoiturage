<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   
    protected $table = 'User'; 
    protected $fillable = [
        'email',
        'nom',
        'prenom',
        'mdp',
        'telephone',
        'role',
        'etat',
        'avis',
    ];

    public $timestamps = true;

   
}
