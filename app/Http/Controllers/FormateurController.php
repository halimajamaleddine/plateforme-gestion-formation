<?php

namespace App\Http\Controllers;

use id;
use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formateurs = Formateur::all();
        return view('account-pages.formateur-management', compact('formateurs'));

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         Formateur::create([
             'nom' => $request->nom,
             'prenom' => $request->prenom,
             'statue' => $request->statue,
         
        ]);

        return redirect()->route('formateurs-management')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.show', compact('formateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        return view('account-pages.formateur-edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formateur $formateur)
    {
        {
        
            
            $formateur->nom = $request->input('nom');
            $formateur->prenom = $request->input('prenom');
            $formateur->statut = $request->input('statut'); 
        
            $formateur->save();
        
            return redirect()->route('formateurs-management')->with('success', 'Formateur mis à jour avec succès');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
