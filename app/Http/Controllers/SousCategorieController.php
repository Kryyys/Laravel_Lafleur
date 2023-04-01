<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategorie;

class SousCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sousCategories = SousCategorie::all();
        return view('sousCategories.index', ['sousCategories' => $sousCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sousCategories = new SousCategorie();
        return view('sousCategories.create', ['sousCategorie' => $sousCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_sous_categorie' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_sous_categorie.required' => 'Le champ nom est requis',
            'nom_sous_categorie.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_sous_categorie.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
        ])) {
            $sousCategorie = $request->input('nom_sous_categorie');
            $affiche = $request->input('affiche');
            $sousCategories = new SousCategorie();
            $sousCategories->nom_sous_categorie = $sousCategorie;
            $sousCategories->affiche = $affiche ? 1 : 0;
            $sousCategories->save();
            return redirect()->route('sousCategories.index')->with("success", "La sous-catégorie a été créée avec succès !");
        } else {
            // cela sert à revenir sur la page avec l'input
            return redirect()->back();
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
        $sousCategories = SousCategorie::findOrFail($id);
        return view('sousCategories.edit', ['sousCategorie' => $sousCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'nom_sous_categorie' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_sous_categorie.required' => 'Le champ nom est requis',
            'nom_sous_categorie.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_sous_categorie.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
        ])) {
            $sousCategorie = $request->input('nom_sous_categorie');
            $affiche = $request->input('affiche');
            $sousCategories = SousCategorie::find($id);
            $sousCategories->nom_sous_categorie = $sousCategorie;
            $sousCategories->affiche = $affiche ? 1 : 0;
            $sousCategories->save();
            return redirect()->route('sousCategories.index')->with("success", "La sous-catégorie a été modifiée avec succès !");
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
        SousCategorie::destroy($id);

        return redirect()->route('sousCategories.index')->with('success', "La sous-catégorie a été supprimée avec succès !");
    }
}
