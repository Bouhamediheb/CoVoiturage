<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ListePassagerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route for User
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

//Route for Avis
Route::get('/avis', [AvisController::class, 'index']);
Route::get('/avis/{id}', [AvisController::class, 'show']);
Route::post('/avis', [AvisController::class, 'store']);
Route::put('/avis/{id}', [AvisController::class, 'update']);
Route::delete('/avis/{id}', [AvisController::class, 'destroy']);

//Route for Trajet
Route::get('/trajets', [TrajetController::class, 'index']);
Route::get('/trajets/{id}', [TrajetController::class, 'show']);
Route::post('/trajets', [TrajetController::class, 'store']);
Route::put('/trajets/{id}', [TrajetController::class, 'update']);
Route::delete('/trajets/{id}', [TrajetController::class, 'destroy']);
Route::get('/rechercheTrajet', [TrajetController::class, 'rechercheTrajet']);
Route::post('/updateEtatTrajet', [TrajetController::class, 'updateEtatTrajet']);
Route::get('/displayTripsByStatus', [TrajetController::class, 'displayTripsByStatus']);
Route::post('/updatePlacesTrajet', [TrajetController::class, 'updatePlacesTrajet']);

//Route for Voiture
Route::get('/voitures', [VoitureController::class, 'index']);
Route::get('/voitures/{id}', [VoitureController::class, 'show']);
Route::post('/voitures', [VoitureController::class, 'store']);
Route::put('/voitures/{id}', [VoitureController::class, 'update']);
Route::delete('/voitures/{id}', [VoitureController::class, 'destroy']);
Route::get('/voitures/driver/{id}', [VoitureController::class, 'getVoitureByDriver']);

//Route for Auth
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

//Route for ListePassager
Route::post('/reserver', [ListePassagerController::class, 'reserver']);
