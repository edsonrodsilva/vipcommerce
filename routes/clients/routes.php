<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;

Route::get('clients', [ClientController::class, 'index']);
Route::get('clients/{id}', [ClientController::class, 'show']);
Route::post('clients', [ClientController::class, 'store']);
Route::put('clients/{id}', [ClientController::class, 'update']);
Route::delete('clients/{id}', [ClientController::class, 'destroy']);
