<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', ['evenements' => $evenements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenements = new Evenement;
        return view('evenements.create', ['evenements' => $evenements]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->validate([
            'nom_evenement' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_evenement.required' => 'Le champ nom est requis',
            'nom_evenement.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_evenement.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
            ])) {
            $evenement = $request->input('nom_evenement');
            $affiche = $request->input('affiche');
            $evenements = new Evenement();
            $evenements->nom_evenement = $evenement;
            $evenements->affiche = $affiche ? 1 : 0;
            $evenements->save();
            return redirect()->route('evenements.index')->with("success", "L'évènement a été créé avec succès !");
        } else {
            // cela sert à revenir sur la page avec l'input
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $evenements = Evenement::findOrFail($id);
        return view('evenements.edit', ['evenement' => $evenements]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'nom_evenement' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_evenement.required' => 'Le champ nom est requis',
            'nom_evenement.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_evenement.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
            ])) {
            $evenement = $request->input('nom_evenement');
            $affiche = $request->input('affiche');
            $evenements = Evenement::find($id);
            $evenements->nom_evenement = $evenement;
            $evenements->affiche = $affiche ? 1 : 0;
            $evenements->save();
            return redirect()->route('evenements.index')->with("success", "L'évènement a été modifié avec succès !");
        } else {
            // cela sert à revenir sur la page avec l'input
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Evenement::destroy($id);

        return redirect()->route('evenements.index')->with('success', "L'évènement a été supprimé avec succès !");
    }
}
