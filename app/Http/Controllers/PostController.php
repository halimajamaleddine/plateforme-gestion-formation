<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        $formateurs = Formateur::all();
        return view('account-pages.edit', compact('formation', 'formateurs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:100',
            'objectif' => 'required|string|max:100',
            'contenu' => 'required|string',
            'formateur_id' => 'required|exists:formateurs,id',
            'fichier' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);
    
        // Find the formation by ID
        $formation = Formation::findOrFail($id);
    
        // Update the formation attributes
        $formation->titre = $request->titre;
        $formation->objectif = $request->objectif;
        $formation->contenu = $request->contenu;
        $formation->formateur_id = $request->formateur_id;
    
        // Handle file upload if provided
        if ($request->hasFile('fichier')) {
            // Delete old file if exists
            if ($formation->fichier) {
                Storage::delete($formation->fichier);
            }
            
            // Store new file
            $file = $request->file('fichier');
            $path = $file->store('public/formations');
            $formation->fichier = $path;
        }
    
        // Save the changes
        $formation->save();
    
        // Redirect back with a success message
        return redirect()->route('profile')->with('success', 'Post updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
