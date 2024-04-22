<?php

namespace App\Http\Controllers;

use App\Models\EnseignantChercheur;
use App\Http\Requests\StoreEnseignantChercheurRequest;
use App\Http\Requests\UpdateEnseignantChercheurRequest;

class EnseignantChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnseignantChercheurRequest $request)
    {
        {
            $validated = $request->validate([
                'name' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'telephone' => 'nullable|string',
                'role' => 'nullable|string',
                'etablissement' => 'required|string',
                'anciennete' => 'required|integer',
                'motivations' => 'required|string',
                'grade' => 'nullable|string'

            ]);

            $user = User::create([
                'name' => $validated->name,
                'prenom' => $validated->prenom,
                'email' => $validated->email,
                'password' => bcrypt( $validated->password),
                'telephone' => $validated->telephone,
                'role' =>  $validated->role
            ]);
            Enseignant_chercheur::create([
                'id_user' => $user->id,
                'etablissement' => $request->etablissement,
                'anciennete' => $request->anciennete,
                'motivations' => $request->motivations,
                'grade' => $request->grade
            ]);


            return response()->json(['message'=>'User creatde successfully'], 200);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EnseignantChercheur $enseignantChercheur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnseignantChercheur $enseignantChercheur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnseignantChercheurRequest $request, EnseignantChercheur $enseignantChercheur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnseignantChercheur $enseignantChercheur)
    {
        //
    }
}
