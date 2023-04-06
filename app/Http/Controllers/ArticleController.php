<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SousCategorie;
use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\Couleur;
use App\Models\Espece;
use App\Models\Unite;
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
        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();
        $couleurSecondaires = Couleur::all();
        $evenements = Evenement::all();
        $couleurs = Couleur::all();
        $couleurSecondaires = Couleur::whereNotIn('id', [$articles->couleur_id])->get();
        $especes = Espece::all();
        $unites = Unite::all();
        return view('articles.create', [
            'article' => $articles,
            'categorie' => $categories,
            'sousCategorie' => $sousCategories,
            'evenement' => $evenements,
            'couleur' => $couleurs,
            'couleurSecondaire' => $couleurSecondaires,
            'espece' => $especes,
            'unite' => $unites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'prix_unitaire' => ['required', 'regex:/^\d{4,2}(\.\d{4,2})?$/'],
            'image' => ['required'],
            'quantite_dispo' => ['required', 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'promotion' => ['required'],
            'prix_promotion' => ["nullable"],
            'date_inventaire' => ["nullable"],
            'poids' => ["nullable"],
            'taille' => ["nullable"],
            'poids' => ["nullable", 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'taille' => ["nullable", 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'couleur_id' => ['required', 'integer', 'exists:lf_couleurs,id'],
            'unite_id' => ['required', 'integer', 'exists:lf_unites,id'],
            'espece_id' => ['required', 'integer', 'exists:lf_especes,id'],
            'couleur_secondaire_id' => ["nullable", 'integer', 'exists:lf_couleurs,id'],
            'sous_categorie_id' => ['required', 'integer', 'exists:lf_sous_categories,id'],

            'nom.required' => 'Le champ Nom est requis',
            'nom.max:45' => 'Le champ Nom ne doit pas contenir plus de 45 caractères',
            'nom.regex' => 'Le champ Nom ne doit contenir que des lettres',
            'prix_unitaire.required' => 'Le champ Prix est requis',
            'prix_unitaire.regex' => 'Le champ Prix ne doit contenir que des chiffres',
            'image.required' => 'Le champ image est requis',
            'image.image' => 'Le champ Image doit être une image',
            'image.max:2048' => "L'image ne doit pas dépasser 2Mo",
            'image.regex' => "L'image doit être un jpg, jpeg ou un png",
            'quantite_dispo.required' => 'Le champ Quantité est requis',
            'quantite_dispo.regex' => 'Le champ Quantité ne doit contenir que des chiffres',
            'promotion.required' => 'Le champ Promotion est requis',

            'couleur_id.required' => 'Le champ Couleur est requis',
            'unite_id.required' => 'Le champ Unité est requis',
            'espece_id.required' => 'Le champ Espèce est requis',
            'sous_categorie_id.required' => 'Le champ Sous-Catégorie est requis'


        ])) {
            $article = $request->input('nom');
            $prix = $request->input('prix_unitaire');
            $image = $request->input('image');
            $quantite = $request->input('quantite_dispo');
            $promotion = $request->input('promotion');
            $prixPromotion = $request->input('prix_promotion');
            $dateInventaire = $request->input('date_inventaire');
            $poids = $request->input('poids');
            $taille = $request->input('taille');
            $couleurId = $request->input('couleur_id');
            $uniteId = $request->input('unite_id');
            $especeId = $request->input('espece_id');
            $couleurSecondaireId = $request->input('couleur_secondaire_id');
            $sousCategorieId = $request->input('sous_categorie_id');

            $articles = new Article();

            $articles->nom = $article;
            $articles->prix_unitaire = $prix;
            $articles->image = $image;
            $articles->quantite_dispo = $quantite;
            $articles->promotion = $promotion ? 1 : 0;
            $articles->prix_promotion = $prixPromotion;
            $articles->date_inventaire = $dateInventaire;
            $articles->poids = $poids;
            $articles->taille = $taille;
            $articles->couleur_id = $couleurId;
            $articles->unite_id = $uniteId;
            $articles->espece_id = $especeId;
            $articles->couleur_secondaire_id = $couleurSecondaireId;
            $articles->sous_categorie_id = $sousCategorieId;
            $articles->save();
            return redirect()->route('articles.index')->with("success", "L'article a été modifié avec succès !");
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
        $articles = Article::findOrFail($id);
        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();
        $couleurSecondaires = Couleur::all();
        $evenements = Evenement::all();
        $couleurs = Couleur::all();
        $couleurSecondaires = Couleur::whereNotIn('id', [$articles->couleur_id])->get();
        $especes = Espece::all();
        $unites = Unite::all();
        return view('articles.edit', [
            'article' => $articles,
            'categorie' => $categories,
            'sousCategorie' => $sousCategories,
            'evenement' => $evenements,
            'couleur' => $couleurs,
            'couleurSecondaire' => $couleurSecondaires,
            'espece' => $especes,
            'unite' => $unites
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/'],
            'prix_unitaire' => ['required', 'regex:/^\d{1,2}(\.\d{1,2})?$/'],
            'image' => ['required'],
            'quantite_dispo' => ['required', 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'promotion' => ['required'],
            'prix_promotion' => ["nullable"],
            'date_inventaire' => ["nullable"],
            'poids' => ["nullable"],
            'taille' => ["nullable"],
            'poids' => ["nullable", 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'taille' => ["nullable", 'regex:/^(?:[1-9]\d{0,2}|1000)$/'],
            'couleur_id' => ['required', 'exists:lf_couleurs,id'],
            'unite_id' => ['required', 'exists:lf_unites,id'],
            'espece_id' => ['required', 'exists:lf_especes,id'],
            'couleur_secondaire_id' => ["nullable", 'exists:lf_couleurs,id'],
            'sous_categorie_id' => ['required', 'exists:lf_sous_categories,id'],

            'nom.required' => 'Le champ Nom est requis',
            'nom.max:45' => 'Le champ Nom ne doit pas contenir plus de 45 caractères',
            'nom.regex' => 'Le champ Nom ne doit contenir que des lettres',
            'prix_unitaire.required' => 'Le champ Prix est requis',
            'prix_unitaire.regex' => 'Le champ Prix ne doit contenir que des chiffres',
            'image.required' => 'Le champ image est requis',
            'image.image' => 'Le champ Image doit être une image',
            'image.max:2048' => "L'image ne doit pas dépasser 2Mo",
            'image.regex' => "L'image doit être un jpg, jpeg ou un png",
            'quantite_dispo.required' => 'Le champ Quantité est requis',
            'quantite_dispo.regex' => 'Le champ Quantité ne doit contenir que des chiffres',
            'promotion.required' => 'Le champ Promotion est requis',

            'couleur_id.required' => 'Le champ Couleur est requis',
            'unite_id.required' => 'Le champ Unité est requis',
            'espece_id.required' => 'Le champ Espèce est requis',
            'sous_categorie_id.required' => 'Le champ Sous-Catégorie est requis'


        ])) {
            $article = $request->input('nom');
            $prix = $request->input('prix_unitaire');
            $image = $request->input('image');
            $quantite = $request->input('quantite_dispo');
            $promotion = $request->input('promotion');
            $prixPromotion = $request->input('prix_promotion');
            $dateInventaire = $request->input('date_inventaire');
            $poids = $request->input('poids');
            $taille = $request->input('taille');
            $couleurId = $request->input('couleur_id');
            $uniteId = $request->input('unite_id');
            $especeId = $request->input('espece_id');
            $couleurSecondaireId = $request->input('couleur_secondaire_id');
            $sousCategorieId = $request->input('sous_categorie_id');

            $articles = Article::find($id);

            $articles->nom = $article;
            $articles->prix_unitaire = $prix;
            $articles->image = $image;
            $articles->quantite_dispo = $quantite;
            $articles->promotion = $promotion ? 1 : 0;
            $articles->prix_promotion = $prixPromotion;
            $articles->date_inventaire = $dateInventaire;
            $articles->poids = $poids;
            $articles->taille = $taille;
            $articles->couleur_id = $couleurId;
            $articles->unite_id = $uniteId;
            $articles->espece_id = $especeId;
            $articles->couleur_secondaire_id = $couleurSecondaireId;
            $articles->sous_categorie_id = $sousCategorieId;
            $articles->save();
            return redirect()->route('articles.index')->with("success", "L'article a été modifié avec succès !");
        } else {
            // cela sert à revenir sur la page avec l'input
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);

        return redirect()->route('articles.index')->with('success', "L'article a été supprimé avec succès !");
    }
}
