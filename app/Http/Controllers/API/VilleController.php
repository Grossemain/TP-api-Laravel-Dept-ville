<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $villes = Ville::all();
        // On retourne les informations des utilisateurs en JSON
        return response()->json($villes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'insee_code' => 'required|max:5',
            'departement_code' => 'required|max:3',
            'zip_code' => 'required|max:5',
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'gps_lat' => 'required|max:255',
            'gps_lng' => 'required|max:255',
        ]);

        // On crée une nouvelle ville
        $ville = Ville::create($request->all());
        // On retourne les informations de la nouvelle ville en JSON
        return response()->json([
            'status' => 'Success',
            'data' => $ville,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ville $ville)
    {
        // On retourne les informations de la ville en JSON
        return response()->json($ville);
    }

    public function search(Request $request)
    {
        // Valider les entrées de la requête
        $request->validate([
            'query' => 'required|string|minimum:2'
        ]);

        // Obtenir le terme de recherche
        $query = $request->input('query');

        // Rechercher les villes correspondant au terme de recherche
        $villes = Ville::where('name', 'LIKE', '%' . $query . '%')->get();

        // Retourner les résultats de la recherche
        return response()->json($villes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        $request->validate([
            'insee_code' => 'required|max:5',
            'departement_code' => 'required|max:3',
            'zip_code' => 'required|max:5',
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'gps_lat' => 'required|max:255',
            'gps_lng' => 'required|max:255',
        ]);
        // On crée une nouvelle ville
        $ville->update($request->all());
        //retourne les informations de la nouvelle ville en JSON
        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    { 
            // On supprime la ville
            $ville->delete();
            // On retourne la réponse JSON
            return response()->json([
                'status' => 'Supprimer avec succès'
            ]);
        
    }
}