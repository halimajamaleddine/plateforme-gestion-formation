<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return view('dashboard', compact('formations'));
    }
    public function inscription()
    {
        $formations = Formation::all();
        return view('inscription', compact('formations'));
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
        // $validatedData = $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'formateur_id' => 'required|exists:formateurs,id',
        //     'formation_id' => 'required|exists:formations,id',
        // ]);
    
        // Inscription::create([
        //     'user_id' => $validatedData['user_id'],
        //     'formateur_id' => $validatedData['formateur_id'],
        //     'formation_id' => $validatedData['formation_id'],
        // ]);
    
        // return redirect()->route('dashboard')->with('success', 'Inscription créée avec succès.');
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
