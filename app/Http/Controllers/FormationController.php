<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Formateur;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
      {
            $formateurs = Formateur::all();
            $formations = Formation::all();
            return view('account-pages.profile', [
                'formateurs' => $formateurs,
                'formations' => $formations,
            ]);
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:100',
            'objectif' => 'required|max:100',
            'contenu' => 'required|max:100',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);

        $formation = new Formation();
        $formation->titre = $validatedData['titre'];
        $formation->objectif = $validatedData['objectif'];
        $formation->contenu = $validatedData['contenu'];
        $formation->formateur_id = $validatedData['formateur_id'];
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filePath = $file->store('formations', 'public');
            $formation->fichier = $filePath;
        }
        $formation->save();

        return redirect()->route('profile')->with('success', 'Formation ajoutée avec succès!');
}
    




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
