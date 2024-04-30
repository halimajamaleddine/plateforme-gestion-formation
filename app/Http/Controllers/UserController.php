<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('account-pages.users-management', compact('users'));
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
        // $request->validate([
        //     'nom'=>'required',
        //     'prenom'=>'required',
        //     'email'=>'required|email|unique:users,email',
        //     'password'=>'required',
        //     'telephone'=>'required',
        //     'etablissement'=>'required',
        //     'anciennete'=>'required',
        //     'grade'=>'required',
        //     'motivations'=>'required'
        // ]);



        // User::create([
        //     'nom' => $request->nom,
        //     'prenom' => $request->prenom,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'telephone' => $request->telephone,
        //     'etablissement' => $request->etablissement,
        //     'anciennete' => $request->anciennete,
        //     'grade' => $request->grade,
        //     'motivations' => $request->motivations,
        // ]);

        // return redirect()->route('tables')->with('success', 'Inscription réussie.');
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
        //
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

        ]);

        return redirect()->route('tables')->with('success', 'Inscription réussie.');
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
}
