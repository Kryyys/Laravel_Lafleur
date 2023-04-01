<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espece;

class EspeceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especes = Espece::all();
        return view('especes.index', ['especes' => $especes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especes = new Espece;
        return view('especes.create', ['espece' => $especes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'espece' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/']
        ], [
            'espece.required' => 'Le champ espèce est requis',
            'espece.max:45' => 'Le champ espèce ne doit pas contenir plus de 45 caractères',
            'espece.regex' => 'Le champ ne doit contenir que des lettres'
        ])) {
            $espece = $request->input('espece');
            $especes = new Espece();
            $especes->espece = $espece;
            $especes->save();
            return redirect()->route('especes.index')->with('success', 'Espèce créée avec succès !');
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
        $especes = Espece::findOrFail($id);
        return view('especes.edit', ['espece' => $especes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->validate([
            'espece' => ['required', 'max:45', 'regex:/^[\p{L} ]+$/']
        ], [
            'espece.required' => 'Le champ espece est requis',
            'espece.max:45' => 'Le champ espece ne doit pas contenir plus de 45 caractères',
            'espece.regex' => 'Le champ ne doit contenir que des lettres'
        ])) {
            $espece = $request->input('espece');
            $especes = Espece::find($id);
            $especes->espece = $espece;
            $especes->save();
            return redirect()->route('especes.index')->with('success', 'Espèce modifiée avec succès !');
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
        Espece::destroy($id);

        return redirect()->route('especes.index')->with('success', 'Espèce supprimée avec succès !');
    }
}
