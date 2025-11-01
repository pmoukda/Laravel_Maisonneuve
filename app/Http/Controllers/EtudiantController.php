<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
       $etudiants = Etudiant::with('ville')->select()->orderby('nom')->paginate(15);
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
            'date_de_naissance.before' => trans('lang.validation_birthDate_before'),
            'date_de_naissance.after' => trans('lang.validation_birthDate_after'),   
        ],  
        [
            'nom' => trans('lang.name'),
            'adresse' => trans('lang.address'),
            'telephone' => trans('lang.telephone'),
            'email' => trans('lang.email'),
            'date_de_naissance' => trans('lang.birthDate'),
            'ville_id' => trans('lang.city'),
        ]);
        
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $etudiant->user()->associate($user);
        $etudiant->save();

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', trans('lang.success_create_msg'));
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
            'date_de_naissance.before' => trans('lang.validation_birthDate_before'),
            'date_de_naissance.after' => trans('lang.validation_birthDate_after'), 
        ],
        [
            'nom' => trans('lang.name'),
            'adresse' => trans('lang.address'),
            'telephone' => trans('lang.telephone'),
            'email' => trans('lang.email'),
            'date_de_naissance' => trans('lang.birthDate'),
            'ville_id' => trans('lang.city'),
        ]);
        
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', trans('lang.success_edit_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect('etudiants')->with('success', trans('lang.success_delete_msg'));
    }
}
