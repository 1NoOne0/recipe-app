<?php

use Illuminate\Support\Facades\Route;

// Default route that serves the homepage or welcome view
Route::get('/', function () {
    return view('welcome');
});

// Example routes for recipes
Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipes.show');

// Example route for friends
Route::get('/friends', [App\Http\Controllers\FriendController::class, 'index'])->name('friends.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
