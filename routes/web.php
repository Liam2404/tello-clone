<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/boards', function () {
    return view('boards');
})->middleware(['auth', 'verified'])->name('boards');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('boards', BoardController::class);
    Route::resource('lists', BoardListController::class)->except(['index', 'create', 'edit', 'show']);
    Route::resource('cards', CardController::class)->except(['index', 'create', 'edit', 'show']);
});

require __DIR__.'/auth.php';
