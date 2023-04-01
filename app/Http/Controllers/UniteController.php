<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unite;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unites = Unite::all();
        return view('unites.index', ['unites' => $unites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unites = new Unite;
        return view('unites.create', ['unite' => $unites]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'unite' => ['required', 'max:45', 'regex:/^[\p{L}\d ]+$/']
        ], [
            'unite.required' => 'Le champ unite est requis',
            'unite.max:45' => 'Le champ unite ne doit pas contenir plus de 45 caractères',
            'unite.regex' => 'Le champ ne doit contenir que des lettres et des chiffres'
        ])) {
            $unite = $request->input('unite');
            $unites = new Unite();
            $unites->unite = $unite;
            $unites->save();
            return redirect()->route('unites.index')->with('success', 'Unité créée avec succès !');
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
        $unites = Unite::findOrFail($id);
        return view('unites.edit', ['unite' => $unites]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'unite' => ['required', 'max:45', 'regex:/^[\p{L}\d ]+$/']
        ], [
            'unite.required' => 'Le champ unite est requis',
            'unite.max:45' => 'Le champ unite ne doit pas contenir plus de 45 caractères',
            'unite.regex' => 'Le champ ne doit contenir que des lettres et des chiffres'
        ])) {
            $unite = $request->input('unite');
            $unites = Unite::find($id);
            $unites->unite = $unite;
            $unites->save();
            return redirect()->route('unites.index')->with('success', 'Unité modifiée avec succès !');
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
        Unite::destroy($id);

        return redirect()->route('unites.index')->with('success', 'Unité supprimée avec succès !');
    }
}
