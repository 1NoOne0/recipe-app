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

// Routes accessible to all (including guests)
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

// Routes for registered users
Route::group(['middleware' => ['auth', 'role:registered_user|admin']], function () {
    // Recipes
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Reviews
    Route::post('/recipes/{recipe}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Routes for admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Admin-specific routes
    Route::delete('/admin/recipes/{recipe}', [RecipeController::class, 'adminDestroy'])->name('admin.recipes.destroy');
    Route::delete('/admin/reviews/{review}', [ReviewController::class, 'adminDestroy'])->name('admin.reviews.destroy');

    // Manage permissions
    Route::get('/admin/permissions', [AdminController::class, 'permissions'])->name('admin.permissions');
    Route::post('/admin/permissions', [AdminController::class, 'updatePermissions'])->name('admin.permissions.update');
});

// for recipes
Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipes.show');

// for friends
Route::get('/friends', [App\Http\Controllers\FriendController::class, 'index'])->name('friends.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
