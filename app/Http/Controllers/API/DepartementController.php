<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return response()->json($departements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|max:50',
            'code' => 'required|max:3',
            'name' => 'required|max:50',
            ]);
            $departement = Departement::create($request->all());
            return response()->json([
            'status' => 'Success',
            'data' => $departement,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        return response()->json($departement);
    }

    public function search(Request $request)
    {
        // Valider les entrées de la requête
        $request->validate([
            'query' => 'required|string|minimum:2'
        ]);

        // Obtenir le terme de recherche
        $query = $request->input('query');

        // Rechercher les departements correspondant au terme de recherche
        $departements = Departement::where('name', 'LIKE', '%' . $query . '%')->get();
// dd($departements);
        // Retourner les résultats de la recherche
        return response()->json($departements);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $request->validate($request, [
            'slug' => 'required|max:50',
            'code' => 'required|max:3',
            'name' => 'required|max:50',
            ]);

            $departement->update($request->all());
            return response()->json([
            'status' => 'Mise à jour avec succès'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        return response()->json([
            'status' => 'Supprimer avec succès'
            ]);
    }
}
