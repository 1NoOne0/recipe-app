<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Default route that serves the homepage or welcome view
Route::get('/', function () {
    return view('home');
})->name('home');
Route::resource('recipes', RecipeController::class);

Auth::routes();

// Example routes for recipes
Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipes.show');

// Example route for friends
Route::get('/friends', [App\Http\Controllers\FriendController::class, 'index'])->name('friends.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
