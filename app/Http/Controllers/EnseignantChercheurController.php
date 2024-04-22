<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnseignantChercheur;
use App\Http\Requests\StoreEnseignantChercheurRequest;
use App\Http\Requests\UpdateEnseignantChercheurRequest;

class EnseignantChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function someEnseignantChercheurAction(Request $request) {
        if (!$request->user()->isEnseignantChercheur()) {
            abort(403, 'Unauthorized action.');
        }
        // Code for enseignant chercheur action
    }
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
        //
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
