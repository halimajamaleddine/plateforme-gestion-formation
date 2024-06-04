<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('account-pages.listeAttestation', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $formateurs = Formateur::all();
        $formations = Formation::all();
        $sessions = Session::all();
        return view('account-pages.attestation', [
            'user' => $user,
            'formateurs' => $formateurs,
            'formations' => $formations,
            'sessions' => $sessions
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
        //
    }

    /**
     * Display the specified resource.
     */

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
