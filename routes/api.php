<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\API\VilleController;
use App\Http\Controllers\API\DepartementController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });
    Route::apiResource("villes", VilleController::class);
    Route::apiResource("departements", DepartementController::class);
    Route::get('/villes/search', [VilleController::class, 'search']);
    Route::get('/departements/search', [DepartementController::class, 'departements.search']);

