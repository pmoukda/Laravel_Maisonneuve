<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $etudiants = Etudiant::with('ville')->select()->orderby('nom')->paginate(16);
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::select()->orderby('nom')->get();
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'adresse' => 'required|string|max:80',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:etudiants|max:100',
            'date_de_naissance' => 'required|date|before:-16 years|after:-65 years',
            'ville_id' => 'required|exists:villes,id'
        ],
[
            'date_de_naissance.before' => 'Vous devez avoir au moins 16 ans.',
            'date_de_naissance.after' => 'Vous devez avoir moins de 65 ans.',
             
        ]);
        
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', "L'étudiant a été créer avec succès!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::select()->orderby('nom')->get();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes'=> $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'adresse' => 'required|string|max:80',
            'telephone' => 'required|string|max:15',
            'date_de_naissance' => 'required|date|before:-16 years|after:-65 years',
            'ville_id' => 'required|exists:villes,id'
        ],
[
            'date_de_naissance.before' => 'Vous devez avoir au moins 16 ans.',
            'date_de_naissance.after' => 'Vous devez avoir moins de 65 ans.',
        ]);
        
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with("success"," Les informations ont été mises à jour!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect('etudiants')->with("success", "L'étudiant a été supprimer avec succès!");
    }
}
