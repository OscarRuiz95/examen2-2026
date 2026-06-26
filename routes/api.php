<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/materiales', [MaterialController::class, 'store']); 

//URL DEL ENDPOINT POST: http://127.0.0.1:8000/api/materiales

