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
        return view('couleurs.index', ['couleurs'=>$couleurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('couleurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'couleur'=>'required'
        ]);

        $couleur= new Couleur([
            'couleur'=> $request->get('couleur')
        ]);

        $couleur->save();
        return redirect('/')->with('Succès', 'Couleur ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $couleurs = Couleur::findOrFail($id);
        return view('couleurs.show', compact('couleur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $couleurs = Couleur::findOrFail($id);
        return view('couleurs.edit', compact('couleur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'couleur'=>'required'
        ]);

        $couleurs = Couleur::findOrFail($id);
        $couleurs->couleur=$request->get('couleur');

        $couleurs->uptdate();

        return redirect('/')->with('Succès', 'Couleur modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $couleurs = Couleur::findOrFail($id);
        $couleurs->delete();

        return redirect('/')->with('Succès', 'Couleur supprimée avec succès');
    }
}
