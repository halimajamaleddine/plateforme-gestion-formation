<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::with('formateur', 'formation')->get();
        $formateurs = Formateur::all();
        $formations = Formation::all();


        return view('account-pages.session', [
            'sessions' => $sessions,
            'formateurs' => $formateurs,
            'formations' => $formations,
        ]);
    }
    public function indexSessionFormation()
    {
        $sessions = Session::with('formateur', 'formation')->get();
        $formateurs = Formateur::all();
        $formations = Formation::all();


        return view('account-pages.session', [
            'sessions' => $sessions,
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
                'nom_ressource' => 'required|string|max:50',
                'type_ressource' => 'required|string|max:50',
                'datedebut' => 'required|date',
                'datefin' => 'required|date',
                'salle' => 'required|integer',
                'formateur_id' => 'required|exists:formateurs,id',
                'formations_id' => 'required|exists:formations,id',
            ]);
    
            $datedebut = $validatedData['datedebut'];
            $salle = $validatedData['salle'];
    
            // Vérifier si une session existe déjà à la même date
            $dateExist = Session::where('datedebut', $datedebut)->exists();
    
            if ($dateExist) {
                return redirect()->route('sessions.index')->with('error', 'Une session existe déjà à cette date');
            }
    
            // Vérifier si une session existe déjà dans la même salle à la même date
            $salleExist = Session::where('datedebut', $datedebut)
                                ->where('salle', $salle)
                                ->exists();
    
            if ($salleExist) {
                return redirect()->route('sessions.index')->with('error', 'Une session existe déjà dans cette salle à cette date');
            }
    
            try {
                $session = new Session($validatedData);
                $session->disponibilite_ressource = true;
                $session->save();
                Log::info('Session saved successfully:', $session->toArray());
                return redirect()->route('sessions.index')->with('success', 'Session ajoutée avec succès');
            } catch (\Exception $e) {
                Log::error('Error saving session:', ['error' => $e->getMessage()]);
                return redirect()->route('sessions.index')->with('error', 'Erreur lors de l\'ajout de la session: ' . $e->getMessage());
            }
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
