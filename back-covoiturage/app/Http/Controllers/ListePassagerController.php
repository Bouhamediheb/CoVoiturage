<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListePassager;
use App\Models\Trajet;

class ListePassagerController extends Controller
{

    public function reserver(Request $request)
    {
        // Create a new trajet
        $listePassager = new ListePassager();
        $listePassager->fill($request->all());
        $listePassager->save();
        return response()->json($listePassager, 201);
    }

    public function index()
    {
        $listePassagers = ListePassager::all();
        return response()->json($listePassagers, 200);
    }

    public function listePassagerById($id) {
        $listePassager = ListePassager::where('idPassager', $id)->get();
        return response()->json($listePassager, 200);
    }

    
}
