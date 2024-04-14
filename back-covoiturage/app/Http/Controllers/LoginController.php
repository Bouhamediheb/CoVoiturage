<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;


class LoginController extends Controller
{
    use HasApiTokens;

    public function login(Request $request){
        $loginUserData = $request->validate([
            'mdp'=>'required|min:8',
            'email'=>'required|string|email'
            
        ]);
        $user = User::where('email',$loginUserData['email'])->first();

        if(!$user ){
            return response([
                'message'=>'No user'
            ]);
        }
        else{
        if(!Auth::attempt($loginUserData)){
                return response([
                    'message'=>'Invalid credentials'
                ]);
            }
        }
        $token = $user->createToken('authToken')->plainTextToken;

        


        return response([
            'user'=>$user,
            'token'=>$token
        ]); 
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }



}
