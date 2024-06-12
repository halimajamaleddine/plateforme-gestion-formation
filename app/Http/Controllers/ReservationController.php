<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $sessions = Session::all();
        return view('account-pages.reservation', compact('sessions'));
    }
    public function updateReservationStatus(Request $request)
{
    $session = Session::find($request->session_id);
    
    if ($request->in_formation == 'accepter') {
        $session->disponibilite_ressource = 1;
    } elseif ($request->in_formation == 'refuser') {
        $session->disponibilite_ressource = 0;
    }
    
    $session->save();
    
    return redirect()->back()->with('success', 'Statut de la ressource mis à jour avec succès.');
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
