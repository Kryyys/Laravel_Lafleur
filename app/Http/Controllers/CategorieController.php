<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = new Categorie();
        return view('categories.create', ['categorie' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_categorie' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_categorie.required' => 'Le champ nom est requis',
            'nom_categorie.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_categorie.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
        ])) {
            $categorie = $request->input('nom_categorie');
            $affiche = $request->input('affiche');
            $categories = new Categorie();
            $categories->nom_categorie = $categorie;
            $categories->affiche = $affiche ? 1 : 0;
            $categories->save();
            return redirect()->route('categories.index')->with("success", "La catégorie a été créée avec succès !");
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
        $categories = Categorie::findOrFail($id);
        return view('categories.edit', ['categorie' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'nom_categorie' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required']
        ], [
            'nom_categorie.required' => 'Le champ nom est requis',
            'nom_categorie.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_categorie.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis"
        ])) {
            $categorie = $request->input('nom_categorie');
            $affiche = $request->input('affiche');
            $categories = Categorie::find($id);
            $categories->nom_categorie = $categorie;
            $categories->affiche = $affiche ? 1 : 0;
            $categories->save();
            return redirect()->route('categories.index')->with("success", "La catégorie a été modifiée avec succès !");
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
        Categorie::destroy($id);

        return redirect()->route('categories.index')->with('success', "La catégorie a été supprimée avec succès !");
    }
}
