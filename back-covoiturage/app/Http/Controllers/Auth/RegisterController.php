<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class RegisterController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'mdp' => 'required|min:6',
            'telephone' => 'required',
        ]);
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mdp' => Hash::make($request->mdp),
            'telephone' => $request->telephone,
        ]);



        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $token
        ], 200);
    }
}