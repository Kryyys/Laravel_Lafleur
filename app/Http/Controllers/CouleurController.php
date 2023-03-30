<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Couleur;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleurs.index', ['couleurs' => $couleurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couleurs = new Couleur;
        return view('couleurs.create', ['couleur' => $couleurs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'couleur' => ['required', 'max:45', 'regex:/^[A-Za-z]+$/']
        ], [
            'couleur.required' => 'Le champ couleur est requis',
            'couleur.max:45' => 'Le champ couleur ne doit pas contenir plus de 45 caractères',
            'couleur.regex' => 'Le champ ne doit contenir que des lettres'
        ])) {
            $couleur = $request->input('couleur');
            $couleurs = new Couleur();
            $couleurs->couleur = $couleur;
            $couleurs->save();
            return redirect()->route('couleurs.index')->with('success', 'Couleur créée avec succès !');
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
        $couleurs = Couleur::findOrFail($id);
        return view('couleurs.edit', ['couleur' => $couleurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'couleur' => ['required', 'max:45', 'regex:/^[A-Za-z]+$/']
        ], [
            'couleur.required' => 'Le champ couleur est requis',
            'couleur.max:45' => 'Le champ couleur ne doit pas contenir plus de 45 caractères',
            'couleur.regex' => 'Le champ ne doit contenir que des lettres'
        ])) {
            $couleur = $request->input('couleur');
            $couleurs = Couleur::find($id);
            $couleurs->couleur = $couleur;
            $couleurs->save();
            return redirect()->route('couleurs.index')->with('success', 'Couleur modifiée avec succès !');
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
        Couleur::destroy($id);

        return redirect()->route('couleurs.index')->with('success', 'Couleur supprimée avec succès !');
    }
}
