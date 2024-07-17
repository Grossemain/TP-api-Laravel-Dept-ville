<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\API\VilleController;
use App\Http\Controllers\API\DepartementController;
use App\Http\Controllers\API\DepVilleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });
    Route::post('/departements/search', [DepartementController::class, 'search'])->name('departements.search');
    Route::get('/departements', [DepartementController::class, 'index'])->name('departements.index');
    Route::get('/departements/{departements}', [DepartementController::class, 'show'])->name('departements.show');
    Route::put('/departements/{departements}', [DepartementController::class, 'update'])->name('departements.update');
    Route::post('/departements', [DepartementController::class, 'store'])->name('departements.store');
    Route::delete('/departements/{departements}', [DepartementController::class, 'destroy'])->name('departements.destroy');

    Route::post('/villes/search', [VilleController::class, 'search'])->name('villes.search');
    Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
    Route::get('/villes/{villes}', [VilleController::class, 'show'])->name('villes.show');
    Route::put('/villes/{villes}', [VilleController::class, 'update'])->name('villes.update');
    Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
    Route::delete('/villes/{villes}', [VilleController::class, 'destroy'])->name('villes.destroy');

    Route::post('/depville/search', [DepVilleController::class, 'search'])->name('depville.search');


    // Route::apiResource("villes", VilleController::class);
    // Route::apiResource("departements", DepartementController::class);
    // Route::get('/villes/search', [VilleController::class, 'search']);
    // Route::get('/departements/search', [DepartementController::class, 'search']);

