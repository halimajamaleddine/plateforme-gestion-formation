<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Formation;
use App\Models\User;
use App\Models\UserModele;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Apply filters if they are present
        if ($request->has('grade') && $request->grade != '') {
            $query->where('grade', $request->grade);
        }

        if ($request->has('etablissement') && $request->etablissement != '') {
            $query->where('etablissement', $request->etablissement);
        }

        if ($request->has('anciennete') && $request->anciennete != '') {
            $query->where('anciennete', $request->anciennete);
        }

        // Exclude administrators
        $query->where('role', '!=', 'admin');

        $users = $query->get();
        $formations = Formation::all();

        // Retrieve the distinct values for filters
        $grades = User::distinct()->pluck('grade');
        $etablissements = User::distinct()->pluck('etablissement');
        $anciennetes = User::distinct()->pluck('anciennete');

        return view('account-pages.users-management', [
            'users' => $users,
            'formations' => $formations,
            'grades' => $grades,
            'etablissements' => $etablissements,
            'anciennetes' => $anciennetes,
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
    public function store(Request $request, User $user)
    {



        // return redirect()->route('users-management')->with('success', 'Utilisateur et inscription créés avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        $users = User::latest()->get();
        return view('account-pages.users-management', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModele $userModele)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->where('id', Auth::User()->id)->update([
            'etablissement' => $request->etablissement,
            'anciennete' => $request->anciennete,
            'grade' => $request->grade,
            'motivations' => $request->motivations,
            'telephone' => $request->telephone,
        ]);
        return redirect()->route('sucess-page')->with('success', 'Dossier d\'inscription au cours de traitement.');
        // if ($user) {
        //     $updatedUser = User::find(Auth::user()->id);   
        //     Inscription::create([
        //         'user_id' => $updatedUser->id,
        //         'formation_id' => $formation->formation_id,  
        //     ]);
        // } else {
        //     return redirect()->back()->with('error', 'Échec de la mise à jour de l\'utilisateur.');
        // }
    }

    public function acceptInFormation(Request $request)
    {

        // Vérifier si la valeur de 'in_formation' est nulle, sinon utiliser 0
        $in_formation = $request->in_formation;
        if ($in_formation == "accepter") {
            // Mettre à jour la colonne 'in_formation'
            User::where('id', $request->userid)->update([
                'in_formation' => true
            ]);
        } else {
            User::where('id', $request->userid)->update([
                'in_formation' => false
            ]);
        }
        return redirect()->route('users-management')->with('success', 'Inscription réussie.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserModele $userModele)
    {
        //
    }
    public function acceptSelected(Request $request)
    {
        $selectedUserIds = $request->input('selected_users', []);

        if (count($selectedUserIds) > 0) {
            User::whereIn('id', $selectedUserIds)->update(['in_formation' => true]);
            return redirect()->route('users.index')->with('success', 'Les utilisateurs sélectionnés ont été acceptés.');
        } else {
            return redirect()->route('users.index')->with('error', 'Aucun utilisateur sélectionné.');
        }
    }
}
