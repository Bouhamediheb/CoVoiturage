<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::all();
        return response()->json($voitures, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $voiture = new Voiture();
        $voiture->fill($request->all());
        $voiture->save();
        return response()->json($voiture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $voiture = Voiture::find($id);
        return response()->json($voiture, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $voiture->update($request->all());
        return response()->json($voiture, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return response()->json(null, 204);
    }

    public function getVoitureByDriver($id)
    {
        $voitures = Voiture::where('idConducteur', $id)->get();
        return response()->json($voitures, 200);
    }
}
