<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Models\User;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = Avis::all()->toArray();
        return response()->json($avis);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $avis = new Avis([
            'commentaire' => $request->input('commentaire'),
            'note' => $request->input('note'),
            'idUser' => $request->input('idUser')
        ]);
        $avis->save();
        $user = User::find($request->input('idUser'));
        if ($user->avis == null) {
            $user->avis = $request->input('note');
        } else {
            $user->avis = round(($user->avis + $request->input('note')) / 2);
        }
        $user->update();
        return response()->json($avis);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $avis = Avis::find($id);
        return response()->json($avis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $avis = Avis::find($id);
        $avis->update($request->all());
        return response()->json($avis);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $avis = Avis::find($id);
        $avis->delete();
        return response()->json('Avis supprimé !');
    }
}