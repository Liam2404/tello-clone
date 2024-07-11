<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;


Route::patch('/cards/{card}/move', [CardController::class, 'move']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
