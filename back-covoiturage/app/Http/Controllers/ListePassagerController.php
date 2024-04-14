<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListePassager;

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
}
