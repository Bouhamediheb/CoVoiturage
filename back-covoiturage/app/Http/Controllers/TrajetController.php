<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all trajets
        $trajets = Trajet::all();
        return response()->json($trajets, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new trajet
        $trajet = new Trajet();
        $trajet->fill($request->all());
        $trajet->save();
        return response()->json($trajet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Show the details of a specific trajet
        $trajet = Trajet::find($id);
        return response()->json($trajet, 200);
    }

    public function showByDriver($id)
    {
        // Get trajet by idConducteur
        $trajet = Trajet::where('idConducteur',$id)->get();
        return response()->json($trajet, 200);
    }

    public function annulerReservation($id)
    {
        $trajet = Trajet::find($id);
        if ($trajet->etat == 0) {
            $trajet->etat = 1;
            $trajet->nbPlaces = $trajet->nbPlaces + 1;
            $trajet->update();
            return response()->json($trajet, 200);
        } else {
            $trajet->nbPlaces = $trajet->nbPlaces + 1;
            $trajet->update();
            return response()->json($trajet, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Update the details of a specific trajet
        $trajet = Trajet::find($id);
        $trajet->update($request->all());
        return response()->json($trajet, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trajet $trajet)
    {
        // Delete a specific trajet
        $trajet->delete();
        return response()->json(null, 204);
    }


    public function rechercheTrajet(Request $request)
    {

        $trajets = Trajet::where('pointDepart', $request->input('pointDepart'))
            ->where('pointArrive', $request->input('pointArrive'))->whereDate('dateDepart', $request->input('dateDepart'))->where('nbPlaces', '>', 0)
            ->get();
        return response()->json($trajets, 200);
    }

    public function updateEtatTrajet(Request $request, $id)
    {

        $trajet = Trajet::find($request->input('id'));
        $trajet->etat = $request->input('etat');
        $trajet->update();
        return response()->json($trajet, 200);
    }

    public function displayTripsByStatus($status)
    {
        $trajets = Trajet::where('etat', $status)->get();

        // Return filtered trips
        return response()->json($trajets, 200);
    }

    public function updatePlacesTrajet($id)
    {
        $trajet = Trajet::find($id);
        if ($trajet->nbPlaces == 1) {
            $trajet->nbPlaces = $trajet->nbPlaces - 1;
            $trajet->etat = 0;
            $trajet->update();
        } else if ($trajet->nbPlaces > 1) {
            $trajet->nbPlaces = $trajet->nbPlaces - 1;
            $trajet->update();
        } else {
            return response()->json("Trajet Complet !", 500);
        }
        $trajet->update();
        return response()->json($trajet, 200);
    }
}
