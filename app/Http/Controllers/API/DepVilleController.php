<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ville;
use Illuminate\Http\Request;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Builder;

class DepVilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(Ville $ville)
    {
        //
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $departements = Departement::query()
            ->when($searchTerm, function (Builder $builder) use ($searchTerm) {
                $builder->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%")
                        ->orWhere('code', 'like', "%{$searchTerm}%");
                });
            })->get();

        $villes = Ville::query()
            ->when($searchTerm, function (Builder $builder) use ($searchTerm) {
                $builder->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%")
                        ->orWhere('insee_code', 'like', "%{$searchTerm}%");
                });
            })->get();

        return response()->json([
            'departements' => $departements,
            'villes' => $villes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    {
        //
    }
}
