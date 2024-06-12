<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use App\Models\Formateur;
use App\Models\Formation;
use PDF;
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
    public function bulkPrint(Request $request)
    {
        // Valider les entrées
        $request->validate([
            'userids' => 'required|array',
            'userids.*' => 'exists:users,id',
        ]);

        // Récupérer les utilisateurs sélectionnés
        $userIds = $request->input('userids');
        $users = User::whereIn('id', $userIds)->get();

        // Générer les PDF pour chaque utilisateur
        $pdfs = [];
        foreach ($users as $user) {
            $data = ['user' => $user];
            $pdf = PDF::loadView('account-pages.attestation', $data); // Utilisez votre propre vue ici
            $pdfs[] = $pdf;
        }

        // Fusionner les PDF en un seul fichier ou les traiter selon votre besoin
        // Pour l'exemple, nous allons les télécharger séparément sous forme de fichier zip

        // Créer un fichier zip
        $zip = new \ZipArchive;
        $zipFileName = 'attestations.zip';

        if ($zip->open(public_path($zipFileName), \ZipArchive::CREATE) === TRUE) {
            foreach ($pdfs as $index => $pdf) {
                $fileName = 'attestation_' . $users[$index]->id . '.pdf';
                $zip->addFromString($fileName, $pdf->output());
            }
            $zip->close();
        }

        // Retourner le fichier zip pour téléchargement
        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
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
