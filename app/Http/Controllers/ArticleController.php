<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('sousCategorie', 'couleur', 'couleurSecondaire', 'unite', 'espece')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = new Article;
        return view('articles.create', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_sous_categorie' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'affiche' => ['required'],
            'categorie_id' => ['required', 'exists:lf_categories,id']
        ], [
            'nom_sous_categorie.required' => 'Le champ nom est requis',
            'nom_sous_categorie.max:45' => 'Le champ nom ne doit pas contenir plus de 45 caractères',
            'nom_sous_categorie.regex' => 'Le champ ne doit contenir que des lettres',
            'affiche.required' => "Le champ Afficher l'évènement est requis",
            'categorie_id.required' => "Le champ Choisir la Catégorie est requis"
        ])) {
            $sousCategorie = $request->input('nom_sous_categorie');
            $affiche = $request->input('affiche');
            $categorieId = $request->input('categorie_id');
            $sousCategories = new SousCategorie();
            $sousCategories->nom_sous_categorie = $sousCategorie;
            $sousCategories->affiche = $affiche ? 1 : 0;
            $sousCategories->categorie_id = $categorieId;
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
        $articles = Article::findOrFail($id);
        return view('articles.show', ['articles' => $articles]);
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
