<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulaire;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return vue formulaire index
     */
    public function index()
    {
        $formulaires = Formulaire::all();
        return view('formulaires.index', ['formulaires' => $formulaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formulaires = Formulaire::findOrFail($id);
        return view('formulaires.show', ['formulaires' => $formulaires]);
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
    public function update(Request $request, int $id)
    {

        $formulaire = $request->input('traite');
        $formulaires = Formulaire::find($id);
        $formulaires->traite = $formulaire ? 1 : 0;
        $formulaires->save();
        return redirect()->route('formulaires.index')->with("success", "La demande a été traitée");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
